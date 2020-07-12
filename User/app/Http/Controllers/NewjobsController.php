<?php

namespace App\Http\Controllers;
use DB;
use App\Newjobs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewjobsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){

    $newjobs = DB::table('newjobs')->get();
            //  ->leftjoin('applyjob', 'applyjob.job_id', '=', 'newjobs.id')
            //  ->leftjoin('users', 'users.id', '=', 'applyjob.candidate_id')
            //  ->select('applyjob.candidate_id','applyjob.job_id', 'newjobs.*')

    return view('jobs', ['newjobs' => $newjobs]);

    }
    public function jobdetails(){
        return view('jobdetails');
    }
    public function iwantjob(Request $request,$id){
      $jobdetails = $request->get('jobdetails');
      $data = DB::table('newjobs')
    //  ->leftjoin('applyjob','applyjob.job_id', '=', 'newjobs.id')
    //  ->select('applyjob.candidate_id','applyjob.job_id', 'newjobs.*')
      ->where('id',$id)->get();
      return view('jobdetails', ['data' => $data]);
    }
  //  public function wantjob(Request $request){
  //    $jobdetails = $request->get('jobdetails');
  //    $givedata = DB::table('applyjob')
  //    ->select('applyjob.candidate_id','applyjob.job_id')->get();
  //    return view('jobdetails', ['givedata' => $givedata]);
    //}
    public function job(){
      return view('job');
    }

    public function com(){
          $newjobs = DB::table('newjobs')->get();
          return view('companies', ['newjobs' => $newjobs]);
    }
    public function searchjobs(Request $request){
      $city = $request->get('city');
      $newjobs = DB::table('newjobs')
      ->where('company_name','like','%'.$city.'%')->paginate(5);
      return view('searchjobbycom',['newjobs'=>$newjobs]);
    }
    public function searchvia(Request $request){
      $skill = $request->get('skill');
      $newjobs = DB::table('newjobs')
      ->where('job_title','like','%'.$skill.'%')->paginate(5);
      return view('searchviawel',['newjobs'=>$newjobs]);
    }
    public function got(){
      $newjobs = DB::table('newjobs')->get();
      return view('applypage', ['newjobs' => $newjobs]);
    }
    public function applied(){
      $users = DB::table('applyjob')
            ->join('users', 'users.id', '=', 'applyjob.candidate_id')
            ->leftjoin('newjobs', 'applyjob.job_id', '=', 'newjobs.id')
            ->select('applyjob.candidate_id','applyjob.job_id', 'users.id', 'newjobs.*')
            ->get();

            return view('appliedjob', ['users' => $users]);
    }

   public function check(){
  $users = DB::table('applyjob')
        ->join('users', 'users.id', '=', 'applyjob.candidate_id')
        ->leftjoin('newjobs', 'applyjob.job_id', '=', 'newjobs.id')
        ->select('applyjob.candidate_id','applyjob.job_id', 'users.name', 'newjobs.id')
        ->get();
        return view('jobs', ['users' => $users]);
      }
    public function apply(){
      return view('applypage');
    }
    public function searchjob(Request $request){
      $stream = $request->get('stream');
      $newjobs = DB::table('newjobs')
      ->where('stream','like','%'.$stream.'%')->paginate(100);
      return view('searchviawel',['newjobs' => $newjobs]);
    }

}
