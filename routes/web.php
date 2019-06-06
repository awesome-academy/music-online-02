<?php
use App\Http\Controllers\PageController;

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
Route::group(['prefix' => 'admin'],function()
{
    Route::get('/',[
        'as' => 'home_ad.',
        'uses' => 'admin\HomeController@home'
    ]);
    Route::get('/categories',[
        'as' => 'categories',
        'uses' => 'admin\CategoryController@listCategory'
    ]);
    Route::get('/addCategories',[
        'as' => 'categories.add_view',
        'uses' => 'admin\CategoryController@addViewCategory'
    ]);
    Route::post('/addProcessCategory',[
        'as' => 'categories.add_process',
        'uses' => 'admin\CategoryController@addProcessCategory'
    ]);
    Route::get('updateCategory/{id}',[
        'as' => 'categories.update_view',
        'uses' => 'admin\CategoryController@updateViewCategory'
    ]);
    Route::post('updateProcessCategory/{id}',[
        'as' => 'categories.update_process',
        'uses' => 'admin\CategoryController@updateProcessCategory'
    ]);
    Route::get('deleteCategory/{id}',[
        'as' => 'categories.delete',
        'uses' => 'admin\CategoryController@deleteCategory'
    ]);
    //// Artist
    Route::get('/artists',[
        'as' => 'artists',
        'uses' => 'admin\ArtistController@listArtist'
    ]);
    Route::get('/addArtists',[
        'as' => 'artists.add_view',
        'uses' => 'admin\ArtistController@addViewArtist'
    ]);
    Route::post('/addProcessArtists',[
        'as' => 'artists.add_process',
        'uses' => 'admin\ArtistController@addProcessArtist'
    ]);
    Route::get('updateArtists/{id}',[
        'as' => 'artists.update_view',
        'uses' => 'admin\ArtistController@updateViewArtist'
    ]);
    Route::post('updateProcessArtists/{id}',[
        'as' => 'artists.update_process',
        'uses' => 'admin\ArtistController@updateProcessArtist'
    ]);
    Route::get('deleteArtists/{id}',[
        'as' => 'artists.delete',
        'uses' => 'admin\ArtistController@deleteArtist'
    ]);
    ////// Music
    Route::get('/musics',[
        'as' => 'musics',
        'uses' => 'admin\MusicController@listMusic'
    ]);
    Route::get('/addMusics',[
        'as' => 'musics.add_view',
        'uses' => 'admin\MusicController@addViewMusic'
    ]);
    Route::post('/addProcessMusics',[
        'as' => 'musics.add_process',
        'uses' => 'admin\MusicController@addProcessMusic'
    ]);
    Route::get('updateMusics/{id}',[
        'as' => 'musics.update_view',
        'uses' => 'admin\MusicController@updateViewMusic'
    ]);
    Route::post('updateProcessMusics/{id}',[
        'as' => 'musics.update_process',
        'uses' => 'admin\MusicController@updateProcessMusic'
    ]);
    Route::get('deleteMusics/{id}',[
        'as' => 'musics.delete',
        'uses' => 'admin\MusicController@deleteMusic'
    ]);
}
);
////////////
Auth::routes();
Route::get('/', 'PageController@index');
Route::get('/musics/{id}', 'PageController@getJsonMusic');
Route::get('/albums/{id}', 'PageController@getJsonAlbum');
Route::get('artist/{id}', 'PageController@artist');
Route::resource('music', 'MusicController', ['only' => ['show']]);
Route::resource('album', 'AlbumController', ['only' => ['show']]);
Route::get('forgot-pass', 'Auth\ForgotPasswordController@getResetPass');
Route::post('forgot-pass', 'Auth\ForgotPasswordController@postResetPass');
Route::get('reset/pass', 'Auth\ForgotPasswordController@resetPass')->name('reset.pass');
Route::post('reset/pass', 'Auth\ForgotPasswordController@saveResetPass');
Route::get('category/{id}', 'PageController@getCategory');
