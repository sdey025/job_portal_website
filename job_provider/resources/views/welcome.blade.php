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
                <a href="/message/{{Auth::user()->id}}" class="nav-link"><i class="far fa-comment-alt text-light"></i></a>
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
          <div class="dropdown-menu "  aria-labelledby="navbarDropdown">
            <div class="flex-center position-ref full-height">
              @if (Route::has('login'))
                  <div class="top-right links">
                      @auth
                         <a href="/employer" class="dropdown-item text-dark "><center>{{ Auth::user()->name }}</center></a>
                         <a href="/postedjobs" class="dropdown-item text-dark "><center>Jobs Posted</center></a>
                         <a href="/candidates_who_applied" class="dropdown-item text-dark "><center>See who applied<br> for Job</center></a>
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
    <br>

@yield('content')
  <div class="container">
    <form method="post" action="/candidates">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlSelect1">Select the stream for which you want candidate</label>
        <div class="row">
        <select class="form-control col-md-11" name="candidate" id="exampleFormControlSelect1">
          <option>Marketing</option>
          <option>Management</option>
          <option>IT</option>
          <option>BPO</option>
          <option>Sales</option>
          <option>Social Marketing</option>
        </select>
        &nbsp
        <input type="submit" value="Search" class="btn btn-outline-primary btn-sm">
      </div>
      </div>
    </form>

    <h1 style="font-size:100px"><center>Let's make your<br><h1 style="font-size:95px">next great hire!<br> </h1><h1 style="font-size:90px"><i>Fast!</i></h1></center></h1>
    <br><br>
    <h5 style="font-size:35px; font-family: 'times new roman'"><b><center>You know who you're looking for.<br>We'll help you find them.</center></b></h5>
    <br>
    <center><a href="/newjob" class="btn btn-primary btn-lg" id="btn">Post a Job</a></center>
    <br>
    <hr>
    <br>
    <div class="row">
      <div class="card border border-secondary" style="width: 16rem;">
        <div class="card-body">
          <h2 class="card-title text-primary"><b>1</b></h2>
          <h3 class="card-subtitle mb-2 text-dark">Create your free account</h3>
          <p class="card-text">All you need is your email address to create an account and start building your job post.</p>
        </div>
      </div>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <div class="card border border-secondary" style="width: 16rem;">
        <div class="card-body ">
          <h2 class="card-title text-primary"><b>2</b></h2>
          <h3 class="card-subtitle mb-2 text-dark">Build yourjob post</h3>
          <p class="card-text">Then just add a title, description, and location to your job post, and you're ready to go.</p>
        </div>
      </div>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <div class="card border border-secondary" style="width: 16rem;">
        <div class="card-body ">
          <h2 class="card-title text-primary"><b>3</b></h2>
          <h3 class="card-subtitle mb-2 text-dark">Post your job</h3>
          <p class="card-text">After you post your job use our state of the art tools to help you find dream talent.</p>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <h1 class="mr-auto"><b>Save time and effort in your <br>hiring journey.</b></h1>
    <br>
    <br>

    <h4 class="mr-auto">Finding the best fit for the job shouldn’t be a full-time job. <br>Indeed’s simple and powerful tools let you source, <br>screen, and hire faster.</h4>

  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-10" id="blue">
      <br>
      <br>
      &nbsp&nbsp&nbsp&nbsp&nbsp
      <div class="col-md-9 ">
        <div class="row">
          <i class="fas fa-eye fa-6x ml-4 text-light"></i>
          &nbsp&nbsp&nbsp
          <h2 class="text-light">Get <br>more <br>visibility</h2>

        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <i class="fas fa-medal fa-6x text-light mt-2"></i>
          &nbsp&nbsp&nbsp
          <h2 class="text-light">Find <br>quality <br>applicants</h2>

        </div>
        <div class="row">

        <p class="mr-5 text-light">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSponsor your job to <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspensure it gets seen by <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspthe right people.</p>
        <p class="text-light">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspList your required skills <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspfor the job so relevant <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspcandidates apply.
        </div>
        <br>
        <br>
        <div class="row">
          &nbsp&nbsp&nbsp
          <i class="fas fa-search-plus fa-6x ml-4 text-light"></i>
          &nbsp&nbsp&nbsp
          <h2 class="text-light">Verify <br>their <br>abilities</h2>

        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <i class="fas fa-columns fa-6x text-light mt-2"></i>
          &nbsp&nbsp&nbsp
          <h2 class="text-light">Organize <br>your <br>candidates</h2>

        </div>
        <div class="row">
          <p class="mr-5 text-light">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAdd screener questions <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspand assessments to <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsptest applicants’ skills.</p>
          <p class="text-light">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspView and sort resumes, <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspsend messages, and <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspschedule interviews—<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspall on JobFinder.
      </div>
    </div>
    <br><br>
    <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-2">
        <button href="/newjob" class="btn btn-light btn-lg text-primary mt-3" id="button2"><b>Get Started</b></button>
    </div>

    <div class="col-md-8">
      <p class="text-light" style="font-size:25px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspYou control your posts 24/7—edit, add, pause, or <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspclose them whenever you want. Learn more about <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspposting.</p>
    </div>
  </div>
  <br>
  <br>
  <br>
  </div>
