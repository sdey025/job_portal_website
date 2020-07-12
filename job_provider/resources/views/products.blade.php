<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>-->
    <style>
    #ra{
      background-image: url('http://localhost/jobfinder.com/job_provider/resources/views/images/new.jpg');
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
            <li class="nav-item ">
              <a class="nav-link" href="/welcome">Home
                    <span class="sr-only">(current)</span>
                  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item active">
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
              <input type="text" class="form-control col-md-5 " name="jobseeker"  placeholder="Search jobseekers">
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
          <a class="nav-link dropdown-toggle text-light px-md-5 animate slideIn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >

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
    <div class="row" id="ra">
      <div class="col-md-6">
        <h4 class="float-right mr-4">Hiring Online — <br>Products for Employers</h4>
      </div>
      <div class="col-md-6">

      </div>
    </div>
    <br>

    <div class="container">
      <div class="row">
        <center><h5 class="text-secondary">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHow Indeed helps you hire</h5></center>
        <center><p class="text-secondary" style="font-size:15px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJobFinder helps you connect with talent, on desktop and mobile, so you can make more<br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspquality hires faster.</p></center>

      <div class="col-md-6">

              <br>
              <h3 class="text-danger ml-4 pl-4">Post Jobs</h3>
              <p class="ml-4 pl-4" style="font-size:25px;">Get started for free</p>
              <p class="ml-4 mb-3 pl-4" style="font-size:20px;">Anyone can <a href="/welcome">post jobs for free</a>. Hiring online is<br> simple when you post jobs directly on JobFinder or<br> through your company career site or ATS.</p>
              <br>
              <p class="ml-4 pl-4" style="font-size:25px;">Invest to find the right fit faster</p>
              <p class="ml-4 mb-3 pl-4" style="font-size:20px;">To attract more candidates, pay to <a href="/welcome"> sponsor your job.</a><br> Sponsored Jobs appear for longer than non-<br>sponsored jobs, and they are 3.5X more likely to<br> result in a hire.</p>
              <p class="ml-4 pl-4" style="font-size:20px;"><a href="#">Learn more about Sponsored Jobs.</a></p>
        </div>
        <div class="col-md-6"><br><br>
          <img src="http://localhost/jobfinder.com/job_provider/resources/views/images/image.jpg" class="mr-4" style="width:700px; height:400px;" alt="">
        </div>
    </div>
    </div>
<hr>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <img src="http://localhost/jobfinder.com/job_provider/resources/views/images/resume.jpg" class="ml-4" style="width:400px; height:600px;" alt="">
        </div>
        <div class="col-md-6"><br><br><br><br><br>
          <h3 class="text-danger">JobFinder Resume</h3>
          <p>Search over 150 million <a href="https://novoresume.com/resume-templates">resumes</a>, across your<br> industry. Target your search by industry, education,<br> title, location and more and start a conversation<br> with your next great hire.</p>
          <br>
          <p><a href="#">Learn more about hiring with Indeed Resume.</a></p>
        </div>
      </div>
    </div>
<hr>
    <div class="container">
      <div class="row">
        <div class="col-md-6"><br><br>
          <h3 class="text-danger ml-4 pl-4">JobFinder Assessments</h3>
          <p class="ml-4 pl-4">Recruiting services powered by JobFinder. Save time<br> and extend your team with an Indeed hiring<br> specialist leveraging cutting-edge technology to<br> deliver high quality hires at a competitive pay-per-<br>hire price.</p>
          <p class="ml-4 pl-4"> <a href="#">Learn more about Indeed Hire.</a> </p>
        </div>
        <div class="col-md-6">
          <img src="http://localhost/jobfinder.com/job_provider/resources/views/images/products.png" class="mr-4" style="width:600px; height:400px;" alt="">
        </div>
      </div>
    </div>
<hr>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="http://localhost/jobfinder.com/job_provider/resources/views/images/hire.png" class="ml-4" style="width:450px; height:550px;" alt="">
        </div>
        <div class="col-md-6"><br><br><br><br>
          <h3 class="text-danger ">JobFinder Hiring Events</h3>
          <p class="">Instead of sifting through resumes, save time and<br> money by interviewing candidates face-to-face.<br> Post your event on Indeed and Hiring Events will<br> deliver candidates to your door, so you can focus<br> on hiring.</p>
          <p class=""> <a href="#">Learn more about JobFinder Hiring Events.</a> </p>
        </div>
      </div>
    </div>
<br>
  <div style="background-color: #F5F6F7;">
    <div class="container" ><br>
      <div class="row" >
        <div class="col-md-6 border border-right-4 border-left-0 border-top-0 border-danger border-bottom-0">
          <center><p>Ready to post a job today? Get started in 5<br> minutes.</p></center>
          <center><a href="/newjob"><button type="button" name="button" style="width:250px;" class="btn btn-outline-primary">Post a Job</button></a></center>
        </div>
        <div class="col-md-6 border border-left-4 border-bottom-0 border-danger border-top-0 border-right-0">
            <center><p>See how Indeed can work best for your<br> business.</p></center>
            <center><button type="button" name="button" style="width:250px;" class="btn btn-outline-warning">Contact us</button></center>
        </div>
      </div>
    </div>
    <br>
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
