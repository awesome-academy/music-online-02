<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musics = Music::findOrFail($id);
        if (!$musics) {
            return redirect('/');
        } else {
            $songs = Music::orderBy('id', 'DESC')->skip(config('home.number.begin_music'))->take(config('home.number.end_song'))->get();
            $comments = $musics->comments()->orderBy('id', 'DESC')->get();
            $artists = $musics->artists()->get();

            if (!isset($_COOKIE['music_' . $musics->id])) {
                setcookie('music_' . $musics->id, $musics->id, time() + 60, "/");
                $musics->view = $musics->view + 1;
                $musics->save();
            }
        
            return view('pages.music', compact('musics', 'songs', 'comments', 'artists'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
