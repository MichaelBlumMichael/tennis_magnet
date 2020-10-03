<?php

namespace App;
use DB, Cart, Session, FileManager, Image;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    static public function getProducts($curl){
        return $products = DB::table('products as p')
        ->select('p.*', 'c.title', 'c.url')
        ->join('categories as c', 'c.id', '=', 'p.categorie_id')
        ->where('c.url', '=', $curl)
        ->orderBy('p.price')
        ->paginate(10);   
    }

    static public function addToCart($pid){
        if(is_numeric($pid) && $product = self::find($pid)){
            
            if(! Cart::get($pid)){
                
                Cart::add(array(
                        'id' => $pid,
                        'name' => $product->ptitle,
                        'price' => $product->price,
                        'quantity' => 1,
                        'attributes' => [
                            'image' => $product->pimage,
                        ]
                    )
                );
                DB::table('products')->where('id', '=', $pid)->decrement('in_stock', 1);              

            }
        };
    }

    static public function clearCart(){
        $cart = Cart::getContent()->toArray();
        foreach($cart as $item){
            Cart::remove($item['id']);
            DB::table('products')->where('id', '=', $item['id'])->increment('in_stock', $item['quantity']);              
        };
    }

    static public function removeItem($item_id){
        $item = Cart::get($item_id)->toArray();
        DB::table('products')
        ->where('id', '=', $item_id)
        ->increment('in_stock', $item['quantity']);              
        Cart::remove($item_id);
    }

    static public function updateCart($request){
        if(!empty($request['pid']) && is_numeric($request['pid']) ){
            Cart::update($request['pid'], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request['pquantity'], 
                ),  
            ));
            DB::table('products')
            ->where('id', '=', $request['pid'])
            ->decrement('in_stock', $request['pquantity'] -1);              
        }
    }

    static public function saveNew($request){
        $product = new self();
        $product->categorie_id = $request['category'];
        $product->ptitle = $request['title'];
        $product->particle = $request['description'];
        $product->in_stock = $request['quantity'];
        $product->pimage = FileManager::loadImage($request);
        self::imageResize($product->pimage);
        $product->price = $request['price'];
        $product->purl = $request['url'];
        $product->save();
        Session::flash('sm', 'Your product was saved.');
    }

    static public function updateItem($request, $id){
        $product = self::find($id);
        $product->categorie_id = $request['category'];
        $product->ptitle = $request['title'];
        $product->particle = $request['description'];
        $product->in_stock = $request['quantity'];
        $product->pimage = FileManager::loadImage($request, $product->pimage);
        self::imageResize($product->pimage);
        $product->price = $request['price'];
        $product->purl = $request['url'];
        $product->save();
        Session::flash('sm', 'Your product was updated.');
    }

    static public function imageResize($image_name){
        $img = Image::make(public_path(). '/images/demo/' . $image_name);
        $img->resize(570, 480);
        $img->save();
    }
    static public function inStock(){
        return $products = DB::table('products')->select('*')
                ->orderBy('in_stock', 'asc')
                ->get();
    }
}
