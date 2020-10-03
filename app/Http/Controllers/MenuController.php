<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Menu;
use Session, Exception;

class MenuController extends MainController

{

    public function index()
    {
        return view('cms.menu_index', self::$to_view);
    }


    public function create()
    {
        return view('cms.menu_create', self::$to_view);
    }


    public function store(MenuRequest $request)
    {
        Menu::saveNew($request);
        return redirect('cms/menu');
    }


    public function show($id)
    {
        self::$to_view['item_id'] = $id;
        return view('cms.menu_delete', self::$to_view);
    }


    public function edit($id)
    {
        self::$to_view['item'] = Menu::find($id);
        return view('cms.menu_edit', self::$to_view);
    }

   
    public function update(MenuRequest $request, $id)
    {
       Menu::updateItem($request, $id);
       return redirect('cms/menu');

    }


    public function destroy($id)
    {
        try{
            Menu::destroy($id);
            Session::flash('sm', 'Item has been deleted');

        } catch(Exception  $ex){
            Session::flash('em', 'Item can not be deleted, please delete other relations');
        }
        return redirect('cms/menu');


    }
}
