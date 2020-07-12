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
            #five{
              background-color: #3B3F9A;
            }
            #a{
              background-color: #3B3F9A;
            }
            #myDIV {
              background-color: 	#d6d6c2;
              width: 900px;
              height: 500px;
              overflow-y: scroll;
            }
            #but{
              width:60px;
              height:40px;
            }
          </style>
        <title>Job Finder</title>

        <!-- Fonts -->
          <script src="https://kit.fontawesome.com/3ca8a7bfff.js" crossorigin="anonymous"></script>
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
          <a class="nav-link" href="companies">Companies</a>
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

<div class="row">
  <div class="col-md-4" id="five">
<div>
    <br>
    <ul class="list-group list-group-flush">

      <center><i class="far fa-comment mb-3 text-light fa-lg"><b><i>&nbspMessages</i></b></i></center>
      <center>
      <?php

      $sql = "SELECT users.name,users.id,users.avatar,followsystem.sender_id,followsystem.reciever_id FROM followsystem join users";
      $results = $conn->query($sql);

      if (isset($results->num_rows) && $results->num_rows > 0) {
                    //    echo "<table><tr><th>ID</th><th>Name</th></tr>";

              while($rows = $results->fetch_assoc()) {
                if($rows["id"] == $rows["reciever_id"] && Auth::user()->id == $rows["sender_id"]) {
                  echo "<a style='text-decoration:none;'  href='/message/".$rows["id"]."'><li class='list-group-item text-light' id='a'><img src='http://localhost/jobfinder.com/User/public/public/storage/".$rows["avatar"]."' class='rounded-circle' style='width:40px; height:40px;'>&nbsp".$rows["name"]."</li></a>";
                   }
                 }
               }
     else{echo "no data";}
                         ?>
      </center>


      <li class="list-group-item" id="a"></li>

    </ul>
  </div>
  </div>
  <div class="col-md-8">
<br>
    @foreach($data as $row)
    @if($row->id == Auth::user()->id)
    @else
      <div class="ml-4">
        <div class="row">
          <img src="http://localhost/jobfinder.com/User/public/public/storage/{{$row->avatar}}" class="rounded-circle" style="width:100px; height:100px;" alt="">
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p class="mt-4" style="font-size:25px;"><a href="/otherprofile/{{$row->id}}" style="text-decoration:none;"><b>{{$row->name}}</b></a></p>
        </div>
      </div>
      <hr>
    @endif

    <!-- The scrollable area -->
        <div id="myDIV" class="ml-4">

            <?php


                    $sql = "SELECT messages.message_sender_id,messages.message_reciever_id,messages.message,messages.created_at FROM messages ORDER BY id ASC";
                      $result = $conn->query($sql);

                    if (isset($result->num_rows) && $result->num_rows > 0) {
                                    while($rows = $result->fetch_assoc()) {
                                     if( $rows["message_sender_id"] == $row->id && $rows["message_reciever_id"] == Auth::user()->id){
                                      echo "      <div class='row ml-2 mt-3'>
                                                  <img src='http://localhost/jobfinder.com/User/public/public/storage/".$row->avatar."' class='rounded-circle' style='width:40px; height:40px;'>
                                                  <div class='card border-primary mb-3' style='max-width: 38rem;'>
                                                    <div class='card-body text-primary'>
                                                      <p class='card-text'>".$rows["message"]."</p><small>".$rows["created_at"]."</small>
                                                    </div>
                                                  </div>
                                                  </div>";
                                      }elseif($rows["message_sender_id"] == Auth::user()->id && $rows["message_reciever_id"] == $row->id){
                                        echo "     <div class='row ml-2 mt-3'>
                                                    <img src='http://localhost/jobfinder.com/User/public/public/storage/".Auth::user()->avatar."' class='rounded-circle' style='width:40px; height:40px;'>
                                                    <div class='card border-primary mb-3' style='max-width: 38rem;'>
                                                      <div class='card-body text-primary'>
                                                        <p class='card-text'>".$rows["message"]."</p><small>".$rows["created_at"]."</small>
                                                      </div>
                                                    </div>
                                                    </div>";
                                      }else{
                                        echo "";
                                                }
                                              }
                                            }else{echo "no data";}
                                       ?>
        </div>
        <br>
      <form method="post" action="/message/{{$row->id}}">
          @csrf
        <div class="row ml-2">
          <textarea class="form-control ml-4" name="message" id="exampleFormControlTextarea1" style="resize:none; width:800px;"  rows="2"></textarea>

          &nbsp&nbsp<input type="submit" class="btn btn-success btn-sm mt-3"  id="but" value="Send">

        </div>
      </form>
  @endforeach
        <br>
</div>

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


</html>
