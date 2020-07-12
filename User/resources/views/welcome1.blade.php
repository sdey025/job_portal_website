<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job Finder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>

#flip-card {
  background-color: transparent;
  perspective: 1000px;
}

/* This container is needed to position the front and back side */
#flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;

}

/* Do an horizontal flip when you move the mouse over the flip box container */
#flip-card:hover #flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
#flip-card-front, #flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;

  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */

.flip-card-front {
  background-color: #bbb;
  color: black;
}
/* Style the back side */
#flip-card-back {

  color: white;
  transform: rotateY(180deg);
}

#img {
  opacity: 0.4;

}
        </style>

    </head>
    <body >
        <!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="/welcome1"><img src="http://localhost/jobfinder.com/User/resources/views/imagesss/2020.png" style="width:75px; height:60px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
&nbsp&nbsp&nbsp&nbsp&nbsp
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/welcome1">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/jobs">Jobs</a>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="/contact">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="companies">Companies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://resumegenius.com/resume-samples">Resumes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/newfeeds">Feeds</a>
      </li>
    </ul>
    @if (Route::has('login'))
    <a class="nav-link mb-1" href="/message_from_job_provider/Auth::user()->name">  <button type="submit" class="btn btn-dark">Messages(job providers)</button></a>
    @else
    @endif
      <ul class="nav-item dropdown px-md-3 no-arrow" role="presentation">
        <a class="nav-link dropdown-toggle text-light px-md-5 animate slideIn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >

            <i class="fa fa-user fa-sm text-light flex-top"></i>
        </a>
        <div class="dropdown-menu no-arrow" role="menu" aria-labelledby="navbarDropdown">
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
<!--/.Navbar -->
<br>




<section class="search-sec">
    <div class="container">

            <div class="row">
                <div class="col-lg-12">
                  <form action="/searchviawel" method="get" novalidate="novalidate">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" id="search_input" class="form-control " placeholder="Enter City"/>
                        </div>
                        &nbsp
                        <div class="col-sm-4 ">
                            <input type="text" class="form-control search-slt" name="skill" placeholder="Keyword, Job Title or Skill">
                        </div>
                        &nbsp
                        <div class="col-sm-3 ">
                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                <option>Marketing</option>
                                <option>Management</option>
                                <option>IT</option>
                                <option>BPO</option>
                                <option>Sales</option>
                                <option>Social Marketing</option>

                            </select>
                        </div>
                        &nbsp &nbsp
                        <div class="col-sm-1 ">
                            <input type="submit" value="Search" class="btn btn-danger wrn-btn">
                        </div>
                    </div>
                        </form>
                </div>
            </div>

    </div>
