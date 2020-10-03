<?php

namespace App;
use Illuminate\Http\Request;
use DB, Session;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{

    static public function saveNew($request){
       
        $recommendation = new self();
        $recommendation->product_id = $request['product'];
        $recommendation->save();
        Session::flash('sm', 'Your recommendation was saved.');
    }

    static public function getRecommendedProductsData(){
        return $recommended_products = DB::table('recommendations as rec')
        ->select('p.id', 'p.ptitle', 'pimage', 'rec.id as rid')
        ->join('products as p', 'p.id', '=', 'rec.product_id')
        ->paginate(10);
    }

    static public function recToHomePage(){
        return DB::table('recommendations as rec')
        ->join('products as p', 'p.id', '=', 'rec.product_id')
        ->join('categories as c', 'c.id', '=', 'p.categorie_id')
        ->select('p.ptitle', 'p.pimage', 'p.price', 'p.purl', 'c.url')
        ->get();
    }


};