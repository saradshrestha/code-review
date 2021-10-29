<?php

namespace Cart\Repositories;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartInterface
{
    public function index(){
        $products = DB::table('products')->get();
        return view('Cart::backend.carts.index',compact ('products'));
    }

    public function getAllCart(){
        return view('Cart::backend.carts.getAllCarts');
    }

    public function getCart (){
        $view = view ('Cart::backend.carts.cart')->render();
        return response()->json([
            'view' =>  $view
        ]);
    }

    public function store($request){
        //Session::forget('cart');
        $product = DB::table('products')->where('id',$request->id)->first();
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                $request->id => [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->product_price,
                ]
            ];
            session()->put('cart', $cart);
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart'
            ]);
        }
        if(isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
            session()->put('cart', $cart);
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart'
            ]);
        }
        $cart[$request->id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
        ];
        session()->put('cart', $cart);
        return response()->json([
            'success' => true,
            'message' => 'Product added to Cart'
        ]);
    }

    public function update ($request){
        if($request->id and $request->product_quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->product_quantity;
            session()->put('cart', $cart);
            $view = view ('Cart::backend.carts.cart')->render();
            return response()->json([
                'message' => "Product Quantity Updated.",
                'view' =>  $view
            ]);
        }
    }

    public function destroy($request){
        if($request->id)
        {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $view = view ('Cart::backend.carts.cart')->render();
            return response()->json([
                'message' => "Product Removed From Cart.",
                'view' =>  $view
            ]);
        }
    }



}
