<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class WelcomeController extends Controller
{
    /**
     * Display the welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch stores and products
        $stores = Store::with(['products.images'])->get();

        return view('welcome', compact('stores'));
    }
}
