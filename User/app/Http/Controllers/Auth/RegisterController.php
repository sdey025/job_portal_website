<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {



  /*    $request = request();
        $file_name_to_store = '';
      if ($request->hasFile('cover_image')) {
                 $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                 //get just filename
                 $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                 $ext = $request->file('cover_image')->getClientOriginalExtension();
                 //filename to store
                 //if($extenstion!=".jpg"){}
                 $filenameToStore = $filename.'_'.time().'.'.$ext;
                 //upload the image
                 $path = $request->file('cover_image')->storeAs('public/image', $filenameToStore);
             }else{
              return "no file exist";
             }
             $err = 0;
             foreach($_POST as $key => $value){
              if(empty($value)) {
                  $err = 1;
              }
             }
             if($err==1){
              return redirect('home')->with('error','All fields are mandatory');
             }


*/

        return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'skill'=> $data['skill'],
          'stream'=> $data['stream'],
          'address'=> $data['address'],
          'phone'=> $data['phone'],
          'adhar'=> $data['adhar'],
          'gender'=> $data['gender'],
          'dob'=> $data['dob'],
          'project_name'=> $data['project_name'],
          'project_desc'=> $data['project_desc'],
          'number_of_group_mem'=> $data['number_of_group_mem'],
          'bio'=> $data['bio'],
          'prev_job_post'=> $data['prev_job_post'],
          'prev_job_com'=> $data['prev_job_com'],
          'prev_job_res_year'=> $data['prev_job_res_year'],
          'final_yr_proj_name'=> $data['final_yr_proj_name'],
          'final_yr_proj_desc'=> $data['final_yr_proj_desc'],
          'sc_inst'=> $data['sc_inst'],
          'sc_marks'=> $data['sc_marks'],
          'sc_board'=> $data['sc_board'],
          'hsc_inst'=> $data['hsc_inst'],
          'hsc_marks'=> $data['hsc_marks'],
          'hsc_board'=> $data['hsc_board'],
          'ug_inst'=> $data['ug_inst'],
          'ug_marks'=> $data['ug_marks'],
          'ug_board'=> $data['ug_board'],
          'pg_inst'=> $data['pg_inst'],
          'pg_marks'=> $data['pg_marks'],
          'pg_board'=> $data['pg_board'],
          'curr_job_com'=> $data['curr_job_com'],
          'curr_job_post'=> $data['curr_job_post'],
          'sc_year'=> $data['sc_year'],
          'hsc_year'=> $data['hsc_year'],
          'ug_branch'=> $data['ug_branch'],
          'pg_branch'=> $data['pg_branch'],
          'ug_year'=> $data['ug_year'],
          'pg_year'=> $data['pg_year'],
          'curr_job_joining'=> $data['curr_job_joining'],


        ]);
    }

}
