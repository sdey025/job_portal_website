<?php

$timer = 600;


?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <?php
      $a=0;
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
        <style media="screen">
        * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }


            article {
                width: 300px;
                text-align: center;
                background-color: #68b04d;
                border-radius: 10px;
                margin: 5px;
                padding: 5px;
                overflow: hidden;
                box-shadow: 3px 3px 10px #ccc;
            }

            article h3 {
                padding: 10px;
                color: #fff;
            }
            article .count {
                padding: 5px;
            }
            article #timer{
                padding: 5px;
                color: crimson;
                background-color: aliceblue;
                border-radius: 2px;
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
        #grad{
          background-image: linear-gradient(#ff70b8,#ff52a8,#ff389c,#ff2491,#ff0a85);
        }


        </style>
        <title>Job Finder</title>
        <script>




          </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
      </head>
      <body style="font-family:sans-serif;">
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

        <li class="nav-item">
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
<article class="sticky-top float-right text-center mr-4 rounded-circle" style="width:52px; height:52px;">
<input type="text" style="background-color: rgb(104,176,77);" class="mt-1 ml-1" value="600" id="txtBox"  readonly>
<br/><br/>


</article>
  <div class="container">
    <ul class="list-group">
      <li class="list-group-item active my-auto " style="width:1250px; height:100px; 	color: #feebc8;">WEB DEVELOPMENT QUIZ <br> Instructions</li>
      <li class="list-group-item" style="width:1250px;">1. The quiz consists of questions carefully designed to help you self-assess your comprehension of the information presented on the topics covered in the module. No data will be collected on the website regarding your responses or how many times you take the quiz.<br><br>

2. Each question in the quiz is of multiple-choice or "true or false" format. Read each question carefully, and click on the button next to your response that is based on the information covered on the topic in the module. Each correct or incorrect response will result in appropriate feedback immediately at the bottom of the screen.<br><br>

3. After responding to a question, click on the "Next Question" button at the bottom to go to the next questino. After responding to the 8th question, click on "Close" on the top of the window to exit the quiz.<br><br>

4. If you select an incorrect response for a question, you can try again until you get the correct response. If you retake the quiz, the questions and their respective responses will be randomized.<br><br>

5. The total score for the quiz is based on your responses to all questions. If you respond incorrectly to a question or retake a question again and get the correct response, your quiz score will reflect it appropriately. However, your quiz will not be graded, if you skip a question or exit before responding to all the questions.
  <br>  <center><button type="button" class="btn btn-success" value="Start Timer" onclick="startTimer('txtBox')"> Start Test </button></center>
</li>
    </ul>
  </div>


  @foreach($topic as $row)
  <br>
  <form action="/web_development_quiz" method="post">
    @csrf
  <div class="container">
    <div class="card">
      <div class="card-body">
        <?php echo "Q"; ?>: {{$row->question}}
        <br>
        <br>
        <label class="radio-inline"><input type="radio" name="optradio" value="{{$row->answer1}}">&nbsp{{$row->answer1}}</label>
        <br>
        <label class="radio-inline"><input type="radio" name="optradio" value="{{$row->answer2}}">&nbsp{{$row->answer2}}</label>
        <br>
        <label class="radio-inline"><input type="radio" name="optradio" value="{{$row->answer3}}">&nbsp{{$row->answer3}}</label>
        <br>
        <label class="radio-inline"><input type="radio" name="optradio" value="{{$row->answer4}}">&nbsp{{$row->answer4}}</label>
      </div>
    </div>
  </div>
    <br>
    <input type="hidden" name="qid" value="{{$row->id}}">
    <input type="hidden" name="rightans" value="{{$row->rightanswer}}">
    <center> <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded transition ease-in-out duration-700" type="submit" name="submit" value="submit">Submit Answer</button>
  </form>
      <br><br>
  @endforeach
  <a href="/testdone"><button type="button" name="button">Submit Test</button></a>
<center class="float-center" style="width:40%;">{{$topic->links()}}</center>














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
      <script type="text/javascript">
      var intervalId;

         function startTimer(controlId)
         {
             var control = document.getElementById(controlId);
             var seconds = control.value;
             seconds = seconds - 1;
             if (seconds == 0)
             {
                 control.value = "Done";
                 return;
             }
             else
             {
                 control.value = seconds;
             }

             intervalId = setTimeout(function () { startTimer('txtBox'); }, 1000);
         }

         function stopTimer()
         {
             clearTimeout(intervalId);
         }

      </script>

          </body>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="js/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.explibraries=places&key=AIzaSyAbY22OBD-fuEuDzy5TFPOehTZCUvS3D3U"></script>



      </html>
