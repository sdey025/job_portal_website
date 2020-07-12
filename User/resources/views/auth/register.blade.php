@extends('layouts.app')

@section('content')
<div class="container text-center">


                <div class="">{{ __('Register') }}</div>

                <br>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                          <div class="row">
                            <label for="name" class="">{{ __('Name') }}</label>
                            &nbsp &nbsp

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control col-md-12 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

&nbsp &nbsp &nbsp

                            <label for="gender" class="">{{ __('Gender') }}</label>

                            <div class="col-md-5">
                                <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                                  <option>Male</option>
                                  <option>Female</option>
                                  <option>Others</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </div>

                      <br>

                        <div class="form-group ">
                          <div class="row">


                            <label for="dob" class="">{{ __('Date of Birth') }}</label>

                            <div class="col-md-4">
                                <input id="dob" type="date" class="col-md-12 form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" max="12-5-2002" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

&nbsp &nbsp &nbsp

                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </div>
<br>

                        <div class="form-group">
                          <div class="row">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control col-md-12 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

&nbsp &nbsp &nbsp

                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                          </div>
                        </div>


                  <!--          <form method="POST" action="{{ route('register') }}">
                                @csrf
-->
<br>
                                <div class="form-group ">
                                  <div class="row">


                                    <label for="skill" class="">{{ __('Skill') }}</label>

                                    <div class="col-md-5">
                                      <input id="skill" type="skill" class="form-control col-md-12 @error('skill') is-invalid @enderror" name="skill" required autocomplete="skill">

                                        @error('skill')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

                                    <label for="stream" class="">{{ __('Stream') }}</label>

                                    <div class="col-md-5">

                                        <select id="stream" type="stream" class="form-control search-slt form-control @error('stream') is-invalid @enderror" name="stream">
                                            <option>Marketing</option>
                                            <option>Management</option>
                                            <option>IT</option>
                                            <option>BPO</option>
                                            <option>Sales</option>
                                            <option>Social Marketing</option>

                                        </select>


                                        @error('stream')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                      </div>
                                </div>

<br>
                                <div class="form-group ">
                                  <div class="row">
                                    <label for="phone" class="">{{ __('Phone') }}</label>

                                    <div class="col-md-4">
                                        <input id="phone" type="phone" class="form-control col-md-12 @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

