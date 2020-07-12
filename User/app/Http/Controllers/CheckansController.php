<?php

namespace App\Http\Controllers;
use App\CheckAns;
use DB;
use Illuminate\Http\Request;

class CheckansController extends Controller
{
    public function c_ans(Request $request){
      $check = new CheckAns();
      $check->qid = $request->input('qid');
      $check->rightans = $request->input('rightans');
      $check->myoption = $request->input('optradio');
      $check->uid = $request->user()->id;
      $check->save();
      return back();
    }
    public function getmarks(Request $request){
      //$id = $request->user()->id;
      $answers = DB::table('checkans')
      ->join('quizques','checkans.qid','=','quizques.id')
      ->get();
      return view('testdone',['answers' => $answers]);
    }
    public function gothere(){
      return view('testdone');
    }
}