</section>
<br>
<hr>
<br>
  <div class="container" >
    @if($message = Session::get('success7'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">x</button>
          <strong> {{$message}} </strong>
    </div>
    @endif
  <div class="row" >
    <div class="card text-white border-white" style="width: 15rem; height: 14rem" id="flip-card">
      <div class="card-body col-sm-12" id="flip-card-inner">
      <div id="flip-card-front">
      <img src="http://localhost/jobfinder.com/User/resources/views/imagesss/snakedev-dribbble.png" alt="" style="width: 14rem ">
      </div>
        <div id="flip-card-back" class="card-body col-sm-12 border border-dark ">
          <h5 class="card-title text-dark">Jobs for Developer</h5>
          <p class="card-text text-dark mb-1" style="font-size:15px;">Researching, designing, implementing and managing software programs.<br>Testing and evaluating new programs.<br>Writing and implementing efficient code.</p>
            <form action="/searchviawel" method="get"><button type="submit" class="btn btn-success btn-sm mb-1"><input type="hidden" name="stream" value="it">Search for IT jobs</button></form>
        </div>
      </div>
    </div>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<div class="card text-white border-white" style="width: 15rem;  height: 14rem" id="flip-card">
      <div class="card-body col-sm-12" id="flip-card-inner">
      <div id="flip-card-front" >
      <img src="http://localhost/jobfinder.com/User/resources/views/imagesss/download.png" alt="" style="width: 14rem ">
      </div>
      <div id="flip-card-back" class="card-body col-sm-12 border border-primary ">
         <h5 class="card-title text-dark">Jobs for Marketing</h5>
         <p class="card-text text-dark" style="font-size:15px;">Brainstorming and developing ideas for creative marketing campaigns. Assisting in outbound or inbound marketing activities by demonstrating expertise in various areas </p>
         <form class="" action="/searchviawel" method="get"><button class="btn btn-warning btn-sm" type="submit"><input type="hidden" name="stream" value="marketing">Marketing Jobs</button></form>
      </div>
    </div>
  </div>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <div class="card text-white border-white" style="width: 15rem;  height: 14rem" id="flip-card">
      <div class="card-body col-sm-12" id="flip-card-inner">
      <div id="flip-card-front">
      <img src="http://localhost/jobfinder.com/User/resources/views/imagesss/28489273.jpg" alt="" style="width: 14rem ">
      </div>
      <div id="flip-card-back" class="card-body col-sm-12 border border-danger ">
         <h5 class="card-title text-dark">Jobs for Social Marketing</h5>
         <p class="card-text text-dark" style="font-size:15px;">This Social Media Specialist job description template is customizable and ready to post to job boards. Use this Social Media Specialist job description template to save time.</p>
         <form class="" action="/searchviawel" method="get"> <button type="submit" class="btn btn-primary btn-sm"><input type="hidden" name="stream" value="social marketing" >Social Marketing Jobs </button>  </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  <br>

  <div class="container" >
  <div class="row" >
    <div class="card text-white border-white" style="width: 15rem; height: 14rem" id="flip-card">
      <div class="card-body col-sm-12" id="flip-card-inner">
      <div id="flip-card-front">
      <img src="http://localhost/jobfinder.com/User/resources/views/imagesss/7437714.jpg" alt="" style="width: 14rem; height: 12rem">
      </div>
        <div id="flip-card-back" class="card-body col-sm-12 border border-dark ">
          <h5 class="card-title text-dark mb-2" >Jobs for Management</h5>
          <p class="card-text text-dark" style="font-size:15px;">plan daily schedule of employees and the business, interview, hire, coordinate employees, maintain budgets, coordinate with report to senior management.</p>
          <form class="" action="/searchviawel" method="get"> <button type="submit" class="btn btn-danger btn-sm"><input type="hidden" name="stream" value="management">Management Jobs </button>  </form>
        </div>
      </div>
    </div>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<div class="card text-white border-white" style="width: 15rem;  height: 14rem" id="flip-card">
      <div class="card-body col-sm-12" id="flip-card-inner">
      <div id="flip-card-front" >
      <img src="http://localhost/jobfinder.com/User/resources/views/imagesss/6a00d8354c0d2669e201901e3c599a970b.jpg" alt="" style="width: 14rem ">
      </div>
      <div id="flip-card-back" class="card-body col-sm-12 border border-primary ">
         <h5 class="card-title text-dark">Jobs for Sales</h5>
         <p class="card-text text-dark" style="font-size:15px;">Meeting or exceeding sales goals.Negotiating all contracts with prospective clients.Helping determine pricing schedules for quotes, promotions and monthly reports.</p>
         <form class="" action="/searchviawel" method="get"> <button type="submit" class="btn btn-dark btn-sm"><input type="hidden" name="stream" value="sales">Sales Jobs </button>  </form>
      </div>
    </div>
  </div>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <div class="card text-white border-white" style="width: 15rem;  height: 14rem" id="flip-card">
      <div class="card-body col-sm-12" id="flip-card-inner">
      <div id="flip-card-front">
      <img src="http://localhost/jobfinder.com/User/resources/views/imagesss/20180521090545000000.jpg" alt="" style="width: 14rem ">
      </div>
      <div id="flip-card-back" class="card-body col-sm-12 border border-danger ">
         <h5 class="card-title text-dark">Jobs for BPO</h5>
         <p class="card-text text-dark" style="font-size:15px;">Monitor many tasks and the work in the back office which includes helping customers or purchasing or if the customer wishes to create an account for any product and much more.</p>
         <form class="" action="/searchviawel" method="get"> <button type="submit" class="btn btn-secondary btn-sm"><input type="hidden" name="stream" value="bpo">BPO Jobs </button>  </form>
      </div>
    </div>
  </div>
  </div>
  </div>
<br><br>
<center><button class="btn btn-info btn-lg" href="#" >See More</button></center>
<hr>
<br>

<div class="container">

<section class="text-center my-5">


  <h2 class="h1-responsive font-weight-bold my-5">Testimonials</h2>

  <div class="wrapper-carousel-fix">
    <!-- Carousel Wrapper -->
    <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel"
      data-interval="false">
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto mb-4">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" class="rounded-circle img-fluid"
                alt="First sample avatar image">
            </div>
            <!--Content-->
            <p>
              <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
              eos
              id officiis hic tenetur quae quaerat ad velit ab. Lorem ipsum dolor sit amet, consectetur
              adipisicing elit. Dolore cum accusamus eveniet molestias voluptatum inventore laboriosam labore
              sit, aspernatur praesentium iste impedit quidem dolor veniam.
            </p>
            <h4 class="font-weight-bold">Anna Deynah</h4>
            <h6 class="font-weight-bold my-3">Founder at ET Company</h6>
            <!--Review-->
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star-half-o text-primary"> </i>
          </div>
        </div>
        <!--First slide-->
        <!--Second slide-->
        <div class="carousel-item">
          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto mb-4">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" class="rounded-circle img-fluid"
                alt="Second sample avatar image">
            </div>
            <!--Content-->
            <p>
              <i class="fa fa-quote-left"></i> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
              odit
              aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
              porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
              non numquam eius modi tempora incidunt ut labore. </p>
            <h4 class="font-weight-bold">Maria Kate</h4>
            <h6 class="font-weight-bold my-3">Photographer at Studio LA</h6>
            <!--Review-->
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star-o text-primary"> </i>
          </div>
        </div>
        <!--Second slide-->
        <!--Third slide-->
        <div class="carousel-item">
          <div class="testimonial">
            <!--Avatar-->
            <div class="avatar mx-auto mb-4">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="rounded-circle img-fluid"
                alt="Third sample avatar image">
            </div>
            <!--Content-->
            <p>
              <i class="fa fa-quote-left"></i> Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
              error sit voluptatem accusantium doloremque laudantium.</p>
            <h4 class="font-weight-bold">John Doe</h4>
            <h6 class="font-weight-bold my-3">Front-end Developer in NY</h6>
            <!--Review-->
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
            <i class="fa fa-star text-primary"> </i>
          </div>
        </div>
        <!--Third slide-->
      </div>
      <!--Slides-->
      <!--Controls-->
      <a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button"
        data-slide="prev">
        <span class="icon-prev text-dark" ></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button"
        data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--Controls-->
    </div>
    <!-- Carousel Wrapper -->
  </div>

</section>
<!-- Section: Testimonials v.2 -->

</div>
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
  <a href="/welcome"> jobfinder.com</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAbY22OBD-fuEuDzy5TFPOehTZCUvS3D3U"></script>
<script>
var searchInput = 'search_input';
$(document).ready(function(){
  var autocomplete;
  autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
     types: ['geocode'],
   });
  google.maps.event.addListener(autocomplete,'place_changed', function(){
    var near_place = autocomplete.getPlace();
  });
});

</script>

    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script>

//setCarouselHeight('#carousel-example');

//function setCarouselHeight(id)
//{
//  var slideHeight = [];
//  $(id+' .item').each(function()
//  {
  //    // add all slide heights to an array
    //  slideHeight.push($(this).height());
  //});

  // find the tallest item
  //max = Math.max.apply(null, slideHeight);

  // set the slide's height
  //$(id+' .carousel-content').each(function()
  //{
    //  $(this).css('height',max+'px');
  //});
//}

</script>
</html>
