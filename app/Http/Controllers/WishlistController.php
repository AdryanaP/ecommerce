<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function toggle(Request $request)
    {
        if (! $request->clientId) {
            return response()->json(false);
        }

        if ($wishlist = Wishlist::where('product_id', $request->productId)->where('client_id', $request->clientId)->first()) {
            optional($wishlist)->delete();
            return response()->json([
                'liked' => false,
            ]);
        } else {
            Wishlist::create([
                'product_id' => $request->productId,
                'client_id' => $request->clientId
            ]);

            return response()->json([
                'liked' => true,
            ]);
        }
    }

    public function check(Request $request)
    {
        if (! $request->clientId) {
            return response()->json(false);
        }

        if ($wishlist = Wishlist::where('product_id', $request->productId)->where('client_id', $request->clientId)->first()) {
            return response()->json([
                'liked' => true,
            ]);
        } else {
            return response()->json([
                'liked' => false,
            ]);
        }
    }
}
