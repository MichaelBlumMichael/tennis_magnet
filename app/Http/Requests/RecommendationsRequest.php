<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RecommendationsRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }


    public function rules(Request $request)
    {
        return [
            'product' => 'required',
        ];
    }
}
