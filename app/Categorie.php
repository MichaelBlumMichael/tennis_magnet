<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use FileManager, Session, Image;

class Categorie extends Model
{

    static public function saveNew($request){
        $categorie = new self();
        $categorie->title = $request['title'];
        $categorie->description = $request['description'];
        $categorie->image = FileManager::loadImage($request);
        self::imageResize($categorie->image);
        $categorie->url = $request['url'];
        $categorie->save();
        Session::flash('sm', 'Your category was saved.');
        
    }

    static public function updateItem($request, $id){
        $categorie = self::find($id);
        $categorie->title = $request['title'];
        $categorie->description = $request['description'];
        $categorie->image = FileManager::loadImage($request, $categorie->image);
        self::imageResize($categorie->image);
        $categorie->url = $request['url'];
        $categorie->save();
        Session::flash('sm', 'Category Updated.');
    }

    static public function imageResize($image_name){
        $img = Image::make(public_path(). '/images/demo/' . $image_name);
        $img->resize(202, 170);
        $img->save();
    }

}
