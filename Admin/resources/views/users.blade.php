<!DOCTYPE html>
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
              <a class="nav-link text-dark font-weight-bold " href="/users" active><b>Users</b></a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link text-dark font-weight-bold" href="/job_pro"><b>Job Providers</b></a>
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
      <div class="col-md-10" style="background-color: #000000;">
        <br>

       <center>   <span class="badge badge-primary ">List of Users</span> </center>  <form action="/searchedusers" method="get"><div class="row float-right">
         <input class="form-control form-control-sm mr-1" name="users" style="width:200px;" type="text" placeholder="Search users"> <input type="submit" class="btn btn-success btn-sm mr-4" value="Search"> </div><br>
       </form>
        <br>
        @if($message = Session::get('success10'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
              <strong> {{ $message }}</strong>
        </div>
        @endif
        <div class="container">
          <table class="table bg-light text-center">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Working in</th>
                <th scope="col">Stream</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $row)
              <tr>
                <th scope="row"> <img src="http://localhost/jobfinder.com/User/public/public/storage/{{$row->avatar}}" style="width:75px; height:75px;" class="rounded-circle" alt=""> </th>
                <td><a href="/profile/{{$row->id}}" class="text-dark" style="text-decoration:none;">{{$row->name}}</a><br> <small> <i class="fas fa-map-marker-alt"></i> {{$row->address}} </small></td>
                <td>{{$row->curr_job_com}}<br>as {{$row->curr_job_post}}</td>
                <td>{{$row->stream}}</td>
                <td> <a href="/reports/{{$row->id}}"<button type="submit" class="btn btn-warning">Get Reported       <?php
                  $count=0;
                      $sql = "SELECT * FROM  report_user";
                      $results = $conn->query($sql);

                      if (isset($results->num_rows) && $results->num_rows > 0) {
                                    //    echo "<table><tr><th>ID</th><th>Name</th></tr>";

                              while($rows = $results->fetch_assoc()) {
                                if($row->id == $rows["reported_user_id"]) {
                                  $count++;
                                   }
                                 }echo "<span class='badge badge-danger'>".$count."</span>";
                               }
                     else{echo "no data";}
                                         ?></button> </td>
                <td><form  action="/users/{{$row->id}}" method="post">
                  @csrf
                  @method('delete')
                   <button type="submit" class="btn btn-danger">Freeze User</button> </form> </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <center>{{ $users->links() }}</center>
        </div>
      </div>
    </div>



    </body>
    
  </html>
