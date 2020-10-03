<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MainController extends Controller
{
    public static $to_view = ['page_title' => 'Tennis Magnet | '];
   
    public function __construct(){
        self::$to_view['menu'] = Menu::all();
    }
};