<?php

namespace App\Http\Controllers;
use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Newjobs;
use App\Posts;

class SearchController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

/*  public function showusers(){
        $data = Candidate::all();
     //   return var_dump($data);

        return view('searchpage1')->with('data',$data);
    } */
      public function search(Request $request){
          $jobseeker = $request->get('jobseeker');
          $data = DB::table('users')->where('skill','like','%'.$jobseeker.'%')->orwhere('name','like','%'.$jobseeker.'%')->paginate(5);
          return view('searchpage1', ['data' => $data]);
        }
      public function got(Request $request){
          $jobseeker = $request->get('candidate');
          $data = DB::table('users')->where('stream','like','%'.$jobseeker.'%')->paginate(5);
          return view('candidates', ['data' => $data]);
        }
        public function get(Request $request){
            $data = DB::table('applyjob')
            ->join('newjobs', 'applyjob.job_id', '=', 'newjobs.id')
            ->join('users', 'applyjob.candidate_id', '=', 'users.id')
            ->join('job_providers', 'applyjob.apply_id', '=', 'job_providers.id')
            ->select('applyjob.resume','users.id','applyjob.apply_id','users.address','users.name','users.gender','users.avatar', 'newjobs.company_name','newjobs.com_logo','newjobs.salary_offer','newjobs.job_desc')
            ->get();
            return view('candidates_who_applied', ['data' => $data]);
          }
        public function can(){
          return view('candidates');
        }
        public function pro(){
          return view('profile');
        }
        public function candidate(){
          return view('candidates_who_applied');
        }
        public function profile(){
          $users = DB::table('users')->get();
          return view('profile', ['users' => $users]);
        }
        public function deletejob($id){
          $newjobs = Newjobs::findOrFail($id);
          $newjobs->delete();
          return redirect('postedjobs')->with('status','Data Deleted');
        }
        public function viewprofile(Request $request,$id){
          $view = $request->get('view');
          $data = DB::table('users')->where('id',$id)->get();
          return view('profile', ['data' => $data]);
        }

        public function viewpost(){
          $posts = DB::table('posts')
          ->join('users','posts.user_id','=','users.id')
          ->select('posts.post_content','posts.created_at','user.id')
          ->get();
          return view('profile', ['posts' => $posts]);
        }
}
