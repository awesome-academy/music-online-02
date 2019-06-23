<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;

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

Route::group(['middleware' => ['checkuser', 'locale']], function(){
    Route::group(['prefix' => 'admin'], function()
    {
        Route::get('/', [
            'as' => 'home_ad.',
            'uses' => 'admin\HomeController@home'
        ]);
        Route::get('/categories', [
            'as' => 'categories',
            'uses' => 'admin\CategoryController@listCategory'
        ]);
        Route::get('/addCategories', [
            'as' => 'categories.add_view',
            'uses' => 'admin\CategoryController@addViewCategory'
        ]);
        Route::post('/addProcessCategory', [
            'as' => 'categories.add_process',
            'uses' => 'admin\CategoryController@addProcessCategory'
        ]);
        Route::get('updateCategory/{id}', [
            'as' => 'categories.update_view',
            'uses' => 'admin\CategoryController@updateViewCategory'
        ]);
        Route::post('updateProcessCategory/{id}', [
            'as' => 'categories.update_process',
            'uses' => 'admin\CategoryController@updateProcessCategory'
        ]);
        Route::get('deleteCategory/{id}', [
            'as' => 'categories.delete',
            'uses' => 'admin\CategoryController@deleteCategory'
        ]);
        //// Artist
        Route::get('/artists', [
            'as' => 'artists',
            'uses' => 'admin\ArtistController@listArtist'
        ]);
        Route::get('/addArtists', [
            'as' => 'artists.add_view',
            'uses' => 'admin\ArtistController@addViewArtist'
        ]);
        Route::post('/addProcessArtists', [
            'as' => 'artists.add_process',
            'uses' => 'admin\ArtistController@addProcessArtist'
        ]);
        Route::get('updateArtists/{id}', [
            'as' => 'artists.update_view',
            'uses' => 'admin\ArtistController@updateViewArtist'
        ]);
        Route::post('updateProcessArtists/{id}', [
            'as' => 'artists.update_process',
            'uses' => 'admin\ArtistController@updateProcessArtist'
        ]);
        Route::get('deleteArtists/{id}', [
            'as' => 'artists.delete',
            'uses' => 'admin\ArtistController@deleteArtist'
        ]);
        ////// Music
        Route::get('/musics', [
            'as' => 'musics',
            'uses' => 'admin\MusicController@listMusic'
        ]);
        Route::get('/addMusics', [
            'as' => 'musics.add_view',
            'uses' => 'admin\MusicController@addViewMusic'
        ]);
        Route::post('/addProcessMusics', [
            'as' => 'musics.add_process',
            'uses' => 'admin\MusicController@addProcessMusic'
        ]);
        Route::get('updateMusics/{id}', [
            'as' => 'musics.update_view',
            'uses' => 'admin\MusicController@updateViewMusic'
        ]);
        Route::post('updateProcessMusics/{id}', [
            'as' => 'musics.update_process',
            'uses' => 'admin\MusicController@updateProcessMusic'
        ]);
        Route::get('deleteMusics/{id}', [
            'as' => 'musics.delete',
            'uses' => 'admin\MusicController@deleteMusic'
        ]);
        ////// Album
        Route::get('/albums', [
            'as' => 'albums',
            'uses' => 'admin\AlbumController@listAlbum'
        ]);
        Route::get('/addAlbums', [
            'as' => 'albums.add_view',
            'uses' => 'admin\AlbumController@addViewAlbum'
        ]);
        Route::post('/addProcessAlbums', [
            'as' => 'albums.add_process',
            'uses' => 'admin\AlbumController@addProcessAlbum'
        ]);
        Route::get('updateAlbums/{id}', [
            'as' => 'albums.update_view',
            'uses' => 'admin\AlbumController@updateViewAlbum'
        ]);
        Route::post('updateProcessAlbums/{id}', [
            'as' => 'albums.update_process',
            'uses' => 'admin\AlbumController@updateProcessAlbum'
        ]);
        Route::get('deleteAlbums/{id}', [
            'as' => 'albums.delete',
            'uses' => 'admin\AlbumController@deleteAlbum'
        ]);
        Route::get('musicAlbumAdd/', [
            'as' => 'albums.music_add',
            'uses' => 'admin\AlbumController@addMusic'
        ]);
        Route::post('musicAlbumProcess/', [
            'as' => 'albums.music_add_process',
            'uses' => 'admin\AlbumController@addProcessMusic'
        ]);
        Route::get('musicAlbumView/{id}', [
            'as' => 'albums.music_view',
            'uses' => 'admin\AlbumController@listAlbumMusic'
        ]);
        Route::get('musicAlbumDelete/{id}/{albumId}', [
            'as' => 'albums.music_delete',
            'uses' => 'admin\AlbumController@deleteAlbumMusic'
        ]);
        ////////////////////////////////// Role
        Route::get('/Roles', [
            'as' => 'roles',
            'uses' => 'admin\RoleController@listRole'
        ]);
        Route::get('/addRoles', [
            'as' => 'roles.add_view',
            'uses' => 'admin\RoleController@addViewRole'
        ]);
        Route::post('/addProcessRoles', [
            'as' => 'roles.add_process',
            'uses' => 'admin\RoleController@addProcessRole'
        ]);
        Route::get('updateRoles/{id}', [
            'as' => 'roles.update_view',
            'uses' => 'admin\RoleController@updateViewRole'
        ]);
        Route::post('updateProcessRoles/{id}', [
            'as' => 'roles.update_process',
            'uses' => 'admin\RoleController@updateProcessRole'
        ]);
        Route::get('deleteRoles/{id}', [
            'as' => 'roles.delete',
            'uses' => 'admin\RoleController@deleteRole'
        ]);
        /////// uSer
        Route::get('/Users', [
            'as' => 'users',
            'uses' => 'admin\UserController@listUser'
        ]);
        Route::get('updateUsers/{id}', [
            'as' => 'users.update_view',
            'uses' => 'admin\UserController@updateViewUser'
        ]);
        Route::post('updateProcessUsers/{id}', [
            'as' => 'users.update_process',
            'uses' => 'admin\UserController@updateProcessUser'
        ]);
        Route::get('deleteUsers/{id}', [
            'as' => 'users.delete',
            'uses' => 'admin\UserController@deleteUser'
        ]);
        Route::post('changeRoles/{id}', [
            'as' => 'users.change',
            'uses' => 'admin\UserController@changeRole'
        ]);
    });
});

