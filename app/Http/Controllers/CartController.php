<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = $user->carts()->with('image')->get(); // Get all cart items and load associated images

        return view('cart.index', compact('cartItems'));
    }

    public function addToCart($imageId)
    {
        $user = auth()->user();

        // Check if the image is already in the user's cart
        if ($user->carts()->where('image_id', $imageId)->exists()) {
            return back()->with('info', 'This image is already in your cart!');
        }

        // Add the image to the cart
        $user->carts()->create([
            'image_id' => $imageId
        ]);

        return back()->with('success', 'Image added to cart!');
    }

    public function removeFromCart($imageId)
    {
        $user = auth()->user();

        // Find and remove the image from the user's cart
        $cartItem = $user->carts()->where('image_id', $imageId)->first();

        if ($cartItem) {
            $cartItem->delete();
            return back()->with('success', 'Image removed from cart!');
        }

        return back()->with('error', 'Image not found in cart!');
    }

}
