<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>

    #btn{
      border-radius: 20px;
    }
    #blue{
      background-color: #085FF7;
    }
    #button2{
      border-radius: 24px;
    }

    </style>

    <script src="https://kit.fontawesome.com/3ca8a7bfff.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Job Finder (for Recuiters)</title>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">

        <a class="navbar-brand" href="#">
              <img src="http://localhost/jobfinder.com/job_provider/resources/views/images/2020.png" style="width:75px; height:60px;" alt="">
            </a>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/welcome">Home
                    <span class="sr-only">(current)</span>
                  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/products">Products</a>
            </li>
          </ul>
        </div>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

      <div class="col-md-5 mt-2">
        <form method="post" action="/searchpage1">
          @csrf
          <div class="form-group">
            <div class="row">
              <input type="text" class="form-control col-md-5" name="jobseeker" placeholder="Search jobseekers">
            &nbsp  <input type="submit" value="Search"class="btn btn-outline-warning">
            </div>
          </div>
        </form>

        </div>
          @if(Auth::guest())
          @else
          <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ">
              <li class="nav-item">
                <a href="/message" class="nav-link"><i class="far fa-comment-alt text-light"></i></a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-quote-right text-light "></i></a>
              </li>
            </ul>
          </div>

          <div>
          </div>
          @endif
        <ul class="nav-item dropdown px-md-1 mr-4">
          <a class="nav-link dropdown-toggle text-light px-md-5 animate slideIn mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >

              <i class="fas fa-user fa-sm text-light flex-top"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="flex-center position-ref full-height">
              @if (Route::has('login'))
                  <div class="top-right links">
                      @auth
                         <a href="/employer" class="dropdown-item text-dark "><center>{{ Auth::user()->name }}</center></a>
                         <a href="/postedjobs" class="dropdown-item text-dark "><center>Jobs Posted</center></a>
                         <a href="/candidates_who_applied" class="dropdown-item text-dark "><center>See who applied for Job</center></a>
                         <a href="{{ url('/home') }}" class="dropdown-item text-dark "><center>Add </center></a>


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
    </nav>
    <br>

<center><span class="badge badge-info">People who shown intrest in your posted job</span></center>
<br>


    <table class="table table-striped table-dark text-center">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Name</th>

          <th scope="col"></th>
          <th scope="col">For Company</th>
          <th scope="col">Resume</th>
          <th scope="col">Salary offered by you</th>
          <th scope="col">Job Description</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $row)
        @if(Auth::user()->id == $row->apply_id)
        <tr>
          <td scope="row"><img src="http://localhost/jobfinder.com/User/public/public/storage/{{ $row->avatar }}" style="width:60px; height:65px;"></td>
          <td>{{$row->name}}({{$row->gender}})<br><small>From: {{$row->address}}</small></td>

          <td><img src="http://localhost/jobfinder.com/job_provider/public/upload/employee/{{$row->com_logo}}" style="width:120px; height:75px;"></td>
          <td>{{$row->company_name}}</td>
          <td><object data="http://localhost/jobfinder.com/User/public/upload/cv/{{$row->resume}}" id="resume" style="width:20px; height:5px;"></object> <br><a href="http://localhost/jobfinder.com/User/public/upload/cv/{{$row->resume}}"><input type="submit" value="Download" class="btn btn-outline-primary btn-sm"></a> </td>
          <td>{{$row->salary_offer}}</td>
          <td>{{$row->job_desc}}</td>
          <td>  <!--<a href="/profile/{{$row->id}}" class="text-light">-->
            <form method="get" action="/profile/{{$row->id}}">

                <input type="submit" name="view" class="btn btn-outline-success"value="View Profile"> </form></td>
        </tr>
        @else
        @endif
        @endforeach
      </tbody>
    </table>















              <footer class="page-footer font-small text-light bg-dark">

                <div style="background-color: #6351ce;">
                  <div class="container">

                    <!-- Grid row-->
                    <div class="row py-4 d-flex align-items-center">

                      <!-- Grid column -->
                      <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0">Get connected with us on social networks!</h6>
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col-md-6 col-lg-7 text-center text-md-right">

                        <!-- Facebook -->
                        <a class="fb-ic">
                          <i class="fab fa-facebook-f white-text mr-4"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                          <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="gplus-ic">
                          <i class="fab fa-google-plus-g white-text mr-4"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic">
                          <i class="fab fa-linkedin-in white-text mr-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                          <i class="fab fa-instagram white-text"> </i>
                        </a>

                      </div>
                      <!-- Grid column -->

                    </div>
                    <!-- Grid row-->

                  </div>
                </div>

                <!-- Footer Links -->
                <div class="container text-center text-md-left mt-5">

                  <!-- Grid row -->
                  <div class="row mt-3">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                      <!-- Content -->
                      <h6 class="text-uppercase font-weight-bold">JobFinder</h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                      <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                        consectetur
                        adipisicing elit.</p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                      <!-- Links -->
                      <h6 class="text-uppercase font-weight-bold">Products</h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                      <p>
                        <a class="text-light" href="/www.jobfinder.com">Find Jobs</a>
                      </p>
                      <p>
                        <a class="text-light" href="#!">Marketing?</a>
                      </p>
                      <p>
                        <a class="text-light" href="#!">IT</a>
                      </p>
                      <p>
                        <a class="text-light" href="#!">Management</a>
                      </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                      <!-- Links -->
                      <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                      <p>
                        <a href="#!">Your Account</a>
                      </p>
                      <p>
                        <a href="#!">Become an Affiliate</a>
                      </p>
                      <p>
                        <a href="#!">Shipping Rates</a>
                      </p>
                      <p>
                        <a href="#!">Help</a>
                      </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                      <!-- Links -->
                      <h6 class="text-uppercase font-weight-bold">Contact</h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                      <p>
                        <i class="fas fa-home mr-3"></i> Durgapur, WestBengal 713212, INDIA</p>
                      <p>
                        <i class="fas fa-envelope mr-3"></i> jobfinder@info.com</p>
                      <p>
                        <i class="fas fa-phone mr-3"></i> +917872908234</p>
                      <p>
                        <i class="fas fa-print mr-3"></i> +917992436530</p>

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
                <!-- Footer Links -->

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© 2020 Copyright:
                  <a href="https://mdbootstrap.com/"> jobfinder.com</a>
                </div>
                <!-- Copyright -->

              </footer>
              <!-- Footer -->







                </body>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </html>
