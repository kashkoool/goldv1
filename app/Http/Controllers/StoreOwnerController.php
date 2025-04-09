<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Store;
use App\Models\DiamondDetail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class StoreOwnerController extends Controller
{
    /**
     * Show the store owner dashboard.
     */
    public function dashboard()
    {
        // Get the authenticated store owner
        $storeOwner = Auth::user();

        // Get the store associated with the store owner
        $store = $storeOwner->store; // Assuming you have a relationship defined in the User model

        // Pass the store owner and store data to the view
        return view('store_owner.dashboard', [
            'storeOwner' => $storeOwner,
            'store' => $store,
        ]);
    }
    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('store_owner.create');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'material' => 'required|in:gold,silver,diamond',
        'karat' => 'nullable|in:18,21,22,24,925',
        'description' => 'nullable|string',
        'weight' => 'nullable|numeric',
        'price_per_gram_syp' => 'nullable|numeric',
        'price_per_gram_usd' => 'nullable|numeric',
        'crafting_fee' => 'nullable|numeric',
        'total_price_syp' => 'nullable|numeric',
        'total_price_usd' => 'nullable|numeric',
        'item_type' => 'required|in:ring,bracelet,necklace,earring,set,coin,half_coin,quarter_coin,ounce,anklet,hand_lock,hanger,name', // Updated item type enum
        'is_featured' => 'nullable|boolean',
        'set_items' => 'nullable|array',
        'set_items.*' => 'in:ring,necklace,earring,bracelet',
        'ring_size' => 'nullable|in:12,13,14,15,16,17,18,19,20,21,22,23,24,25',
        'stones' => 'nullable|array', // Validate stones as an array
        'stones.*.stone_shape' => 'nullable|in:oval,emerald,baguette,princess,pear,trapezoid,marquise,round',
        'stones.*.stone_type' => 'nullable|in:FL,IF,VVS1,VVS2,VS1,VS2,SI1,SI2,I1,I2,I3',
        'stones.*.stone_color' => 'nullable|string',
        'stones.*.stone_count' => 'nullable|integer',
        'stones.*.stone_weight' => 'nullable|numeric',
        'stones.*.carat_price_syp' => 'nullable|numeric',
        'stones.*.carat_price_usd' => 'nullable|numeric',
        'total_stone_weight' => 'nullable|numeric', // Total stone weight is entered by the user
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        // Create the product
        $productData = [
            'store_id' => Auth::user()->store_id,
            'name' => $request->name,
            'material' => $request->material,
            'karat' => $request->karat,
            'description' => $request->description,
            'weight' => $request->weight,
            'price_per_gram_syp' => $request->price_per_gram_syp,
            'price_per_gram_usd' => $request->price_per_gram_usd,
            'crafting_fee' => $request->crafting_fee,
            'total_price_syp' => $request->total_price_syp,
            'total_price_usd' => $request->total_price_usd,
            'item_type' => $request->item_type,
            'is_featured' => $request->is_featured ?? false,
            'set_items' => $request->item_type === 'set' ? json_encode($request->set_items) : null,
            'total_stone_weight' => $request->total_stone_weight, // Store the user-provided total stone weight
        ];

        // Set ring size if item type is ring or if ring is selected in set items
        if ($request->item_type === 'ring' || ($request->item_type === 'set' && in_array('ring', $request->set_items ?? []))) {
            $productData['ring_size'] = $request->ring_size;
        } else {
            $productData['ring_size'] = null; // Ensure ring size is null for non-ring items
        }

        // Only set stones if material is diamond
        if ($request->material === 'diamond' && $request->has('stones')) {
            $productData['stones'] = json_encode($request->stones);
        } else {
            $productData['stones'] = null; // Ensure stones is null for non-diamond materials
        }

        // Create the product
        $product = Product::create($productData);

        // Upload product images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('store_owner.dashboard')->with('success', 'Product created successfully!');
    }

    public function index()
    {
        // Get the authenticated store owner
        $storeOwner = Auth::user();

        // Get the store associated with the store owner
        $store = $storeOwner->store;

        // Fetch all products for the store
        $products = $store->products()->with('images')->get();

        // Pass the products to the view
        return view('store_owner.products', compact('products'));
    }
    public function edit(Product $product)
    {
        // Ensure the product belongs to the authenticated store owner
        if ($product->store_id !== Auth::user()->store_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('store_owner.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Ensure the product belongs to the authenticated store owner
        if ($product->store_id !== Auth::user()->store_id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request (same as the store method)
        $request->validate([
            // Your validation rules
        ]);

        // Update the product
        $product->update($request->all());

        // Handle images if needed
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('store_owner.products')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Ensure the product belongs to the authenticated store owner
        if ($product->store_id !== Auth::user()->store_id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the product
        $product->delete();

        return redirect()->route('store_owner.products')->with('success', 'Product deleted successfully!');
    }
}
