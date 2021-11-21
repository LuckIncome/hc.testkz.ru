<?php

namespace App\Http\Controllers;

use App\Models\Analysis as Product;
use App\Models\Application;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class CartController extends Controller
{
    public function index() {
        return view('cart.index');
    }

    public function clear()
    {
        \Cart::clear();

        $cartCount = \Cart::getTotalQuantity();
        $cartItems = \Cart::getContent();
        $cartTotal = \Cart::getTotal();

        return response()->json(['count' => $cartCount, 'items' => $cartItems, 'total' => $cartTotal]);
    }

    public function update(Request $request)
    {
        $product_id = (int)$request->get('productId');

        if (!\Cart::has($product_id)) {
            $product = Product::find($product_id);
            \Cart::add([
                'id' => (int)$product->id,
                'name' => $product->title,
                'price' => (int)$product->price,
                'quantity' => 1,
                'associatedModel' => $product
            ]);
        }

        $cartCount = \Cart::getTotalQuantity();
        $cartItems = \Cart::getContent();
        $cartTotal = \Cart::getTotal();

        return response()->json(['count' => $cartCount, 'items' => $cartItems, 'total' => $cartTotal]);
    }

    public function remove(Request $request)
    {
        $product_id = (int)$request->get('productId');
        \Cart::remove($product_id);

        $cartCount = \Cart::getTotalQuantity();
        $cartItems = \Cart::getContent();
        $cartTotal = \Cart::getTotal();

        return response()->json(['count' => $cartCount, 'items' => $cartItems, 'total' => $cartTotal]);
    }

    public function getContent()
    {
        $cartCount = \Cart::getTotalQuantity();
        $cartItems = \Cart::getContent();
        $cartTotal = \Cart::getTotal();

        return response()->json(['count' => $cartCount, 'items' => $cartItems, 'total' => $cartTotal]);
    }

    public function printPdf()
    {
        $uuid = Carbon::now()->timestamp;
        $data = ['items'=>\Cart::getContent(),'total'=>\Cart::getTotal(), 'locale' => session()->get('locale'),'uuid' => $uuid];
        view()->share('data',$data);
        $file = 'applications/'.$uuid.'.pdf';
        $pdf = \PDF::loadView('cart.pdf', $data)->save(storage_path('app/public/') . $file);
        $application = new Application([
            'uuid' => $uuid,
            'amount' => $data['total'],
            'file' => $file
        ]);
        $application->save();

        return response()->json(['application'=> $application]);
    }
}