&nbsp &nbsp &nbsp &nbsp &nbsp

                                    <label for="address" class="">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="search_input" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address">

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              </div>
<br>

                                <div class="form-group row">
                                    <label for="adhar" class="col-md-4 col-form-label text-md-right">{{ __('Aadhar Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="adhar" type="adhar" class="form-control @error('adhar') is-invalid @enderror" name="adhar" required autocomplete="adhar">

                                        @error('adhar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
 <br>
                                <div class="row">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Latest Project</label>
                                  <input type="text" class="form-control col-md-12" id="project_name" name="project_name" placeholder="Latest Project you have worked on" required>
                                </div>
                                &nbsp &nbsp
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Project Description</label>
                                  <textarea type="textarea" class="form-control col-md-12" id="exampleInputPassword1" name="project_desc" placeholder="min 100 words"></textarea>
                                </div>
                                &nbsp &nbsp
                                <div class="form-group form-check">
                                  <label class="form-check-label" for="exampleCheck1">Total Team Members</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="number_of_group_mem">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                                </div>
                                &nbsp &nbsp
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Bio</label>
                                  <textarea type="textarea" class="form-control col-md-12" id="exampleInputPassword1" name="bio" placeholder="min 100 words"></textarea>
                                </div>
                              </div>
                              <br>
                                <div class="row">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Previous Job Designation</label>
                                    <input type="text" class="form-control col-md-12" id="" name="prev_job_post" placeholder="if not then fill NA" required>
                                  </div>
                                  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">firm you worked in</label>
                                    <input type="text" class="form-control col-md-12" id="" name="prev_job_com" placeholder="if not then fill NA" required>
                                  </div>
                                  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Year you left</label>
                                    <input type="text" class="form-control col-md-12" id="" name="prev_job_res_year" placeholder="if not then fill NA" required>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="form-group col-md-5">
                                    <label for="exampleInputEmail1">Final Year Project Name</label>
                                    <input type="text" class="form-control" name="final_yr_proj_name" placeholder="Enter Just Name">
                                  </div>
                                  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                  <div class="form-group col-md-5">
                                    <label for="exampleInputEmail1">Final Year Project Description</label>
                                    <textarea type="text" class="form-control" name="final_yr_proj_desc" placeholder="Max 100 words"></textarea>
                                  </div>
                                </div>
                                <br>

                                <center><span  class="badge badge-primary text-light">Secondary Class Details</span></center>
                                <br>
                                <div class="row">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">10th Institution Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="sc_inst" placeholder="" required>
                                  </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">10th Completion Year</label>
                                      <input type="text" class="form-control col-md-12" id="" name="sc_year" placeholder="add '%' for percentage or add 'CGPA' for CGPA" required>
                                    </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">10th Marks</label>
                                    <input type="text" class="form-control col-md-12" id="" name="sc_marks" placeholder="add '%' for percentage or add 'CGPA' for CGPA" required>
                                  </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">10th Board Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="sc_board" placeholder="" required>
                                  </div>
                                </div>
                                <br>
                                <center><span  class="badge badge-secondary text-light">High-Secondary Class Details</span></center>
                                <br>
                                <div class="row">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">12th Institution Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="hsc_inst" placeholder="" required>
                                  </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">12th Completion Year</label>
                                      <input type="month" class="form-control col-md-12" id="" name="hsc_year" placeholder="add '%' for percentage or add 'CGPA' for CGPA" required>
                                    </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">12th Marks</label>
                                    <input type="text" class="form-control col-md-12" id="" name="hsc_marks" placeholder="add '%' for percentage or add 'CGPA' for CGPA" required>
                                  </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">12th Board Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="hsc_board" placeholder="" required>
                                  </div>
                                </div>
                                <br>
                                <center><span  class="badge badge-info text-light">Graduation Details</span></center>
                                <br>
                                <div class="row">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">UG Institution Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="ug_inst" placeholder="" required>
                                  </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">UG Branch</label>
                                    <input type="text" class="form-control col-md-12" id="" name="ug_branch" placeholder="" required>
                                  </div>
                                  &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">UG Completion Year</label>
                                    <input type="month" class="form-control col-md-12" id="" name="ug_year" placeholder="" required>
                                  </div>
                                  &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">UG Aggregate Marks</label>
                                    <input type="text" class="form-control col-md-12" id="" name="ug_marks" placeholder="add '%' for percentage or add 'CGPA' for CGPA" required>
                                  </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">UG University Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="ug_board" placeholder="" required>
                                  </div>
                                </div>
                                <br>
                                <center><span  class="badge badge-warning text-light">Post-Graduation Details</span></center>
                                <br>
                                <div class="row">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">PG Institution Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="pg_inst" placeholder="" required>
                                  </div>
                                      &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">PG Branch</label>
                                      <input type="text" class="form-control col-md-12" id="" name="pg_branch" placeholder="" required>
                                    </div>
                                      &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">PG Completion Year</label>
                                      <input type="month" class="form-control col-md-12" id="" name="pg_year" placeholder="" >
                                    </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">PG Aggregate Marks</label>
                                    <input type="text" class="form-control col-md-12" id="" name="pg_marks" placeholder="add '%' for percentage or add 'CGPA' for CGPA" required>
                                  </div>
                                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">PG University Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="pg_board" placeholder="" required>
                                  </div>
                                </div>
                                <br>
                                <center><span  class="badge badge-dark text-light">Current Job Details</span></center>
                                <br>
                                <div class="row">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Company Name</label>
                                    <input type="text" class="form-control col-md-12" id="" name="curr_job_com" placeholder="" required>
                                  </div>
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Designation</label>
                                    <input type="text" class="form-control col-md-12" id="" name="curr_job_post" placeholder="" required>
                                  </div>
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Joined At</label>
                                    <input type="text" class="form-control col-md-12" id="" name="curr_job_joining" placeholder="" required>
                                  </div>
                                </div>

                        <div class="form-group row ">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-4">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>



</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAbY22OBD-fuEuDzy5TFPOehTZCUvS3D3U"></script>
<script>
var searchInput = 'search_input';
$(document).ready(function(){
  var autocomplete;
  autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
     types: ['geocode'],
   });
  google.maps.event.addListener(autocomplete,'place_changed', function(){
    var near_place = autocomplete.getPlace();
  });
});

</script>
<script type="text/javascript">
  $('.addrow').click(function(){
    var input=$(".addrow");


    $('body').append(input);
  };
</script>
@endsection
