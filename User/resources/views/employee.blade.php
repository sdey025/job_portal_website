<!DOCTYPE html>
  <?php $i=0 ?>
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
      <style media="screen">
        #a:hover{
          background-color: #007BFF;
        }
        #icon{
          width: 8px;
          height: 8px;
          position: relative;
          animation-name: example;
          animation-duration: 4s;
          animation-iteration-count: infinite;
        }
        @keyframes example {
          0%   {background-color:#ffdbed;}
          10%  {background-color:#ffc2e0}
          20%  {background-color:#ffa8d4;}
          30%  {background-color:#ff8fc7;}
          40% {background-color:#ff70b8;}
          50% {background-color:#ff61b0;}
          60% {background-color:#ff52a8;}
          70% {background-color:#ff389c;}
          80% {background-color:#ff2491;}
          90% {background-color:#ff0a85;}
          100% {background-color:	#f00078;}
        }
        #icon1{
          width: 8px;
          height: 8px;
          position: relative;
          animation-name: example1;
          animation-duration: 4s;
          animation-iteration-count: infinite;
        }
        @keyframes example1 {
          0%   {background-color:#c170ff;}
          10%  {background-color:#b657ff;}
          20%  {background-color:#ab3dff;}
          30%  {background-color:#9e1fff;}
          40% {background-color:#9c1aff;}
          50% {background-color:#9305ff;}
          60% {background-color:#8200e6;}
          70% {background-color:#7400cc;}
          80% {background-color:#6800b8;}
          90% {background-color:#5a009e;}
          100% {background-color:#4b0085;}
        }
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
    <body class="" style="font-family: sans-serif;">
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


  <div class="bg-success" id="back">
    <br class="">
    <div class="row">

    <div class="col-sm-4">
      <!-- Button trigger modal -->

<!-- Modal -->
    </div>
    <div class="col-sm-4 mt-4">
        <div class="btn-group float-right dropright">
          <button type="button" class="btn btn-primary dropdown-toggle btn-lg" aria-controls="reg" href="#reg"data-toggle="collapse" aria-expanded="true" id="a1">{{Auth::user()->name}}
          </button>
          <div class="row">
          <div class="collapse multi-collapse bg-primary" id="reg" style="width: 11rem;">
            <a class="dropdown-item text-light" id="a">{{Auth::user()->curr_job_post}}</a>
            <a class="dropdown-item text-light" id="a">At: {{Auth::user()->curr_job_com}}</a>
            <a class="dropdown-item text-light" id="a">From: {{Auth::user()->curr_job_joining}}</a>
            <a class="dropdown-item text-light" id="a">Add: {{Auth::user()->address}}</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
    &nbsp &nbsp &nbsp &nbsp &nbsp  <img src="http://localhost/jobfinder.com/User/public/public/storage/{{ Auth::user()->avatar }}" alt="" style="height:200px; width:200px" class="border border-primary rounded float-center " data-wow-delay="0.6s">

    </div>



</div>

<br>
<br>

</div>

<br>


<div class="container">

    <form method="post" action="{{action('HomeController@store')}}">
      @csrf
      <div class="row">
        <div class="col-md-10">
          <textarea name="post_content" class="form-control " placeholder="What's in your mind"></textarea>
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-success " value="Update">
        </div>
      </div>
  </form>

</div>

<br>

<div class="container" >
  <div class="row text-center" >
      <span class="col-md-3"></span>
      <a class="icon-block text-center" style="text-decoration:none;" href="/welcome1">
      <span class="fas fa-home fa-3x float-center text-warning" title="Home"></span>
      <p class="text-warning">Home</p>
      </a>
      &nbsp &nbsp &nbsp &nbsp &nbsp
      <a class="icon-block text-center" style="text-decoration:none;" href="/network">
      <span class="fas fa-users fa-3x text-info" title="Network"></span>
      <p class="text-info">Network</p>
      </a>
      &nbsp &nbsp &nbsp &nbsp &nbsp
      <a class="icon-block text-center" style="text-decoration:none;" href="/jobs">
      <span class="fas fa-briefcase fa-3x text-danger" title="Jobs"></span>
      <p class="text-danger">Jobs</p>
      </a>
     &nbsp &nbsp &nbsp &nbsp
      <a class="icon-block text-center" style="text-decoration:none;" href="/message/Auth::user()->id">
      <span class="fas fa-envelope fa-3x text-primary" title="Messages"><input type="hidden" name="message" value="message"></span><?php
             $flag=0;
              $sql = "SELECT * FROM messages";
                $result = $conn->query($sql);

              if (isset($result->num_rows) && $result->num_rows > 0) {
                            //    echo "<table><tr><th>ID</th><th>Name</th></tr>";

                                while($rows = $result->fetch_assoc()) {
                               if(Auth::user()->id == $rows["message_reciever_id"]){
                                        $flag = 1;
                                        break;
                                  }
                                }
                                if($flag == 1){
                                    echo "<object class='rounded-circle' id='icon'></object>";
                                }
                               }
                                 ?>
      <p class="text-primary">Messages</p>
      </a>
      &nbsp &nbsp &nbsp
      <a class="icon-block text-center" style="text-decoration:none;" href="/noti">
      <span class="fas fa-bell fa-3x text-secondary" title="Notifications"></span><?php
             $flag=0;
              $sql = "SELECT * FROM comments";
                $result = $conn->query($sql);

              if (isset($result->num_rows) && $result->num_rows > 0) {
                            //    echo "<table><tr><th>ID</th><th>Name</th></tr>";

                                while($rows = $result->fetch_assoc()) {
                               if(Auth::user()->id == $rows["master_user_id"]){
                                        $flag = 1;
                                        break;
                                  }
                                }
                                if($flag == 1){
                                    echo "<object class='rounded-circle' id='icon1'></object>";
                                }
                               }
                                 ?>
      <p class="text-secondary">Notifications</p>
      </a>
  </div>
</div>
<br>


<div class="row">
  <div class="col-md-4 ml-4">
    <div class="card border border-dark" style="width: 15rem;">

  <div class="card-body">
    <h5 class="card-title">Bio:</h5>
    <p class="card-text">{{Auth::user()->bio}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Connections: <?php
           $flag=0;
            $sql = "SELECT * FROM followsystem";
              $result = $conn->query($sql);

            if (isset($result->num_rows) && $result->num_rows > 0) {
                          //    echo "<table><tr><th>ID</th><th>Name</th></tr>";

                              while($rows = $result->fetch_assoc()) {
                             if(Auth::user()->id == $rows["reciever_id"]){
                              $flag++;
                             }

                               //  $flag=1;
                                 //echo $flag;
                                 //break;
                               } echo $flag;
                             }
                               ?></li>
    <li class="list-group-item">Joined At: {{Auth::user()->created_at}}</li>
  </ul>

</div>
  </div>

<div class="col-md-7 ">
<div class="card text-center">
  <div class="card-header">
    Latest Project I worked on
  </div>
  <div class="card-body">
    <h5 class="card-title">Project: {{Auth::user()->project_name}}</h5>
    <p class="card-text">Project details: {{Auth::user()->project_desc}}</p>
    <a href="#" class="btn btn-primary">More info</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
</div>
</div>
<br>
<div class="row">
  &nbsp &nbsp &nbsp
<div class="col-md-4">
  <div class="card border border-dark" style="width: 15rem;" >
    <div class="card-body">
      <h5 class="card-title">Skills:</h5>
      <p class="card-text">{{Auth::user()->skill}}</p>
      <a href="/quizdashboard" class="btn btn-primary">Take a Quiz</a>
    </div>
  </div>
    <br>

      <form class="form-inline" action="/search" method="get">
        <div class="form-group mb-3">
          <input class="form-control col-md-12" type="search" name="search" placeholder="Search" aria-label="Search"/>
        </div>

          <button class="mb-3 btn btn-outline-success col-md-2"><i class="fas fa-search"></i>
          </button>

</form>
</div>
<div class="col-md-7 ">
<div class="card text-center">
  <div class="card-header">
    Final year Project
  </div>
  <div class="card-body">
    <h5 class="card-title">Project Name: {{Auth::user()->final_yr_proj_name}}</h5>
    <p class="card-text">Project details: {{Auth::user()->final_yr_proj_desc}}</p>
    <a href="#" class="btn btn-primary">More info</a>
  </div>
  <div class="card-footer text-muted">
    4 days ago
  </div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-7">
</div>

<div class="col-md-4">
<a class="btn btn-success text-light">More Details</a>
</div>
</div>

<br>
<hr>
<div class="container">
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0"><center>
        <button class="btn btn-secondary collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Find Groups
        </button></center>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body"><center>
        <button type="button" class="btn btn-outline-primary m-3">Groups for Marketing</button>
        <button type="button" class="btn btn-outline-secondary m-3">Groups for Information Technology</button>
        <button type="button" class="btn btn-outline-success m-3">Groups for BPO</button>
        <button type="button" class="btn btn-outline-danger  m-3">Groups for Human Resources</button>
        <button type="button" class="btn btn-outline-warning m-3">Groups for Social Marketing</button>
        <button type="button" class="btn btn-outline-info m-3">Groups for Sales</button>
      </center>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0"><center>
        <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Grow Your Network
        </button></center>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
          @foreach($posts as $user)
          @if($user->name == Auth::user()->name)
          @else
          @if($loop->index < 6)
            <a href="#"><button type="button" class="btn btn-outline-warning">{{$user->name}}</button></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          @else
          <br>
          <center><a href=""> <span class="badge badge-primary">See More</span></a></center>
          @break;
          @endif
          @endif


          @endforeach
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0"><center>
        <button class="btn btn-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          My Contacts
        </button></center>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">

      </div>
    </div>
  </div>
</div>
</div>
  <br>
  <hr>





<center>
<span class="badge badge-pill badge-warning">Academic Details</span>
</center>
<br>
<div class="container">

  <table class="table table-md table-light table-striped text-center">
    <thead>
      <tr>
        <th scope="col">Std</th>
        <th scope="col">School/College</th>
        <th scope="col">Branch</th>
        <th scope="col">Completion Year</th>
        <th scope="col">Board</th>
        <th scope="col">Marks</th>
      </tr>
    </thead>
    <tbody>


      <tr>
        <th scope="row">10th</th>
        <td>{{Auth::user()->sc_inst}}</td>
        <td>------------</td>
        <td>{{Auth::user()->sc_year}}</td>
        <td>{{Auth::user()->sc_board}}</td>
        <td>{{Auth::user()->sc_marks}}</td>
      </tr>
      <tr>
        <th scope="row">12th</th>
        <td>{{Auth::user()->hsc_inst}}</td>
        <td>------------</td>
        <td>{{Auth::user()->hsc_year}}</td>
        <td>{{Auth::user()->hsc_board}}</td>
        <td>{{Auth::user()->hsc_marks}}</td>
      </tr>
      <tr>
        <th scope="row">UG</th>
        <td>{{Auth::user()->ug_inst}}</td>
        <td>{{Auth::user()->ug_branch}}</td>
        <td>{{Auth::user()->ug_year}}</td>
        <td>{{Auth::user()->ug_board}}</td>
        <td>{{Auth::user()->ug_marks}}</td>
      </tr>
      <tr>
        <th scope="row">PG</th>
        <td>{{Auth::user()->pg_inst}}</td>
        <td>{{Auth::user()->pg_branch}}</td>
        <td>{{Auth::user()->pg_year}}</td>
        <td>{{Auth::user()->pg_board}}</td>
        <td>{{Auth::user()->pg_marks}}</td>
      </tr>
    </tbody>
  </table>
</div>
<br>

<div class="container">
  <center><span class="badge badge-dark">Your Posts:</span></center>
  <br>
  @foreach($posts as $post)

  @if(Auth::user()->id == $post->user_id)
<div class="jumbotron bg-dark text-light">
  <div class="row"><h4 class="mb-4">{{Auth::user()->name}}</h4>&nbsp&nbsp&nbsp<small class="mt-2">{{$post->created_at}}</small></div>
  <form method="post" action="/employee/{{$post->pid}}">
    @csrf
    @method('delete')
    <button type="submit" class="float-right bg-dark btn btn-dark" >  <i class=" fas fa-times"></i></button>

  </form>
  <p class="lead">{{$post->post_content}}</p>
  <br>
  <div class="accordion bg-dark" id="accordionExample">
    <div class="card bg-dark border border-dark">
      <div class='list-group-item text-light bg-dark'>
      <?php
             // $flag=0;
              $sql = "SELECT * FROM comments";
                $result = $conn->query($sql);

              if (isset($result->num_rows) && $result->num_rows > 0) {
                            //    echo "<table><tr><th>ID</th><th>Name</th></tr>";

                                while($rows = $result->fetch_assoc()) {
                               if(Auth::user()->id == $rows["master_user_id"] && $post->pid == $rows["post_id"]){
                                 echo "<b>".$rows["commenter_name"]."</b><br><p>".$rows["comment"]."</p><br>";
                               }
                                 //  $flag=1;
                                   //echo $flag;
                                   //break;
                                 }
                               }
                                 ?>
                                 </div>

        <h5 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i ?>" aria-expanded="true" aria-controls="collapseOne">
            <i class="fab fa-replyd text-center text-light"><br>Reply</i>
          </button>
        </h5>


      <div id="collapse<?php echo $i ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <form method="post" action="/employee/{{$post->pid}}">
            @csrf
            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
            <input type="hidden" name="mui" value="{{Auth::user()->id}}">
            <input type="submit" class="btn btn-success mt-2 float-right mr-4" value="Reply to this Post">
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<br>
@else

@endif
<?php $i++ ?>
  @endforeach
</div>


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
<script>
/*
fetch_post();


  $(document).ready(function(){
    $('#post_form').on('submit',function(event){
      event.preventDefault();
      if($('#post_content').val() == ''){
        alert('Enter Story Content');
      }
      else{
        var form_data = $(this).serialize();
        $.ajax({
          url:"action.php",
          method:"POST",
          data:form_data,
          success:function(data){
            alert('Post has been Shared');
            $('#post_form')[0].reset();
            fetch_post();
          }
        })
      }
    });
    function fetch_post(){
      var action = 'fetch_post';
      $.ajax({
        url:'action.php',
        method: "POST",
        data:{action:action},
        success:function(data){
          $('#post_list').html(data);
        }
      })
    }
  }); */
</script>
<script>
var searchInput = 'search_input';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
      //  document.getElementById('loc_lat').value = near_place.geometry.location.lat();
      //  document.getElementById('loc_long').value = near_place.geometry.location.lng();

      //  document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
    //    document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    });
});
</script>
<script>
<script>
function validateForm() {
  var name =  document.getElementById('name').value;
  if (name == "") {
      document.querySelector('.status').innerHTML = "Name cannot be empty";
      return false;
  }
  var email =  document.getElementById('email').value;
  if (email == "") {
      document.querySelector('.status').innerHTML = "Email cannot be empty";
      return false;
  } else {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(!re.test(email)){
          document.querySelector('.status').innerHTML = "Email format invalid";
          return false;
      }
  }
  var subject =  document.getElementById('subject').value;
  if (subject == "") {
      document.querySelector('.status').innerHTML = "Subject cannot be empty";
      return false;
  }
  var message =  document.getElementById('message').value;
  if (message == "") {
      document.querySelector('.status').innerHTML = "Message cannot be empty";
      return false;
  }
  document.querySelector('.status').innerHTML = "Sending...";
}

//setCarouselHeight('#carousel-example');

//function setCarouselHeight(id)
//{
//  var slideHeight = [];
//  $(id+' .item').each(function()
//  {
  //    // add all slide heights to an array
    //  slideHeight.push($(this).height());
  //});

  // find the tallest item
  //max = Math.max.apply(null, slideHeight);

  // set the slide's height
  //$(id+' .carousel-content').each(function()
  //{
    //  $(this).css('height',max+'px');
  //});
//}

</script>
<script>
$(document).ready(function(){
  $('.deklete_form').on('submit',function(){
      if(confirm("Are you sure you want to delete it?")){
        return true;
      }
      else{
        return false;
      }
  });
});
</script>
</html>
