<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;

class HomeController extends Controller
{
    public function loadMusics(){
        $begin = config('home.number.begin');
        $end = config('home.number.end');
        $musics = Music::orderBy('id','DESC')->skip($begin)->take($end)->get();
        
        return view('home',compact('musics')); 
    } 
}
