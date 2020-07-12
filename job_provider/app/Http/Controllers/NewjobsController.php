<?php

namespace App\Http\Controllers;
//use Illuminate\Routing\Route;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Route;
use DB;
use App\Users;
//use Illuminate\Support\Facades\Route;
use App\Newjobs;

class NewjobsController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $newjob = new Newjobs();

        $newjob->company_name = $request->input('company_name');
        $newjob->job_title = $request->input('job_title');
        $newjob->location = $request->input('location');
        $newjob->Experience = $request->input('Experience');
        $newjob->company_size = $request->input('company_size');
        $newjob->hear = $request->input('hear');
        $newjob->stream = $request->input('stream');
        $newjob->salary_offer = $request->input('salary_offer');
        $newjob->job_desc = $request->input('job_desc');
        $newjob->user_id = $request->user()->id;
    //    $newjob->stream = $request->input('stream');




                if($request->hasfile('com_logo')){
                  $file = $request->file('com_logo');
                  $extension = $file->getClientOriginalExtension();
                  $filename = time().'.'.$extension;
                  $file->move('upload/employee/',$filename);
                  $newjob->com_logo = $filename;
                }
                else {
                  return $request;
                  $newjob->com_logo = '';
                }

                    $newjob->save();
                    return redirect('success');
                  }


    public function index(){
      if(Auth::check('login')){
        return view('newjob');
      }else{
        return('register');
      }
    }
    public function postedjobs(){
      return view('postedjobs');
    }
    public function show(){
      $newjobs = DB::table('newjobs')->get();
      return view('postedjobs',['newjobs' => $newjobs]);
    }




}
