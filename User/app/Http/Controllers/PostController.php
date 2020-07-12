<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class PostController extends Controller
{
  

    public function deletepost($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return back();
    }
}
