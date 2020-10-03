<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\Menu;
use App\Content;
use Session, Exeption;

class ContentController extends MainController

{

    public function index()
    {
        self::$to_view['contents'] = Content::all();
        return view('cms.content_index', self::$to_view);
    }


    public function create()
    {
        return view('cms.content_create', self::$to_view);
    }


    public function store(ContentRequest $request)
    {
        Content::saveNew($request);
        return redirect('cms/content');
    }


    public function show($id)
    {
        self::$to_view['item_id'] = $id;
        return view('cms.content_delete', self::$to_view);
    }


    public function edit($id)
    {
        self::$to_view['item'] = Content::find($id);
        return view('cms.content_edit', self::$to_view);
    }

   
    public function update(ContentRequest $request, $id)
    {
       Content::updateItem($request, $id);
       return redirect('cms/content');

    }


    public function destroy($id)
    {
        Content::destroy($id);
        Session::flash('sm', 'Item has been deleted');
        return redirect('cms/content');
    } 
}
