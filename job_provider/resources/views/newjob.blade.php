<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>


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
        <form method="post" action="/searchpage">
          <div class="form-group">
            <div class="row">
              <input type="email" class="form-control col-md-5 " id="exampleFormControlInput1" placeholder="Search jobseekers">
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

<div class="container">
<br>
<br>
<form method="POST" class="" action="{{action('NewjobsController@store')}}" enctype="multipart/form-data">
@csrf
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="company_name">Company Name</label>
    </div>
    <div class="col-md-10">
      <input class="form-control form-control-md" name="company_name" type="text" placeholder="company name">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="job_title">Job Title</label>
    </div>
    <div class="col-md-10">
      <input class="form-control form-control-md" name="job_title" type="text" placeholder="Job Title">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="location">Location</label>
    </div>
    <div class="col-md-10">
      <input class="form-control form-control-md" name="location" type="text" placeholder="location">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="Experience">Select Experience</label>
    </div>
    <div class="col-md-10">
      <select class="form-control" name="Experience">
        <option>Choose Experience in years</option>
        <option>Freshers</option>
        <option>1 Years</option>
        <option>2 Years</option>
        <option>3 Years</option>
        <option>4 Years</option>
        <option>5 Years</option>
        <option>6 Years</option>
        <option>7 Years</option>
        <option>8 Years</option>
        <option>9 Years</option>
        <option>10+ Years</option>
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="company_size">Size of Company</label>
    </div>
    <div class="col-md-10">
      <select class="form-control" name="company_size">
        <option>Choose Size</option>
        <option>1-49</option>
        <option>50-149</option>
        <option>150-249</option>
        <option>250-499</option>
        <option>500-999</option>
        <option>1000+</option>
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="hear">Where did You heard about us?</label>
    </div>
    <div class="col-md-10">
      <input class="form-control form-control-md mt-2" name="hear" type="text" placeholder="Where did you heard about us?">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="stream">Stream</label>
    </div>
    <div class="col-md-10">
      <select class="form-control" name="stream">
        <option>Select Stream</option>
        <option>Marketing</option>
        <option>Management</option>
        <option>IT</option>
        <option>BPO</option>
        <option>Sales</option>
        <option>Social Marketing</option>
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="salary_offer">Salary</label>
    </div>
    <div class="col-md-10">
      <select class="form-control" name="salary_offer">
        <option>Select Salary</option>
        <option>₹1.5LPA to ₹3LPA</option>
        <option>₹3LPA to 5LPA</option>
        <option>₹5LPA to ₹10LPA</option>
        <option>₹10LPA to ₹15LPA</option>
        <option>₹15LPA to ₹30LPA</option>
        <option>₹40LPA+</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="job_desc">Description about the work</label>
    </div>
    <div class="col-md-10">
      <textarea class="form-control form-control-md mt-2" name="job_desc" type="text" placeholder="Where did you heard about us?"></textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
      <label class="mt-1"for="hear">Company Logo</label>
    </div>
    <div class="col-md-10">
      <input class="form-control form-control-md mt-2" name="com_logo" type="file" placeholder="">
    </div>
  </div>

    <center><input type="submit" class="btn btn-success" value="Post Job" style="box-shadow:0 10px 10px 0 #888888; "></center>

</form>
<br>
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
