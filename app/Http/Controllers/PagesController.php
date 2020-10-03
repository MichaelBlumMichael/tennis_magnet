<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Recommendation;
use App\Categorie;



class PagesController extends MainController
{
    static public function home(){
        self::$to_view['recommendations'] = Recommendation::recToHomePage();
        self::$to_view['categories'] = Categorie::all();
        return view('home', self::$to_view);
    }

    public function content($menu_url){
        self::$to_view['contents'] = Content::getAll($menu_url);
        if(! self::$to_view['contents']->count()) abort(404);
        self::$to_view['page_title'] .= self::$to_view['contents'][0]->title;
        return view('content', self::$to_view);
    }

}
