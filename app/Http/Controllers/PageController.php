<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SellerResource;
use App\Models\Client;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;


class PageController extends Controller
{
    public function welcome(Request $request): Factory|View|Application
    {

        $products = new ProductCollection(Product::all());

        return view('welcome', compact('products'));
    }

    public function confirmeEmail($id)
    {
        $client = Client::findOrfail($id)->first();
        $client->credits = 1000;
        $client->email_verified_at = Carbon::now();

        if($client->save()) {
            return view('pages.client.confirmeEmail');
        }
    }

    public function loginType()
    {
        return view('pages.logintype');
    }

    public function addProduct()
    {
        return view('pages.seller.addproduct');
    }

    public function updateProduct($slug)
    {
        $product = new ProductResource(Product::where('slug', $slug)->first());
        return view('pages.seller.updateproduct',  compact('product'));
    }

    public function getProducts()
    {
        return view('pages.seller.myproducts');
    }

    public function productPage($slug)
    {
        $product = new ProductResource(Product::where('slug', $slug)->first());
        $seller = new SellerResource(Seller::findOrFail($product->seller_id));

        return view('pages.product', compact('product', 'seller'));
    }

    public function myAccount()
    {
        return view('pages.client.myaccount');
    }

    public function myOrders()
    {
        return view('pages.client.myorders');
    }

    public function mySales()
    {
        return view('pages.seller.mysales');
    }


    public function wishlist()
    {
        $wishlist = Wishlist::where('client_id', Auth::id())->with('product')->get();

        return view('pages.client.myfavorites', compact('wishlist'));
    }

    public function mywishlistRemove(Request $request)
    {
        $wishlist = Wishlist::query()
            ->where('client_id', $request->input('userId'))
            ->where('product_id', $request->input('productId'))
            ->first();

        if ($wishlist) {
            $wishlist->delete();
        }

        Toast::title('O produto foi removido da sua Wishlist');

        return redirect()->back();
    }
}
