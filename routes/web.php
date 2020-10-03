<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@home' );

# Cms Routing
Route::middleware(['cmsguard'])->group(function(){
    Route::prefix('cms')->group(function () {
        Route::get('dashboard', 'CmsController@dashboard' );
        Route::get('orders', 'CmsController@orders' );
        Route::get('/recom', 'RecommendationController@index' );
        Route::get('/recom-categroies', 'RecommendationController@getCategories' );
        Route::get('/recom-delete/{id}', 'RecommendationController@viewOfDeleteRecommendation' );
        Route::delete('/final-delete-recommendation/{id}', 'RecommendationController@destroy' );
        Route::post('/recomp', 'RecommendationController@storeRecommendation' );
        Route::post('/recom-category', 'RecommendationController@getCategoryProducts' );
        Route::resource('menu', 'MenuController');
        Route::resource('content', 'ContentController');
        Route::resource('categories', 'CategoriesController');
        Route::resource('products', 'ProductsController');
    });
});

# User routing
Route::prefix('user')->group(function () {
    Route::get('/signup', 'UserController@signup' );
    Route::post('/signup', 'UserController@postSignup' );
    Route::post('/login', 'UserController@postLogin' );
    Route::get('/logout', 'UserController@logout' );
    Route::get('/login', 'UserController@login' );
});

# Shop Routing
Route::prefix('shop')->group(function () {
    Route::get('/', 'ShopController@categories' );
    Route::get('/checkout', 'ShopController@checkout');
    Route::get('/add-to-cart', 'ShopController@addToCart');
    Route::get('/update-cart', 'ShopController@updateCart');
    Route::get('/clear-cart', 'ShopController@clearCart');
    Route::get('/cart', 'ShopController@cart');
    Route::get('/{curl}', 'ShopController@products');
    Route::get('/{curl}/{purl}', 'ShopController@productDetails');
});

Route::get('{menu_url}', 'PagesController@content' );



