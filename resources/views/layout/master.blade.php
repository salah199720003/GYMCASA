<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <title>gymster</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('laravel/public/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('laravel/public/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('laravel/public/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('laravel/public/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="{{asset('laravel/public/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
            .a1{border-top: 5px solid;
    border-right: 3px solid;
    box-shadow: -3px 8px 10px 0px rgba(0, 0, 0, 0.5);
    border-left: 3px solid;
}
.container1{
    background-color: #f0f0f0;
    margin-right: 3%;
    margin-left: 3%;
    display: grid;
    grid-template-columns:repeat(3,1fr);
    gap: 10px;
    background-color: var(--dark)
}
/* Your existing CSS */
.img-container {
    position: relative;
    overflow: hidden;
}

.img-container::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: var(--dark); 
    opacity: 0.8; 
}
/* CSS for the loading overlay */
.loading-overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  top: 0;
  left: 0;
  z-index: 9999;
}

.spinner {
  position: absolute;
  top: 50%;
  left: 50%;
  border: 4px solid rgba(255, 255, 255, 0.3);
  border-radius: 50%;
  border-top: 4px solid #ffffff;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% {
    transform: translate(-50%, -50%) rotate(0deg);
  }
  100% {
    transform: translate(-50%, -50%) rotate(360deg);
  }
}


.img-container img {
    width: 100%;
    height: 100vh;
    display: block;
}
.programcontainer{
    background-color: var(--dark); margin-right: 5%; margin-left: 10%; display: grid; grid-template-columns: repeat(4, 1fr);gap:20px;
    grid-auto-rows: minmax(100px, auto);

}
.videocontainer{
  order: 1;background-color: var(--dark); margin-right: 5%; margin-left: 10%; display: grid; grid-template-columns: 1fr 30%; gap: 20px;
}

.order3{
    order: 3
}
#linee{
    border: white 0.5px solid;

}
.extra{
    order:2
}
.order4{
    order: 4;
}
@media( max-width:600px){
.programcontainer{
    grid-template-columns:100%; 
}
.videocontainer{
    grid-template-columns:100%;
    padding: 0;
    max-width: 100%;
    grid-auto-flow: row;
}
.extra{
    grid-column:span 2;
    order:4
}
.order4{
    order: 3
}
.order3{
    order:2;
    max-width: 100vw;
}


.shownvideo{
    width: 80%
    
}
}

.background1 {
    height: 100vh;
    background-size: cover;
    background-image: url('laravel/public/img/south.jpg');
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-bottom: 40px;
}
.background2 {
    height: 100vh;
    background-size: cover;
    background-image: url('https://img1.wsimg.com/isteam/stock/601/:/cr=t:0%25,l:0%25,w:100%25,h:100%25/rs=w:1280');
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-bottom: 40px;
}

.background1::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(34, 36, 41, 0.6);
}

.content {
    position: relative;
    z-index: 1;
    color: white;
}
.aa:hover{
    color:orange
}
.aaa:hover{
    color:white
}
body{
    background-color: var(--dark)

}
.image-container3 {
  position: relative;
  display: inline-block;
  border-radius:7px;
}
.image-container3:hover{
    border-radius:0;
    transition: 0.5s;
}
.btnempty{
    border:0;
    background-color:var(--dark);
    color:white;
    padding:0;border-top:0;border-right:0;border-left:0;border-bottom:white 2px solid;border-radius:0

}
.btnempty2{
    border:0;
    background-color:var(--dark);
    color:white;
   

}
.img3 {
  display: block;
  width: 100%;
  height: auto;
}
.bc:focus {
        outline: none; /* Remove default focus outline */
        box-shadow: 0 0 0 rgba(0, 0, 0, 0); 
    }
.play-button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background-color:var(--primary);
  opacity: 0; /* Initially hidden */
  transition: opacity 0.3s ease;
}

.image-container3:hover  .play-button {
  opacity: 0.8; /* Show on hover */
 
}

.play-button::after {
  content: "\25BA"; /* Unicode for right-pointing triangle (play icon) */
  font-size: 36px;
  color: white;
  display: block;
  margin-left: 5px;
  text-align: center;
  line-height: 60px;
}
.pp{
    color: white
}
.cc:hover .pp{
    color: var(--primary)
}

    </style>
    @yield('header')
    <link href="laravel/public/css/mycss.css" rel="stylesheet">
</head>

@yield('main')

  <!-- Footer Start -->
  <div style="" id="target2" class="container-fluid bg-dark text-secondary px-5 mt-5">
        <div class="row gx-5">
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                        <div class="d-flex mb-2">
                            <i style="color: var(--primary) !important" class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">casablanca,ISGI</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i style="color: var(--primary) !important" class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">gymcasa@gmail.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i style="color: var(--primary) !important" class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">+555 555 555</p>
                        </div>
                        <div class="d-flex mt-4">
                         
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Quick Links</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="{{url('/')}}"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="{{route('reservation')}}"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>reservation</a>
                            <a class="text-secondary mb-2" href="{{route('video.index')}}"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Class Schedule</a>
                            <a class="text-secondary mb-2" href=""><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Our Trainers</a>
                            <a class="text-secondary mb-2" href="#"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                            <a class="text-secondary" href="#"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Popular Links</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="{{url('/')}}"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="{{route('reservation')}}"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>reservation</a>
                            <a class="text-secondary mb-2" href="{{route('video.index')}}"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Class Schedule</a>
                            <a class="text-secondary mb-2" href=""><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Our Trainers</a>
                            <a class="text-secondary mb-2" href="#"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                            <a class="text-secondary" href="#"><i style="color: var(--primary) !important" class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-5" style="background-color: var(--primary) !important">
                    <h4 class="text-uppercase text-white mb-4">Newsletter</h4>
                    <h6 class="text-uppercase text-white">Subscribe Our Newsletter</h6>
                    <p class="text-light">Amet justo diam dolor rebum lorem sit stet sea justo kasd</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                            <button class="btn btn-dark">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 py-lg-0 px-5" style="background: #111111;">
        <div class="row gx-5">
            <div class="col-lg-8">
                <div class="py-lg-4 text-center">
                    <p class="text-secondary mb-0">&copy; <a class="text-light fw-bold" href="#">sabor.free.nf</a>. All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="py-lg-4 text-center credit">
                    <p class="text-light mb-0"> <a class="text-light fw-bold" ></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>