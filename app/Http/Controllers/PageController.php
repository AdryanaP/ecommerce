<?php

namespace App\Http\Controllers;

use App\Filament\Resources\OrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SellerResource;
use App\Http\Resources\WishlistCollection;
use App\Http\Resources\WishlistResource;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class PageController extends Controller
{
    public function welcome(Request $request): Factory|View|Application
    {

        $products = new ProductCollection(Product::all());

        return view('welcome', compact('products'));
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

    // public function mypersonaldataUpdate(Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . auth()->user()->id],
    //         'document' => ['required', 'string', 'max:14', 'unique:' . User::class . ',document,' . auth()->user()->id, 'cpf'],
    //         'cellphone' => ['required', 'string', 'max:16', 'unique:' . User::class . ',cellphone,' . auth()->user()->id],
    //         'genre' => ['required', 'string', 'max:1', 'in:f,m'],
    //         'birthdate' => ['required', 'date_format:d/m/Y'],
    //         'newsletter' => ['nullable'],
    //     ]);

    //     $request->user()->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'document' => $request->document,
    //         'genre' => $request->genre,
    //         'newsletter' => $request->newsletter,
    //         'cellphone' => $request->cellphone,
    //         'birthdate' => Carbon::createFromFormat('d/m/Y', $request->birthdate),
    //     ]);

    //     Toast::title('Dados atualizado!')
    //         ->backdrop()
    //         ->autoDismiss(1);

    //     return redirect()->back();
    // }


    // public function myorders()
    // {
    //     $orders = new OrderResource(
    //         Order::query()
    //             ->where('client_id', Auth::id())
    //             ->latest()
    //             ->get()
    //     );

    //     return view('pages.myorders', compact('orders'));
    // }


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

    // public function checkout(Request $request)
    // {
    //     $cartItems = \Cart::getContent();
    //     $amount = [
    //         'subtotal' => str_replace(',', '', \Cart::getSubTotal()) / 100,
    //         'total' => (str_replace(',', '', \Cart::getSubTotal()) / 100) + $request->input('shipping_shipping_price')
    //     ];
    //     $userSimple = User::where('id', Auth::id())->first();
    //     // $user = new UserResource($userSimple);


    //     return view('pages.checkout', compact('cartItems', 'amount', 'userSimple'));
    // }

    // public function thankyou(Order $orderId)
    // {
    //     info($orderId);
    //     $order = Order::findOrFail($orderId);
    //     info($order);
    //     return view('pages.checkout.success', compact('order'));
    // }

    // public function success($orderId)
    // {
    //     info($orderId);
    //     $order = Order::findOrFail($orderId);
    //     info($order);
    //     return view('pages.success', compact('order'));
    // }
}
