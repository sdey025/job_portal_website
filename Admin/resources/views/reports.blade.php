<!DOCTYPE html>
<?php $i=0; ?>
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
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>Job finder</title>
          <script src="https://kit.fontawesome.com/3ca8a7bfff.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>


            html, body {


                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
      <div class="row">
        <div class="col-md-2" style="background-color: #e8ccd7;">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link " href="/"> <img src="http://localhost/jobfinder.com/User/resources/views/imagesss/2020.png" style="width:200px; height:125px;"> </a>
            </li>
            <br>
            <li class="nav-item text-center">
              <a class="nav-link text-dark font-weight-bold " href="/users"><b>Users</b></a>
            </li>
            <li class="nav-item text-center" active>
              <a class="nav-link text-dark font-weight-bold" href="/job_pro" active><b>Job Providers</b></a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link text-dark font-weight-bold" href="/companies"><b>See Companies</b></a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link text-dark font-weight-bold" href="/ptjobs"><b>See Partime jobs</b></a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link text-dark font-weight-bold" href="/ftjobs"><b>See Fulltime Jobs</b></a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link text-dark font-weight-bold" href="/freelance"><b>See FreeLancing Jobs</b></a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link text-dark font-weight-bold" href="/addquesofquiz"><b>More Options</b></a>
            </li>
          </ul>
          @if (Route::has('login'))
              <div class="text-center links">
                  @auth
                      <a class="text-dark  font-weight-bold" style="text-decoration:none;" href="/">Go to home</a>
                      <div class="">
                          <form id="logout-form" action="{{ route('logout') }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-link text-dark font-weight-bold" style="text-decoration:none;">{{ __('Logout') }}</button>

                          </form>
                      </div>
                  @else
                      <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
          @endif

          <br>
          <br>
          <br>
          <br>

        </div>
        <div class="col-md-10" style="background-color:#000000;">
          <br>
          <div class="container">
          @foreach($report as $row)
          <ul class="list-group">
            @if($id == $row->reported_user_id)
              <li class='list-group-item list-group-item-light'>Reported Person: {{$row->name}} <form action="/reports/{{$row->ruid}}" method="post">@csrf @method('delete')<button type="submit" class="float-right"><i class="fas fa-times float-right"></i></button></form> <br> Reason: {{$row->reason}} </li>
            @endif
          </ul>
          @endforeach
            </div>

          </div>
        </div>















    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </html>
