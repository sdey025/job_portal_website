<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use App\ReportUser;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function gothere(){
      return view('reportuser');
    }
    public function getuid($id){
      $users = DB::table('users')->where('id',$id)->get();
      return view('reportuser',['users' => $users]);
    }
    public function store(Request $request){
      $report = new ReportUser();
      $report->reported_user_id = $request->input('reported_user_id');
      $report->reason = $request->input('reason');
      $report->reporter_user_id = $request->user()->id;
      $report->save();
      return back()->with('success','User Reported');
    }
}
