<?php

namespace App\Http\Controllers;
use App\Appliyjob;
use App\Newjobs;
use App\User;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DB;

class ApplyjobController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function store(Request $request){

      $Applyjobs = new Appliyjob();

      $Applyjobs->apply_id = $request->input('apply_id');
      $Applyjobs->candidate_id = $request->user()->id;

      $Applyjobs->job_id = $request->input('job_id');

      if($request->hasfile('resume')){
        $file = $request->file('resume');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('upload/cv/',$filename);
        $Applyjobs->resume = $filename;
      }
      else {
        return $request;
        $Applyjobs->resume = '';
      }
      $Applyjobs->save();
      return back()->with('success','Thanks for contacting us!');

    }
}