////////////
Route::group(['middleware' => 'locale'], function() {
    Route::get('/', 'PageController@index');
    Route::get('/musics/{id}', 'PageController@getJsonMusic');
    Route::get('/albums/{id}', 'PageController@getJsonAlbum');
    Route::get('/profile/{id}', 'PageController@Profile')->name('profile.view');
    Route::post('/updateProfile/{id}', 'UserController@updateProfile')->name('profile.update');
    Route::get('artist/{id}', 'PageController@artist');
    Route::resource('music', 'MusicController', ['only' => ['show']]);
    Route::resource('album', 'AlbumController', ['only' => ['show']]);
    Route::get('forgot-pass', 'Auth\ForgotPasswordController@getResetPass');
    Route::post('forgot-pass', 'Auth\ForgotPasswordController@postResetPass');
    Route::get('reset/pass', 'Auth\ForgotPasswordController@resetPass')->name('reset.pass');
    Route::post('reset/pass', 'Auth\ForgotPasswordController@saveResetPass');
    Route::get('category/{id}', 'PageController@getCategory');
    //search
    Route::get('/search', 'SearchController@searchFullText')->name('search');
    
    Route::get('/logout', 'PageController@logout');
    //playlist
    Route::group(['prefix' => 'playlist'], function()
    {   
        Route::post('/create', 'PlaylistController@create')->name('create_playlist');
        Route::get('/load/{user_id}', 'PlaylistController@load');
        Route::post('/add', 'PlaylistController@add');
    });
    Auth::routes();
    //comment
    Route::group(['prefix' => 'comment'], function()
    {
        Route::post('/add', 'CommentController@comment');
        Route::get('/delete/{id}', 'CommentController@delete');
        Route::post('/edit', 'CommentController@edit');
    });
    //like
    Route::group(['prefix' => 'favorite'], function()
    {
        Route::post('/like', 'FavoriteController@like');
        Route::post('/unlike', 'FavoriteController@unlike');
    });
});
Route::get('/changeLang{lang}', 'HomeController@changeLang')->name('lang.change');
