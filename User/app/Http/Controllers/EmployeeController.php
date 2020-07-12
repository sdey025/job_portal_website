<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
//use DB;
class EmployeeController extends Controller
{
    public function search(Request $request){
      $search = $request->get('search');
      $users = DB::table('users')->where('name','like','%'.$search.'%')->paginate(15);
      return view('search',['users'=>$users]);
    }

    public function open_profile(){

    //  $users = DB::table('users')->get();
      //return view('profile', ['users' => $users]);

    //  $profile = \App\User::all()->toArray();
      //return view('profile')->with('users', $profile);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(){
      return view('Editprofile');
    }
    public function profile(){
      return view('profile');
    }

    public function index(){
      return view('employee');
    }
    public function store(Request $request){
      $employee = new Employee();

      $employee->name = $request->input('name');


      //$employee->name = $request->input('resume');

      if($request->hasfile('resume')){
        $file = $request->file('resume');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('upload/employee/',$filename);
        $employee->resume = $filename;
      }
      else {
        return $request;
        $employee->resume = '';
      }
      $employee->save();
      return back()->with('success','Thanks for contacting us!');
      //return back()->with('success','Thanks for contacting us!');
    }
    public function get(Request $request){

      $users = DB::table('users')->get();
      return view('employee', ['users' => $users]);
    }
    public function editjd(Request $request,$id){
      $users = DB::table('users')
      ->where('id',$id)
      ->update(['curr_job_com' => $request->input('curr_job_com'), 'curr_job_post' => $request->input('curr_job_post'),  'curr_job_joining' => $request->input('curr_job_joining')]);

      return back()->with('success1','Details Updated');
    }
    public function editsc(Request $request,$id){
      $users = DB::table('users')->where('id',$id)
      ->update(['sc_inst' => $request->input('sc_inst'), 'sc_year' => $request->input('sc_year'),  'sc_marks' => $request->input('sc_marks'), 'sc_board' => $request->input('sc_board')]);

      return back()->with('success3','Details Updated');
    }
    public function edithsc(Request $request,$id){
      $users = DB::table('users')->where('id',$id)
      ->update(['hsc_inst' => $request->input('hsc_inst'), 'hsc_year' => $request->input('hsc_year'), 'hsc_marks' => $request->input('hsc_marks'),  'hsc_board' => $request->input('hsc_board')]);

      return back()->with('success4','Details Updated');
    }
    public function edithug(Request $request,$id){
      $users = DB::table('users')->where('id',$id)
      ->update(['ug_inst' => $request->input('ug_inst'), 'ug_year' => $request->input('ug_year'), 'ug_marks' => $request->input('ug_marks'), 'ug_branch' => $request->input('ug_branch'),  'ug_board' => $request->input('ug_board')]);

      return back()->with('success5','Details Updated');
    }
    public function edithpg(Request $request,$id){
      $users = DB::table('users')
      ->where('id',$id)
      ->update(['pg_inst' => $request->input('pg_inst'), 'pg_year' => $request->input('pg_year'), 'pg_marks' => $request->input('pg_marks'), 'pg_branch' => $request->input('pg_branch'),  'pg_board' => $request->input('pg_board')]);

      return back()->with('success6','Details Updated');
    }
    public function editpd(Request $request,$id){
      $users = DB::table('users')
      ->where('id',$id)
      ->update(['name' => $request->input('name'),  'address' => $request->input('address')]);

      return back()->with('success6','Details Updated');
    }
    public function whydel(){
      return view('whydel');
    }
    public function delacc(Request $request,$id){
      DB::table('users')->where('id',$id)->delete();
      return view('Welcome1')->with('success7','Your Account is Deleted');
    }
    public function notification(){
      return view('Notifications');
    }

}
