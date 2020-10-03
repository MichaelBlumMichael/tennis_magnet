<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Categorie;
use App\Product;
use Session, Exception;

class ProductsController extends MainController

{
 
    public function index()
    {
        self::$to_view['products'] = Product::all();
        return view('cms.products_index', self::$to_view);
    }


    public function create()
    {
        self::$to_view['categories'] = Categorie::all();
        return view('cms.products_create', self::$to_view);
    }


    public function store(ProductRequest $request)
    {
        Product::saveNew($request);        
        return redirect('cms/products');
    }


    public function show($id)
    {
        self::$to_view['item_id'] = $id;
        return view('cms.products_delete', self::$to_view);
    }

 
    public function edit($id)
    {
        self::$to_view['item'] = Product::find($id);
        self::$to_view['categories'] = Categorie::all();
        return view('cms.products_edit', self::$to_view);
    }

   
    public function update(ProductRequest $request, $id)
    {
       Product::updateItem($request, $id);
       return redirect('cms/products');

    }


    public function destroy($id)
    {
        try{
            Product::destroy($id);
            Session::flash('sm', 'Item has been deleted');

        } catch(Exception  $ex){
            Session::flash('em', 'Item can not be deleted, please delete other relations');
        }
        return redirect('cms/products');


    }
}
