<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job finder</title>
          <script src="https://kit.fontawesome.com/3ca8a7bfff.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>


            html, body {

                background-color: #000000;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height text-light">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
              <center>  <img class="bg-img" src="http://localhost/jobfinder.com/User/resources/views/imagesss/2020.png" style="width:500px; height:350px;" alt=""> </center>
                <div class="title m-b-md">
                    Welcome To Admin Panel !!
                </div>

                <div class="links">

                    <a href="/users"><i class="far fa-user text-light"></i>See Users</a>
                    <a href="/job_pro"><i class="fas fa-user-tie"></i>See Job Providers</a>
                    <a href="/companies"><i class="far fa-building"></i>See Companies</a>
                    <a href="/ptjobs"><i class="fas fa-business-time"></i>See Partime jobs</a>
                    <a href="/ftjobs"><i class="fas fa-briefcase"></i>See Fulltime Jobs</a>
                    <a href="/freelance"><i class="fas fa-bullhorn"></i>See FreeLancing Jobs</a>
                    <a href="/addquesofquiz"><i class="far fa-newspaper"></i>More Options</a>
                </div>
            </div>
        </div>
    </body>
</html>
