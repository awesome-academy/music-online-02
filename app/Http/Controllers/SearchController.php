<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;
use DB;

class SearchController extends Controller
{
    public function searchFullText(Request $request)
    {    
        if ($request->q != '') {
            $data = Music::FullTextSearch('name', $request->q)->get();
           
            return response()->json($data);
        }
    }
}
