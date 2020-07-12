<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use DB;
use App\Users;
use App\JobProviders;
use App\Reports;
use App\Quiz;
use Illuminate\Http\Request;

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
    public function user(){
      return view('users');
    }
    public function jobgiver(){
      return view('job_pro');
    }
    public function getuser(){
      $users = DB::table('users')->paginate(5);
      return view('users',['users' => $users]);
    }
    public function job_pro(){
      $job_pro = DB::table('job_providers')->paginate(6);
      return view('job_pro',['job_pro' => $job_pro]);
    }
    public function company(){
      $company = DB::table('newjobs')->paginate(5);
      return view('companies',['company' => $company]);
    }
    public function ptjobs(){
      $part_time = 'part time';
      $company = DB::table('newjobs')
      ->where('job_desc','like','%'.$part_time.'%')->paginate(5);
      return view('ptjobs',['company' => $company]);
    }
    public function ftjobs(){
      $full_time = 'full time';
      $company = DB::table('newjobs')
      ->where('job_desc','like','%'.$full_time.'%')->paginate(5);
      return view('ftjobs',['company' => $company]);
    }
    public function fljobs(){
      $freelance = 'freelance';
      $company = DB::table('newjobs')
      ->where('job_desc','like','%'.$freelance.'%')->paginate(5);
      return view('freelance',['company' => $company]);
    }
    public function reports($id){

      $report = DB::table('users')
      ->join('report_user','users.id','=','report_user.reported_user_id')
      ->select('report_user.id as ruid','report_user.reported_user_id','report_user.reporter_user_id','users.name','report_user.reason')
      ->paginate(5);
      return view('reports',['report' => $report],['id' => $id]);
    }
    public function del_reports($ruid){
      DB::table('report_user')->where('id',$ruid)->delete();
      return back()->with('success','Deleted Successfully');
    }
    public function deleteuser($id){
      DB::table('users')->where('id',$id)->delete();
      return back()->with('success10','User Removed Successfully !!!');
    }
    public function deletejob($id){
      DB::table('newjobs')->where('id',$id)->delete();
      return back()->with('success11','Job Deleted !!!');
    }
    public function searchuser(Request $request){
      $user_name = $request->get('users');
      $users = DB::table('users')
      ->where('name','like','%'.$user_name.'%')
      ->paginate(5);
      return view('searchedusers',['users' => $users]);
    }
    public function searchjobs(Request $request){
      $jobname = $request->get('jobs');
      $newjobs = DB::table('newjobs')
      ->where('company_name','like','%'.$jobname.'%')
      ->orwhere('job_title','like','%'.$jobname.'%')
      ->paginate(5);
      return view('searchjobs',['newjobs' => $newjobs]);
    }
    public function searchprov(Request $request){
      $jobname = $request->get('providers');
      $newjobs = DB::table('job_providers')
      ->where('name','like','%'.$jobname.'%')
    //  ->orwhere('job_title','like','%'.$jobname.'%')
      ->paginate(5);
      return view('searchjobprov',['newjobs' => $newjobs]);
    }
    public function quiz(){
      return view('addquesofquiz');
    }
    public function storequiz(Request $request){
      $quiz = new Quiz();
      $quiz->question = $request->input('question');
      $quiz->answer1 = $request->input('answer1');
      $quiz->answer2 = $request->input('answer2');
      $quiz->answer3 = $request->input('answer3');
      $quiz->answer4 = $request->input('answer4');
      $quiz->rightanswer = $request->input('rightanswer');
      $quiz->topic = $request->input('topic');
      $quiz->save();
      return back()->with('success','Question Added !!!');
    }

}
