<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Categorie;
use Session, Exception;

class CategoriesController extends MainController

{

    public function index()
    {
        self::$to_view['categories'] = Categorie::all();
        return view('cms.categories_index', self::$to_view);
    }

  
    public function create()
    {
        return view('cms.categories_create', self::$to_view);
    }

    public function store(CategoriesRequest $request)
    {
        Categorie::saveNew($request);
        return redirect('cms/categories');
    }

    public function show($id)
    {
        self::$to_view['item_id'] = $id;
        return view('cms.categories_delete', self::$to_view);
    }


    public function edit($id)
    {
        self::$to_view['item'] = Categorie::find($id);
        return view('cms.categories_edit', self::$to_view);
    }

   
    public function update(CategoriesRequest $request, $id)
    {
       Categorie::updateItem($request, $id);
       return redirect('cms/categories');

    }

 
    public function destroy($id)
    {
        try{
            Categorie::destroy($id);
            Session::flash('sm', 'Item has been deleted');

        } catch(Exception  $ex){
            Session::flash('em', 'Item can not be deleted, please delete other relations');
        }
        return redirect('cms/categories');


    }
}
