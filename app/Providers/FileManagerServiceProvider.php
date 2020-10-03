<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Str, Image;

class FileManagerServiceProvider extends ServiceProvider
{
    const DEFAULT_FILE_NAME = 'no-image.jpg';
    const ALLOWED_IMAGES = ['jpg', 'png', 'jpeg', 'gif', 'bmp'];

    public function register()
    {
        //
    }

   
    public function boot()
    {
        //
    }

    static public function loadImage($request, $default_name = false){
        $image_name = $default_name ? $default_name : self::DEFAULT_FILE_NAME;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $file = $request->file('image');
            if(in_array(strtolower($file->getClientOriginalExtension()), self::ALLOWED_IMAGES )){
                $image_name = self::generateRandomFileName($file->getClientOriginalName());
                $request->file('image')->move(public_path(). '/images/demo', $image_name); 

            }
        }

        return $image_name;
    }

    static private function generateRandomFileName($original_name){
        return date('Y.m.d.H.i.S') .'-'. Str::random(5) .'-'. $original_name;
    }
}
