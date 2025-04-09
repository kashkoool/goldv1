<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Like;
use App\Models\Store;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function dashboard()
    {
        // Define a cache key for the user
        $cacheKey = 'dashboard_shared_view_user_' . Auth::user()->id;

        // Check if the data is already cached
        if (Cache::has($cacheKey)) {
            // Retrieve the cached data
            $store = Cache::get($cacheKey);

            // Debugging: Log or dump a message indicating cached data is being used
            // Log::info('Rendering dashboard from cache for user: ' . Auth::user()->id);
            // OR
            // dd('Rendering dashboard from cache for user: ' .  Auth::user()->id);
        } else {
            // Fetch the store and its products from the database
            $store = Store::with(['products.images'])->first();

            // If no store is found, return an empty store object to avoid errors
            if (!$store) {
                $store = new Store();
            }

            // Cache the store data for 5 minutes
            Cache::put($cacheKey, $store, now()->addMinutes(5));

            // Debugging: Log or dump a message indicating fresh data is being fetched
            // Log::info('Rendering dashboard from database for user: ' .  Auth::user()->id);
            // OR
            // dd('Rendering dashboard from database for user: ' .  Auth::user()->id);
        }

        // Fetch the latest 3 comments
        $latestComments = Comment::with('user')->latest()->take(3)->get();

        // Pass the store and latest comments data to the view
        return view('customer.dashboard', compact('store', 'latestComments'));
    }

/**
 * Inject user-specific data into the cached view.
 */
private function injectUserData($sharedView, $user)
{
    // Replace placeholders or inject user-specific data
    $userData = [
        'user_name' => $user->name,
        'profile_link' => route('profile.edit'),
        'logout_link' => route('logout'),
    ];

    // Inject user data into the shared view
    foreach ($userData as $key => $value) {
        $sharedView = str_replace("{{ $key }}", $value, $sharedView);
    }

    return $sharedView;
}

    public function toggleLike(Product $product)
    {
        $user = Auth::user();

        // Check if the user has already liked the product
        $like = Like::where('user_id', $user->id)
                    ->where('product_id', $product->id)
                    ->first();

        if ($like) {
            // Unlike the product
            $like->delete();
            $liked = false;
        } else {
            // Like the product
            Like::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);
            $liked = true;
        }

        // Get the updated like count
        $likeCount = $product->likes()->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'likeCount' => $likeCount,
        ]);
    }

    public function addComment(Request $request, Product $product)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'comment' => $request->comment,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully!',
        ]);
    }

    public function getLatestComments(Product $product)
    {
        // Fetch the latest 3 comments for the product with the user who made the comment
        $comments = $product->comments()
                            ->with('user')
                            ->latest()
                            ->take(3)
                            ->get();

        return response()->json($comments);
    }

    /**
     * View page that displays all comments for a product
     */
    public function viewComments(Product $product)
    {
        // Fetch all comments for the specific product
        $comments = $product->comments()->with('user')->latest()->get();

        // Return the comments view with the product and comments data
        return view('customer.comments', compact('product', 'comments'));
    }

    public function updateComment(Request $request, Comment $comment)
    {
        // Ensure the authenticated user is the owner of the comment
        if ($comment->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to edit this comment.',
            ], 403);
        }

        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        // Update the comment
        $comment->update([
            'comment' => $request->comment,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment updated successfully!',
        ]);
    }

    public function deleteComment(Comment $comment)
    {
        // Ensure the authenticated user is the owner of the comment
        if ($comment->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to delete this comment.',
            ], 403);
        }

        // Delete the comment
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully!',
        ]);
    }
}