</div>
<br>
<br>
<br>
<div class="row">
  <div class="col-md-2">

  </div>

  <div class="col-md-10">
    <h1><b>You're in good company.</b></h1>
    <br>
    <p style="font-size:30px">Over 3,000,000 companies use JonFinder to hire. See why <br>these amazing companies use us as their platform to <br>hire dream talent.</p>
  </div>
</div>

<br>
<br>
<div class="container">
  <div class="row">
    <div class="card border border-secondary" style="width: 16rem; border-style:5px">
      <img class="card-img-top" style="width:317px; height:350px;" src="http://localhost/jobfinder.com/job_provider/resources/views/images/mcdonalds.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">JobFinder helps the world’s largest family restaurant business to recruit high quality candidates for its hard-to-fill positions.</p>
      </div>
    </div>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <div class="card border border-secondary" style="width: 16rem;">
      <img class="card-img-top" style="width:317px; height:350px;" src="http://localhost/jobfinder.com/job_provider/resources/views/images/oxford.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">The second oldest university in the world uses JobFinder to draw targeted jobseeker traffic to fill both niche academic positions and corporate support roles.</p>
      </div>
    </div>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <div class="card border border-secondary" style="width: 16rem;">
      <img class="card-img-top" style="width:317px; height:350px;" src="http://localhost/jobfinder.com/job_provider/resources/views/images/apple.png" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">The world leader in mobile communications uses JobFinder Sponsored Jobs to lower its cost per applicant and cost per hire.</p>
      </div>
    </div>
  </div>
</div>
<br>
<br><br>
<div class="row">
  <div class="col-md-6" style="background-color: #F6F6F6;">
    <br><br><br>
    <div class="row">
    <div class="col-md-5">

    </div>
    <div class="col-md-7">

    <i class="fas fa-quote-left fa-3x"></i>
    <br><br><br>
    <h4>I've used other websites <br>in the past for hiring; <br>nothing has ever been <br>this easy, this simple, <br>and this effective."</h4>
    <br>
    <br>
    <br>
    <center><p style="font-size:30px">-Darrel</p></center>
  </div>
  </div>
  </div>

  <div class="col-md-6" style="background-color: #F6F6F6;">
    <img src="http://localhost/jobfinder.com/job_provider/resources/views/images/custmer.jpg" style="width:750px; height:650px"alt="">
  </div>
</div>
<div class="row" style="background-color: #085FF7">

<div class="col-md-12">
<br><br><br><br><br><br><br>
<center><h1 class="text-light">Get started in minutes!</h1></center>
<br>
<center><button class="btn btn-light btn-lg text-primary" href="/newjob" style="border-radius:24px"><b>Start Posting</b></button></center>
<br><br><br><br><br><br><br><br><br>
</div>

</div>



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
