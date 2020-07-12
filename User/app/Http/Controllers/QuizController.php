<?php

namespace App\Http\Controllers;
use App\Quiz;
use DB;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function quizdashboard(){
      return view('quizdashboard');
    }
    public function wdq(Request $request){
        $to = $request->input('web development');
        $name = 'web development';
        $topic = DB::table('quizques')
        ->where('topic','like','%'.$name.'%')
        ->paginate(1);
        return view('web_development_quiz',['topic' => $topic]);
      }
    public function mad(Request $request){
        $topic = $request->input('mobile app development');
        $name = 'mobile app development';
        $topic = DB::table('quizques')
        ->where('topic','like','%'.$name.'%')
        ->paginate(1);
        return view('mobile_app_development',['topic' => $topic]);
    }
    public function gd(Request $request){
        $topic = $request->input('game development');
        return view('game_development_quiz',['topic' => $topic]);
    }
    public function ehq(Request $request){
        $topic = $request->input('ethical hacking');
        return view('ethical_hacking_quiz',['topic' => $topic]);
    }
    public function sd(Request $request){
        $topic = $request->input('software development');
        return view('software_development_quiz',['topic' => $topic]);
    }
    public function ai(Request $request){
        $topic = $request->input('ai development');
        return view('ai_quiz',['topic' => $topic]);
    }
    public function checkans(Request $request){

        return back();
    }

}
