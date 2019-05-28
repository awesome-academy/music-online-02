<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'admin'],function()
{
    Route::get('/',[
        'as'=>'home_ad.',
        'uses'=>'admin\HomeController@home'
    ]);
    Route::get('/categories',[
        'as'=>'categories',
        'uses'=>'admin\CategoryController@listCategory'
    ]);
    Route::get('/addcategories',[
        'as'=>'categories.add_view',
        'uses'=>'admin\CategoryController@addViewCategory'
    ]);
    Route::post('/addProcessCategory',[
        'as'=>'categories.add_process',
        'uses'=>'admin\CategoryController@addProcessCategory'
    ]);
    Route::get('updateCategory/{id}',[
        'as'=>'categories.update_view',
        'uses'=>'admin\CategoryController@updateViewCategory'
    ]);
    Route::post('updateProcessCategory/{id}',[
        'as'=>'categories.update_process',
        'uses'=>'admin\CategoryController@updateProcessCategory'
    ]);
    Route::get('deleteCategory/{id}',[
        'as'=>'categories.delete',
        'uses'=>'admin\CategoryController@deleteCategory'
    ]);
}
);
///////////////////////////////////////////////
Route::get('/', 'HomeController@index');

Route::get('/', 'PageController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
