<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
      return view('welcome1');
    }
    public function contact()
    {
      return view('contact');
    }
    public function mail()
    {
      return view('mail');
    }
    public function suc(){
      return view('success2');
    }
    public function store(Request $request){
      $posts = new Post([

      'user_id' => $request->user()->id,
      'post_content' => $request->input('post_content')
    ]);
      $posts->save();
    return back();
    }
    public function retrive(){
      $posts = DB::table('posts')
            ->Join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name','users.id as uid','posts.post_content','posts.id as pid','posts.user_id','posts.created_at')
            ->get();
      return view('employee',['posts'=>$posts]);
    }


    public function destroy(){
    //  $post = Post::findOrfail($id->id);
    //  $post->delete();
    //  $post->delete();

      //return redirect('picsuccess');
    }
    public function pic(){
      return view('picsuccess');
    }
    public function companies(){
      return view('companies');
    }
    public function apply(){
      return view('appliedjob');
    }
    public function feeds(){
      return view('newfeeds');
    }
    public function newfeed(){
      $posts = DB::table('posts')
            ->leftjoin('users','users.id','=','posts.user_id')
        //    ->leftjoin('comments','comments.master_user_id', '=', 'users.id')
            ->leftjoin('followsystem','followsystem.reciever_id','=','users.id')
            ->select('users.id as uid','posts.id as pid','users.name','posts.user_id','posts.post_content','users.avatar','posts.created_at as p_created_at',/*'comments.master_user_id','comments.post_id','comments.comment','comments.other_user_id',*/'followsystem.sender_id','followsystem.reciever_id',/*'comments.created_at'*/)
            ->orderby('posts.id','desc')
            ->get();
      return view('newfeeds',['posts'=>$posts]);
    }

    public function edit(Request $request, $id){

        $user = User::findOrFail($id);

          $user->name = $request->input('name');
          $user->email = $request->input('email');
          $user->phone = $request->input('phone');
          $user->address = $request->input('address');


        $user->save();

        return view('Editprofile');


    }
    public function editpassword(Request $request,$id){
      $user = User::findOrFail($id);

        $user->password = Hash::make($request->input('password'));
        //$user = Hash::make('password');

        $user->save();
      //  $request->session()->forget('cart');

        return view('Editprofile')->with('success');
    }
    public function otherpro(){
      return view('otherprofile');
    }
    public function profileother(Request $request,$id){
      $profile = $request->get('otherprofile');
      $users = DB::table('users')
      //->join('posts','posts.user_id','=','users.id')
              ->where('id',$id)->get();
      return view('otherprofile', ['users' => $users]);
    }
    public function network(){
      return view('network');
    }
    public function seefollowers(){
      $users = DB::table('users')
      ->join('followsystem','users.id','=','followsystem.reciever_id')
      ->select('users.name','users.id','followsystem.reciever_id','followsystem.sender_id','followsystem.created_at','users.address','followsystem.id as fid')
      ->get();
      return view('network',['users' => $users]);
    }
    public function deletefriend($id){
      $follow = Follow::findOrFail($id);
      $follow->delete();
      return back()->with('status','Data Deleted');
    }
    public function message(){
      return view('message');
    }

}
