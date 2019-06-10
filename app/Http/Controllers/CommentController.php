<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

class CommentController extends Controller
{
    public function comment(Request $request) 
    {
        $comment = new Comment;
        $comment->user_id = $request->userId;   
        $comment->music_id = $request->musicId;
        $comment->content = $request->content;
        $comment->save();
        $user = User::findorFail($comment->user_id);
        $user_name = $user->name;
        $user_image = $user->image;
        $content = $comment->content;
        
        return response()->json([
            'image' => $user_image, 
            'name' => $user_name, 
            'content' => $content,
            ]);
    }
}
