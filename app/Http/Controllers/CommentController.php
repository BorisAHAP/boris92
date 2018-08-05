<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function deleteComment(Request $request)
    {
        if($request->ajax()){
            $id=$request->id;
            Comment::where('id',$id)->delete();
        }
    }

}
