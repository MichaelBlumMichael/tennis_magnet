<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Menu extends Model
{
    static public function saveNew($request){
        $menu = new self();
        $menu->page_name = $request['page_name'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();
        Session::flash('sm', 'Menu Saved');
        
    }

    static public function updateItem($request, $id){
        $menu = self::find($id);
        $menu->page_name = $request['page_name'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();
        Session::flash('sm', 'Menu Updated');
    }
}
