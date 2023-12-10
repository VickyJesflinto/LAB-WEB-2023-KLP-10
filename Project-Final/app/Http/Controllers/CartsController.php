<?php

namespace App\Http\Controllers;


use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        $carts = Carts::orderBy('created_at', 'DESC')->get();
        $products = Products::all();
        // mengambil data dari tabel dan mengurutkan secara desc
        return view('cart/carts', compact('carts', 'products'));  // compact artinya kita teruskan data dari products
    }

    public function addToCart(Request $request, $productId)
    {
        
        $products = Products::where('id', $productId)->get();
        $alreadyCart = Carts::where('user_id', auth()->user()->id)
            ->where('order_id', null)
            ->where('product_id', $productId)
            ->first();
        foreach($products as $product) {
            if ($alreadyCart) {
                $alreadyCart->quantity = $alreadyCart->quantity + 1;
                $alreadyCart->amount = $product->buyPrice + $alreadyCart->amount;
                
                if ($product->quantityInStock < $alreadyCart->quantity || $product->quantityInStock <= 0) {
                    return redirect()->back()->with('error', 'Stock not sufficient!');
                }
                
                $alreadyCart->save();
            } else {
                $cart = new Carts;
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $productId;
                $cart->price = $product->buyPrice;
                $cart->quantity = 1;
                $cart->amount = $cart->price * $cart->quantity;
                
                if ($product->quantityInStock < $cart->quantity || $product->quantityInStock <= 0) {
                return redirect()->back()->with('error', 'Stock not sufficient!');
            }
            
            $cart->save();
            }
        }
        
        return redirect()->route('carts.index')->with('success', 'Product successfully added to cart');
    }

    public function cartDelete($productId)
    {
        $cart = Carts::find($productId);
        $cart->delete();
        return redirect()->route('carts.index')->with('success', 'Cart successfully removed');
    }


}
