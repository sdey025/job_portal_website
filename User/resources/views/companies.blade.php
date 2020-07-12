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
        <script src="https://kit.fontawesome.com/3ca8a7bfff.js" crossorigin="anonymous"></script>
        <title>Job Finder</title>
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
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>

#flip-card {
  background-color: transparent;
  perspective: 1000px;
}

/* This container is needed to position the front and back side */
#flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;

}

/* Do an horizontal flip when you move the mouse over the flip box container */
#flip-card:hover #flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
#flip-card-front, #flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;

  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */

.flip-card-front {
  background-color: #bbb;
  color: black;
}
/* Style the back side */
#flip-card-back {

  color: white;
  transform: rotateY(180deg);
}

#img {
  opacity: 0.4;

}

#a:hover{
  background-color: #007BFF;

}
#a1:hover{
    transform: scaleY(1);
}
#div1{
}
        </style>


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
      <li class="nav-item active">
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
                       <a href="/employee" class="dropdown-item text-dark "><center>{{ Auth::user()->name }}</center></a>
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
<br>
<br>
<div class="container">
  <p>Get Access to the World !!!</p>
  <h3>Search Jobs According to Compnies</h3>
</div>
<br>
  <div class="container">
    <div class="row">
    <div class="col-md-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Location" id="search_input" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append ">
            <i class="fas fa-search-location fa-lg ml-2 mt-2"></i>
          </div>
        </div>

    </div>
    &nbsp&nbsp&nbsp
    <form method="get" class="form-inline" action="/searchjobbycom">
    <div class="col-md-9">

      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Company" name="city" >
        <div class="input-group-append ">
          <i class="fas fa-search-dollar fa-lg ml-2 mt-2"></i>
        </div>
      </div>
    </div>
    &nbsp&nbsp&nbsp
    <div class="col-md-2">
      <input type="submit" class="btn btn-warning" value="Search">
    </div>
    </form>
  </div>

</div>
<br>
<br>

<div class="container">
  <center><span class="badge badge-danger ">Companies with 5 stars</span></center>
  <br><br>
  <div class="row">
    @foreach($newjobs as $row)

    <div class="card mb-4 ml-4" style="width: 16rem;">
      <img src="http://localhost/jobfinder.com/job_provider/public/upload/employee/{{$row->com_logo}}" class="card-img-top" style=" height:9rem;">
      <div class="card-body">
        <p class="card-text">Hired <b>{{$row->stream}}</b> Candidates !!!</p>
        <p>We wish a Bright Future to them !!!</p>
        <div class="card-footer"><center><span class="text-primary"><i class="fas fa-star"></i>&nbsp&nbsp&nbsp<i class="fas fa-star"></i>&nbsp&nbsp&nbsp<i class="fas fa-star"></i>&nbsp&nbsp&nbsp<i class="fas fa-star"></i>&nbsp&nbsp&nbsp<i class="fas fa-star"></i></span></center></div>
      </div>
    </div>

    @endforeach
  </div>
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
  <a href="/welcome"> jobfinder.com</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</script>

</html>
