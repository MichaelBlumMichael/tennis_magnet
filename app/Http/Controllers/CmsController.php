<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Cart;

class CmsController extends MainController
{
    static public function dashboard(){
        $products = Product::inStock();
        return view('cms.cms_home', compact('products'));
    }

    static public function orders(){
        self::$to_view['orders'] = Order::getAll();
        return view('cms.orders_index', self::$to_view);
    }

}
