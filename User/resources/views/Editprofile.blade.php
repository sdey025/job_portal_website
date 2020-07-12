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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job Finder</title>
        <style media="screen">
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
        <li class="nav-item">
          <a class="nav-link" href="/welcome1">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/jobs">Jobs</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="/contact">Contacts<span class="sr-only">(current)</span></a>
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
                         <a href="/employee" class="dropdown-item text-dark "><center>{{Auth::user()->name}}</center></a>
                         <a href="/appliedjob" class="dropdown-item text-dark "><center>Jobs Applied</center></a>
                         <a href="{{ url('/network') }}" class="dropdown-item text-dark "><center>Connections</center></a>
                         <a href="/jobs" class="dropdown-item text-dark "><center>New Jobs</center></a>
                         <a href="{{ url('/Editprofile') }}" class="dropdown-item text-dark active "><center>Edit Profile</center></a>

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




<br>




<div class="container">

      @if($message = Session::get('success1'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> DONE ! </strong>
      </div>
      @endif

  <form class="" method="post" action="/Editprofile/{{Auth::user()->id}}" >
    @csrf


  <center><span  class="badge badge-dark text-light">Current Job Details</span></center>
  <br>
  <div class="row">
    <div class="form-group">
      <label for="exampleInputEmail1">Company Name</label>
      <input type="text" class="form-control col-md-12" id="" name="curr_job_com" placeholder="Name of Firm you switched to" required>
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


  <center><button type="submit" class="btn btn-primary">Submit</button></center>

  </form>
<br>
</div>

<br>
<center> <span class="badge badge-success">Change Personal details</span></center>
<br>
<div class="container">

  <form class="" action="/Editprofile" method="post" enctype="multipart/form-data">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">x</button>
          <strong> DONE ! </strong>
    </div>
    @endif
@csrf
<label>Change Profile picture</label>
<div class="form-group">
  <div class="custom-file">
  <input type="file" name="avatar" class="custom-file-input" value="">
  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
</div>
</div>
<center>
<input type="submit" class="btn btn-outline-success"></center>

</div>
  </form>
  <br>
  <hr>
  <center><span class="badge badge-primary">Edit Personal Contacts</span></center>
  <br>

<div class="container">


<form class="" action="/Editprofile/{{Auth::user()->id}}" method="post">
@csrf

<input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter New Name"><br>
<input type="Address" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Enter New Address"><br>


<center><input type="submit" class="btn btn-outline-warning"></center>

</form>
</div>

<br>
<hr>
<div class="container">

<center><span class="badge badge-warning">Change Password</span></center>
<br>

  <form class="" action="/Editprofile/{{Auth::user()->id}}" method="post">
  @csrf

  <input type="password" name="oldpassword" class="form-control" id="exampleFormControlInput1" placeholder="Enter old password" required><br>

  <input type="password" name="password"class="form-control" id="exampleFormControlInput1" placeholder="Enter New password"><br>
  <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Confirm New Password"><br>

  <center><input type="submit" class="btn btn-outline-danger"></center>

  </form>

</div>
<br>
<div class="container">
  <br>
  <center><span class="badge badge-danger">Edit Academic Details(10th)</span></center>
  @if($message = Session::get('success3'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
        <strong> {{$message}} </strong>
  </div>
  @endif
  <br>
  <form class="" action="/Editprofile/{{Auth::user()->id}}" method="post">
    @csrf
    <input type="text" class="form-control" placeholder="Enter Name of secondary school" name="sc_inst" value=""><br>
    <input type="month" class="form-control" placeholder="Enter Completion year" name="sc_year" value=""><br>
    <input type="text" class="form-control" placeholder="Enter 10th Marks" name="sc_marks" value=""><br>
    <input type="text" class="form-control" placeholder="Enter Board of Education" name="sc_board" value=""><br>
    <center><input type="submit" class="btn btn-primary" value="Save"></center>
    <br>
  </form>
</div>

<div class="container">
  <br>
  <center><span class="badge badge-dark">Edit Academic Details(12th)</span></center>
  @if($message = Session::get('success4'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
        <strong> {{$message}} </strong>
  </div>
  @endif
  <br>
  <form class="" action="/Editprofile/{{Auth::user()->id}}" method="post">
    @csrf
    <input type="text" class="form-control" placeholder="Enter Name of 12th/Diploma school/College" name="hsc_inst" value=""><br>
    <input type="month" class="form-control" placeholder="Enter Completion year" name="hsc_year" value=""><br>
    <input type="text" class="form-control" placeholder="Enter 12th Marks" name="hsc_marks" value=""><br>
    <input type="text" class="form-control" placeholder="Enter Board of Education" name="hsc_board" value=""><br>
    <center><input type="submit" class="btn btn-success" value="Save"></center>
    <br>
  </form>
</div>

<div class="container">
  <br>
  <center><span class="badge badge-link">Edit Academic Details(Graduation)</span></center>
  @if($message = Session::get('success5'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
        <strong> {{$message}} </strong>
  </div>
  @endif
  <br>
  <form class="" action="/Editprofile/{{Auth::user()->id}}" method="post">
    @csrf
    <input type="text" class="form-control" placeholder="Enter Name of College" name="ug_inst" value=""><br>
    <input type="month" class="form-control" placeholder="Enter Completion year" name="ug_year" value=""><br>
    <input type="text" class="form-control" placeholder="Enter Aggregate Marks" name="ug_marks" value=""><br>
    <input type="text" class="form-control" placeholder="Enter University Name" name="ug_board" value=""><br>
    <input type="text" class="form-control" placeholder="Enter Branch" name="ug_branch" value=""><br>
    <center><input type="submit" class="btn btn-success" value="Save"></center>
    <br>
  </form>
</div>

<div class="container">
  <br>
  <center><span class="badge badge-danger">Edit Academic Details(Post Graduation)</span></center>
  @if($message = Session::get('success6'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
        <strong> {{$message}} </strong>
  </div>
  @endif
  <br>
  <form class="" action="/Editprofile/{{Auth::user()->id}}" method="post">
    @csrf
    <input type="text" class="form-control" placeholder="Enter Name of College" name="pg_inst" value=""><br>
    <input type="month" class="form-control" placeholder="Enter Completion year" name="pg_year" value=""><br>
    <input type="text" class="form-control" placeholder="Enter Aggregate Marks" name="pg_marks" value=""><br>
    <input type="text" class="form-control" placeholder="Enter University Name" name="pg_board" value=""><br>
    <input type="text" class="form-control" placeholder="Enter Branch" name="pg_branch" value=""><br>
    <center><input type="submit" class="btn btn-success" value="Save"></center>
    <br>
  </form>
</div>
<hr>
<center><span class="badge badge-secondary">Delete Your Account?</span>
  <br><br>
<center><a href="/whydel"><button type="submit" class="btn btn-danger">Delete Your Account</button></a></center>
<br>
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
      <a href="/home"> jobfinder.com</a>
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->

        </body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.explibraries=places&key=AIzaSyAbY22OBD-fuEuDzy5TFPOehTZCUvS3D3U"></script>
    <script>
  //  var searchInput = 'search_input';

    //$(document).ready(function () {
      //  var autocomplete;
        //autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
          //  types: ['geocode'],
        //});

        //google.maps.event.addListener(autocomplete, 'place_changed', function () {
          //  var near_place = autocomplete.getPlace();
          //  document.getElementById('loc_lat').value = near_place.geometry.location.lat();
          //  document.getElementById('loc_long').value = near_place.geometry.location.lng();

          //  document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        //    document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    //    });
  //  });
    </script>
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




    </html>
