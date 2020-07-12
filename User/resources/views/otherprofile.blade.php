<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "jobfinder";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      ?>
      <style>
      #icon2{
        width: 8px;
        height: 8px;
        position: relative;
        animation-name: example2;
        animation-duration: 4s;
        animation-iteration-count: infinite;
      }
      @keyframes example2 {
        0%   {background-color:#757100;}
        10%  {background-color:	#8f8a00;}
        20%  {background-color:	#a8a300;}
        30%  {background-color:	#bdb600;}
        40% {background-color:#d6cf00;}
        50% {background-color:#f5ed00;}
        60% {background-color:#fff714;}
        70% {background-color:#fff82e;}
        80% {background-color:#fff947;}
        90% {background-color:#fffa61;}
        100% {background-color:#fffa75;}
      }
      </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/3ca8a7bfff.js" crossorigin="anonymous"></script>
        <title>Job Finder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body class="">
        <!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="/welcome1"><img src="http://localhost/jobfinder.com/User/resources/views/imagesss/2020.png" style="width:75px; height:60px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
&nbsp&nbsp&nbsp&nbsp&nbsp
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="/welcome1">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/jobs">Jobs</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/contact">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/companies">Companies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://resumegenius.com/resume-samples">Resumes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/newfeeds">Feeds</a>
      </li>
    </ul>
      @if (Route::has('login'))
<a class="nav-link mb-1" href="/message_from_job_provider/{{Auth::user()->name}}">  <button type="submit" class="btn btn-dark">Messages(job providers)&nbsp<?php
       $flag=0;
        $sql = "SELECT * FROM job_seekers";
          $result = $conn->query($sql);

        if (isset($result->num_rows) && $result->num_rows > 0) {
                      //    echo "<table><tr><th>ID</th><th>Name</th></tr>";

                          while($rows = $result->fetch_assoc()) {
                         if(Auth::user()->name == $rows["reciever_name"]){
                                  $flag = 1;
                                  break;

                            }
                          }

                          if($flag == 1){
                              echo "<object class='rounded-circle' id='icon2'></object>";
                          }
                         }
                           ?></button></a>
@else
@endif
      <ul class="nav-item dropdown px-md-3">

        <a class="nav-link dropdown-toggle text-light px-md-5 animate slideIn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          <i class="fa fa-user fa-sm text-light flex-top"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                       <a href="/employee" class="dropdown-item text-dark active"><center>{{ Auth::user()->name }}</center></a>
                       <a href="/appliedjob" class="dropdown-item text-dark "><center>Jobs Applied</center></a>
                       <a href="{{ url('/network') }}" class="dropdown-item text-dark "><center>Connections</center></a>
                       <a href="/jobs" class="dropdown-item text-dark "><center>New Jobs</center></a>
                       <a href="{{ url('/Editprofile') }}" class="dropdown-item text-dark "><center>Edit Profile</center></a>

                        <hr>
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><center>
                               {{ __('Logout') }}
                             </center>
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>

                    @else
                           <a class="text-dark nav-link" href="{{ route('login') }}"><center>Login</center></a>
                        <br>

                        @if (Route::has('register'))
                            <a class="text-dark nav-link" href="{{ route('register') }}"><center>Register</center></a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        </div>
      </ul>
  </div>
</nav>
@foreach($users as $row)
<div class="p-5">
  <div class="row">
    <div class="col-md-4">
      <img src="http://localhost/jobfinder.com/User/public/public/storage/{{$row->avatar}}" class="rounded-circle" style="width:300px; height:310px;" alt="">
      <br>
      <br>
      <br>
      <div class="row">
        <p class="text-secondary"><b>Work details</b></p>&nbsp&nbsp&nbsp
        <span class="border border-secondary border-top-10 mt-3 border-left-0 border-bottom-0 border-right-0">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
      </div>
      <div class="list">
        <p class="text-secondary ">Works as {{$row->curr_job_post}}</p>
        <p class="text-secondary ">at {{$row->curr_job_com}}</p>
        <p class="text-secondary ">Works as {{$row->curr_job_joining}}</p>
      </div>
      <br>
      <div class="row">
      <p class="text-secondary"><b>Previous work details</b></p>&nbsp&nbsp&nbsp
      <span class="border border-secondary border-top-10 mt-3 border-left-0 border-bottom-0 border-right-0">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
      </div>
      <div class="list">
        <p class="text-secondary ">Works as {{$row->prev_job_post}}</p>
        <p class="text-secondary ">at {{$row->prev_job_com}}</p>
        <p class="text-secondary ">Worked till {{$row->prev_job_res_year}}</p>
      </div>
      <div class="row">
      <p class="text-secondary"><b>Skills</b></p>&nbsp&nbsp&nbsp
      <span class="border border-secondary border-top-10 mt-3 border-left-0 border-bottom-0 border-right-0">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
      </div>
      <div class="list">
        <p class="text-secondary">{{$row->skill}}</p>
      </div>
    </div>
    <div class="col-md-7">
    <div class="row">  <h4><b>{{$row->name}}</b></h4>&nbsp&nbsp&nbsp<i class="fas fa-map-marker-alt mt-2 text-secondary"></i> <p class="mt-1 text-secondary mr-1">&nbsp{{$row->address}}</p></div>
      <small class="text-primary">{{$row->curr_job_post}}</small>
      <br>
      <br>
      <br>
      <br>
      <div class="row">
        <a href="#" style="text-decoration:none;" class="text-dark"><i class="far fa-envelope fa-2x ml-3"></i><br><p class="mr-4 " style="font-size:12px;"><b >Send Message</b></p></a>
        <?php
        $flag=0;
        $sql = "SELECT followsystem.sender_id,followsystem.reciever_id FROM followsystem";
          $result = $conn->query($sql);

        if (isset($result->num_rows) && $result->num_rows > 0) {
                      //    echo "<table><tr><th>ID</th><th>Name</th></tr>";

                          while($rows = $result->fetch_assoc()) {
                           if($row->id == $rows["reciever_id"] && Auth::user()->id == $rows["sender_id"])
                             $flag=1;
                             //echo $flag;
                             //break;
                           }
                         }
                           ?>
        <?php
          $sql = "SELECT followsystem.sender_id,followsystem.reciever_id FROM followsystem";
          $result = $conn->query($sql);
          if (isset($result->num_rows) && $result->num_rows > 0) {
            //    echo "<table><tr><th>ID</th><th>Name</th></tr>";
          while($data = $result->fetch_assoc()) {
          if($row->id == $data["reciever_id"] && Auth::user()->id == $data["sender_id"] && $flag == 1){
          echo "<a href='#' style='text-decoration:none;' class='text-dark'><i class='fas fa-user-check fa-2x ml-3 text-success'></i><br><p class='mr-4' style='font-size:12px;'><b >&nbsp&nbsp&nbsp&nbspFollowed</b></p></a>";
          }
          elseif($row->id != $data["reciever_id"] && Auth::user()->id != $data["sender_id"] && $flag != 1){echo "<a href='/follow/".$row->id."' style='text-decoration:none;' class='text-dark'><i class='fas fa-user-plus fa-2x ml-3'></i><br><p class='mr-4' style='font-size:12px;'><b >&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFollow</b></p></a>"; break;}
          }
          }else{
          echo  "<a href='/follow/".$row->id."' style='text-decoration:none;' class='text-dark'><i class='fas fa-user-plus fa-2x ml-3'></i><br><p class='mr-4' style='font-size:12px;'><b >&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFollow</b></p></a>";
          } ?>

        <a href="/reportuser/{{$row->id}}" style="text-decoration:none;" class="text-dark"><i class="fas fa-times-circle fa-2x ml-3"></i><br><p class="mr-4 " style="font-size:12px;"><b >&nbsp&nbspReport user</b></p></a>
      </div>
      <br>
      <br>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="far fa-eye"></i>Timeline</a>
          <a class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-address-card"></i>&nbspAbout</a>
        </div>
      </nav>
      <br>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"  aria-labelledby="nav-home-tab">
          <br>

          <center>  <span class="badge badge-warning">Projects</span></center>
          <br>
          <div class="card ">
            <div class="card-header text-center">
              Latest project
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">{{$row->project_name}}</h5>
              <p class="card-text text-center">{{$row->project_desc}}</p>
              <p class="card-text text-center">Members: {{$row->number_of_group_mem}}</p>
            </div>
          </div>

          <br>
          <div class="card text-center">
            <div class="card-header">
              Final Year project
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$row->final_yr_proj_name}}</h5>
              <p class="card-text">{{$row->final_yr_proj_desc}}</p>
              <p class="card-text">Members: {{$row->number_of_group_mem}}</a>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="profile-tab">
          <br>
          <p class="text-secondary">Contact Information</p>
          <p style="font-size:15px">Phone:        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  {{$row->phone}}</p>
          <p style="font-size:15px">Address:      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  {{$row->address}}</p>
          <p style="font-size:15px">Email:        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  {{$row->email}}</p>
          <p style="font-size:15px">Site(if any):</p>
          <br>
          <p class="text-secondary">Basic Information</p>
          <p style="font-size:15px">Birthday: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$row->dob}}</p>
          <p style="font-size:15px">Gender: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$row->gender}}</p>
          <br>
          <p class="text-secondary">Academic Information</p>
          <br>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
            10th
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Secondary Education</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">10th Institution <b>{{$row->sc_inst}}</b></li>
                    <li class="list-group-item">classes of <b>{{$row->sc_year}}</b></li>
                    <li class="list-group-item">Board <b>{{$row->sc_board}}</b></li>
                    <li class="list-group-item">Obtained <b>{{$row->sc_marks}}</b></li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal2">
            12th
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">High Secondary Education</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">12th Institution <b>{{$row->hsc_inst}}</b></li>
                    <li class="list-group-item">classes of <b>{{$row->hsc_year}}</b></li>
                    <li class="list-group-item">Board <b>{{$row->hsc_board}}</b></li>
                    <li class="list-group-item">Obtained <b>{{$row->hsc_marks}}</b></li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
            UG
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Graduation Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Institution <b>{{$row->ug_inst}}</b></li>
                    <li class="list-group-item">classes of <b>{{$row->ug_year}}</b></li>
                    <li class="list-group-item">Branch <b>{{$row->ug_branch}}</b></li>
                    <li class="list-group-item">University <b>{{$row->ug_board}}</b></li>
                    <li class="list-group-item">UG Aggregate <b>{{$row->ug_marks}}</b></li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">
            PG
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Post Graduation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="modal-body text-center">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Institution <b>{{$row->pg_inst}}</b></li>
                      <li class="list-group-item">classes of <b>{{$row->pg_year}}</b></li>
                      <li class="list-group-item">Branch <b>{{$row->pg_branch}}</b></li>
                      <li class="list-group-item">University <b>{{$row->pg_board}}</b></li>
                      <li class="list-group-item">PG Aggregate <b>{{$row->pg_marks}}</b></li>
                    </ul>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>


@endforeach

















<!-- Footer -->
<footer class="page-footer font-small bg-dark">

<!-- Footer Links -->
<div class="">

  <!-- Grid row-->
  <div class="row text-center d-flex justify-content-center pt-5 mb-3">

    <!-- Grid column -->
    <div class="col-md-2 mb-3">
      <h6 class="text-uppercase font-weight-bold ">
        <a href="#!" class="text-light">About us</a>
      </h6>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-2 mb-3">
      <h6 class="text-uppercase font-weight-bold">
        <a href="#!" class="text-light">Products</a>
      </h6>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-2 mb-3">
      <h6 class="text-uppercase font-weight-bold">
        <a href="#!" class="text-light">Awards</a>
      </h6>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-2 mb-3">
      <h6 class="text-uppercase font-weight-bold">
        <a href="#!" class="text-light">Help</a>
      </h6>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-2 mb-3">
      <h6 class="text-uppercase font-weight-bold">
        <a href="#!" class="text-light">Join Us?</a>
      </h6>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row-->
  <hr class="rgba-white-light" style="margin: 0 15%;">

  <!-- Grid row-->
  <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

    <!-- Grid column -->
    <div class="col-md-8 col-12 mt-5">
      <p style="line-height: 1.7rem" class="text-light">An employment website is a website that deals specifically with employment or careers. Many employment websites are designed to allow employers to post job requirements for a position to be filled and are commonly known as job boards.</p>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row-->
  <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

  <!-- Grid row-->
  <center>
  <div class="row pb-3">

    <!-- Grid column -->
    <div class="col-md-12">

      <div class="mb-5 flex-center">

        <!-- Facebook -->
        <a class="fb-ic">
          <i class="fa fa-facebook fa-lg text-white mr-4"> </i>
        </a>
        <!-- Twitter -->
        <a class="tw-ic">
          <i class="fa fa-twitter fa-lg text-white mr-4"> </i>
        </a>
        <!-- Google +-->
        <a class="gplus-ic">
          <i class="fa fa-google-plus fa-lg text-white mr-4"> </i>
        </a>
        <!--Linkedin -->
        <a class="li-ic">
          <i class="fa fa-linkedin fa-lg text-white mr-4"> </i>
        </a>
        <!--Instagram-->
        <a class="ins-ic">
          <i class="fa fa-instagram fa-lg text-white mr-4"> </i>
        </a>
        <!--Pinterest-->
        <a class="pin-ic">
          <i class="fa fa-pinterest fa-lg text-white"> </i>
        </a>

      </div>

    </div>
    <!-- Grid column -->

  </div>
</center>
  <!-- Grid row-->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3 text-white">© 2020 Copyright:
  <a href="/welcome"> jobfinder.com</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.explibraries=places&key=AIzaSyAbY22OBD-fuEuDzy5TFPOehTZCUvS3D3U"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</script>


</html>
