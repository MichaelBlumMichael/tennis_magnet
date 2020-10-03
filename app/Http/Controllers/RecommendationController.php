<?php

namespace App\Http\Controllers;
use Session, Exeption;
use Illuminate\Http\Request;
use App\Recommendation;
use App\Categorie;
use App\Product;
use App\Http\Requests\RecommendationsRequest;



class RecommendationController extends MainController
{

    static public function index(){

        $recommendations = Recommendation::getRecommendedProductsData();
        return view('cms.recommendation_table', compact('recommendations'));
    }
    
        

    static public function storeRecommendation(RecommendationsRequest $request){
        Recommendation::saveNew($request);
        return redirect('cms/recom');
    }

    static public function getCategories(){
        $categories = Categorie::all();
        return view('cms.recommendation_choose_category', compact('categories'));
    }

    
    static public function getCategoryProducts(Request $request){
        $recommended_products = Product::where('categorie_id', $request->category)->get();
        return view('cms.recommendation_choose_product', compact('recommended_products'));
    }

    public function viewOfDeleteRecommendation($id)
    {
        self::$to_view['item_id'] = $id;
        return view('cms.recommendation_delete', self::$to_view);
    }

    public function destroy($id)
    {
        try{
            Recommendation::destroy($id);
            Session::flash('sm', 'Item has been deleted');

        } catch(Exception  $ex){
            Session::flash('em', 'Item can not be deleted, please delete other relations');
        }
        return redirect('cms/recom');
    }

    
}
