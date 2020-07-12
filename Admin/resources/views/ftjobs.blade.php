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
          <center><span class="badge badge-warning">Full time job offers</span></center>
          <form action="/searchjobs" method="get"><div class="row float-right">
           <input class="form-control form-control-sm mr-1" name="jobs" style="width:200px;" type="text" placeholder="Search Job"> <input type="submit" class="btn btn-success btn-sm mr-4" value="Search"> </div><br>
         </form>
          <br>
          <br>
          <div class="container">
            <table class="table bg-light text-center">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Name of Company</th>
                  <th scope="col">Size of Company</th>
                  <th scope="col">Hiring</th>
                  <th scope="col">Description</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($company as $row)
                <tr>
                  <th scope="row"> <img src="http://localhost/jobfinder.com/job_provider/public/upload/employee/{{$row->com_logo}}" style="width:100px; height:75px;" alt=""> </th>
                  <td class="font-weight-bold">{{$row->company_name}}</td>
                  <td class="font-weight-bold">{{$row->company_size}}</td>
                  <td>for <b class="font-weight-bold">{{$row->stream}}</b> <br> Uploaded by <?php
                          $sql = "SELECT * FROM job_providers";
                            $result = $conn->query($sql);
                          if (isset($result->num_rows) && $result->num_rows > 0) {
                                            while($rows = $result->fetch_assoc()) {
                                              if($row->user_id == $rows["id"]){
                                                echo "<b class='font-weight-bold'>".$rows["name"]."</b>";
                                              }
                                            }
                                           }
                                             ?></td>
                  <td>{{$row->job_desc}}</td>
                  <td><form action="/ftjobs/{{$row->id}}" method="post">
                    @csrf
                    @method('delete')
                   <button type="submit" class="btn btn-danger btn-sm">Delete Job</button>
                 </form>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <center>{{ $company->links() }}</center>
          </div>

        </div>
      </div>
















    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </html>
