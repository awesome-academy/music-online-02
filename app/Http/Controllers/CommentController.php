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
        $commentId = $comment->id;
        $user = User::findOrFail($comment->user_id);
        $user_name = $user->name;
        $user_image = $user->image;
        $content = $comment->content;
        
        return response()->json([
            'image' => $user_image, 
            'name' => $user_name, 
            'content' => $content,
            'commentId' => $commentId,
        ]);
    }

    public function delete($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
    }

    public function edit(Request $request){
        $commentID = $request->commentID;
        $editContent = $request->editContent;
        $comment = Comment::findOrFail($commentID);
        $comment->content = $editContent;
        $comment->save();
        $newContent = $comment->content;

        return response()->json([
            'newContent' => $newContent, 
            'commentID' => $commentID, 
        ]);
    }
}
