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
    #outer-div{
      background-color: #EBC5FF;
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
              <a class="nav-link" href="/products">Contact</a>
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
                         <a href="{{ url('/home') }}" class="dropdown-item text-dark "><center>Search Jobseekers</center></a>
                         <a href="{{ url('/home') }}" class="dropdown-item text-dark "><center>Add Company Logo</center></a>


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





@foreach($data as $user)
<div class="row" id="outer-div" style="box-shadow:0 5px 3px 0;">
  <div class="col-sm-6 border border-right border-secondary">
    <br><br>
    <div class="row">
      &nbsp&nbsp&nbsp&nbsp
    <img src="http://localhost/jobfinder.com/User/public/public/storage/{{ $user->avatar }}" class="ml-4" style="width:200px; height:220px;" alt="">
&nbsp&nbsp&nbsp&nbsp
    <div>
    <p style="font-family: 'Futura PT'; font-size:28px;">{{$user->name}}, {{$user->gender}}<br><small>From: {{$user->address}}</small><br>DOB: {{$user->dob}}</p>
    <p style="font-family: 'Futura PT'; font-size:28px;">is currently {{$user->curr_job_post}}<br> at {{$user->curr_job_com}}</p>
  </div>
  </div>
    <br><br>
  </div>

  <div class="col-sm-6 border border-left border-secondary">
    <br>
    <center> <a href="/message/{{$user->id}}"><i class="fas fa-mail-bulk fa-lg text-dark"></i></a></center>
    <center><small>send Message</small></center>
    <br>
    <center><span class="badge badge-warning">Personal Information</span></center>
    <br>
    <div class="row">
    <div class="col-md-6">
      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fas fa-phone"></i> &nbsp&nbsp&nbsp<b>{{$user->phone}}</b></p>
    </div>
    <div class="col-md-6">
      <p><i class="fas fa-at"></i>&nbsp&nbsp<b> {{$user->email}}</b></p>
    </div>
  </div>
  <center> <span class="badge badge-success">Academic Brief</span></center>
  <center> <p>Done <b>B.tech</b> <br>in <b>{{$user->ug_branch}}</b> <br>from <b>{{$user->ug_inst}}</b></p> </center>
  <center> <p>Skills have: <b>{{$user->skill}}</b></p> </center>

  </div>
</div>


<br>

<div class="row">
  <div class="col-md-5">
  </div>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

  <button type="button" class="btn btn-primary float-center" data-toggle="modal" data-target="#exampleModal">
    View Bio
  </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark text-light">
        {{$user->bio}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>

<br>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <center><h4 class="">Latest Project</h></center>
    <center> <p>Project was on {{$user->project_name}}</p></center>
    <center><p class="lead">{{$user->project_desc}}</p><center>
    <center><small> Number of Members: {{$user->number_of_group_mem}}</small></center>
  </div>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <center><h4 class="">Final Year Project</h></center>
    <center> <p>Project name was {{$user->final_yr_proj_name}}</p></center>
    <center><p class="lead">{{$user->final_yr_proj_desc}}</p><center>
    <center><small> Number of Members: {{$user->number_of_group_mem}}</small></center>
  </div>
</div>

<center><span class="badge badge-info">Academic Details</span></center>
<br>
<div class="row text-center">
&nbsp&nbsp&nbsp&nbsp&nbsp
  <div class="card" style="width: 18rem;">
    <div class="card-header">
      Secondary Education
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item p-4">From: {{$user->sc_inst}}</li>
      <li class="list-group-item p-4">{{$user->sc_board}} Board</li>
      <li class="list-group-item">Obtained {{$user->sc_marks}}</li>
    </ul>
  </div>
  &nbsp&nbsp&nbsp
  <div class="card" style="width: 18rem;">
  <div class="card-header">
    Higher Secondary Education
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item p-4">From: {{$user->hsc_inst}}</li>
    <li class="list-group-item p-4">{{$user->hsc_board}} Board</li>

    <li class="list-group-item">Obtained {{$user->hsc_marks}}</li>
  </ul>
</div>
&nbsp&nbsp&nbsp
<div class="card" style="width: 18rem;">
  <div class="card-header">
    Graduation Details
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">From: {{$user->ug_inst}}</li>
    <li class="list-group-item">University: {{$user->ug_board}}</li>
    <li class="list-group-item">Branch: {{$user->ug_branch}}</li>
    <li class="list-group-item">Aggregate:{{$user->ug_marks}} </li>
  </ul>
</div>
&nbsp&nbsp&nbsp
<div class="card" style="width: 18rem;">
  <div class="card-header">
    Post Graduation Details
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">From: {{$user->pg_inst}}</li>
    <li class="list-group-item">University: {{$user->pg_board}}</li>
    <li class="list-group-item">Branch: {{$user->pg_branch}}</li>
    <li class="list-group-item">Aggregate: {{$user->pg_marks}}</li>
  </ul>
</div>

</div>


<br>

<div class="alert alert-warning" role="alert">
<center>
 Joined at: {{$user->created_at}}
</center>
</div>
@endforeach



<br>

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
