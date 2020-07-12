<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Newjobs;
use Image;
use Auth;
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
    public function welcome(){
      return view('welcome');
    }
    public function success(){
      return view('success');
    }
    public function uplog(){
      return view('uplogo');
    }
    public function search(){
      return view('searchpage1');
    }
    public function emp(){
      return view('employer');
    }
    public function products(){
      return view('products');
    }
    public function message(){
      return view('message');
    }

    public function upload(Request $request){

  /*    if($request->hasfile('com_logo')){
        $com_logo = $request->file('com_logo');
        $filename = time().'.'. $com_logo->getClientOriginalExtension();
        $com_logo->move('public/storage',$filename);
        $user=new Newjobs();
        $user->com_logo = $filename;
        $user->save();
      } */
    //  return view('/employee',array('user'=>Auth::user()));


  }

    }
