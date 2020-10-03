<?php

namespace App\Http\Controllers;

use DB, Cart, Session;
use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Order;

class ShopController extends MainController
{
    public function categories(){
        self::$to_view['page_title'] .= 'Categiries';
        self::$to_view['categories'] = Categorie::all();
        self::$to_view['products'] = Product::all();

       return view('categories', self::$to_view); 
    }

    public function products($curl){
        $products = Product::getProducts($curl);
        self::$to_view['categories'] = Categorie::all();
        if (!$products->count()) abort(404);
        self::$to_view['products'] = $products;
        self::$to_view['page_title'] .= $products[0]->title;
       return view('products', self::$to_view);
    }

    public function addToCart(Request $request){
        Product::addToCart($request['product_id']);
     }

     public function cart(Request $request){
        if (!empty($request['removeItem'])) return $this->removeItem($request['removeItem']);
        self::$to_view['page_title'] .= 'Cart';
        $cart = Cart::getContent()->toArray();
        sort($cart);
        self::$to_view['cart'] = $cart;
        self::$to_view['max_product_quantity'] = 6;
        return view('cart', self::$to_view);
    }

    public function removeItem($item_id){
        Product::removeItem($item_id);
        return redirect('shop/cart');
    }

    public function updateCart(Request $request){
        Product::updateCart($request);
    }

    public function checkout(){
        if( Cart::isEmpty()) return redirect('shop/cart');
        
        if( ! Session::has('user_id') ){
            return redirect('user/login?backTo=shop/cart');
        }
        Order::saveNew();
        return redirect('shop');
    }

    public function clearCart(){
        Product::clearCart();
        return redirect('shop/cart');
    }

    public function productDetails($curl, $purl){
        $product = Product::where('purl', '=', $purl)->first();
        if(!$product) abort(404);
        self::$to_view['page_title'] .= $product->ptitle;
        self::$to_view['product'] = $product;
        self::$to_view['categories'] = Categorie::all();
        return view('product_details', self::$to_view);
    }

    
}
