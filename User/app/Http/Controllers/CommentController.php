<?php

namespace App\Http\Controllers;
use App\Comment;
use Auth;
use Illuminate\Http\Request;


class CommentController extends Controller
{
  
    public function comment(Request $request,$id){

      $comment = new Comment();

      $comment->master_user_id = $request->input('mui');;
      $comment->cid = rand(1,5000);
      $comment->post_id = $id;
      $comment->commenter_name = $request->user()->name;
      $comment->comment = $request->input('comment');
      $comment->other_user_id = $request->user()->id;

      $comment->save();
      return back();
    }
    public function delete($id){
      $comments = Comment::findorfail($id);
      $comments->delete();
      return view('deletecomment');
   }
   public function del(){
     return view('deletecomment');
   }
}
