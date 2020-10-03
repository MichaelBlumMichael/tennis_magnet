<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ContentRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }


    public function rules(Request $request)
    {
        return [
            'menu' => 'required',
            'title' => 'required|min:2|max:255',
            'article' => 'required|min:2|',

        ];
    }
}
