<!DOCTYPE html>
<html>
<head>
  <title>NewsFeed</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#fc0505">{{--android firefox and opera--}}
  <meta name="msapplication-navbutton-color" content="#fc0505">{{--android firefox and opera--}}
  <meta name="msapplication-navbutton-color" content="#fc0505">{{--windows mobile--}}
  {{--safari firefox and opera--}}
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-startup-bar-style" content="black-translucent">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{asset('css/front/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/front/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/front/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/front/font.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/front/li-scroller.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/front/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/front/jquery.fancybox.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/front/theme.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/front/style.css')}}">
  {{-- editor --}}
{{--   <link rel="stylesheet" type="text/css" href="{{asset('css/front/edit.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/front/edit1.css')}}"> --}}
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <div id=""></div>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <div class="container">
    <header id="header">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="header_top">
            <div class="header_top_left">
              <ul class="top_nav">
                <li><a href="/index">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li class="text-right"><a id="google_translate_element"></a></li>
              </ul>
            </div>
            <div class="header_top_right">
              <p id="today"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="header_bottom">
            <div class="logo_area"><a href="/index" class="logo"><img src="{{asset('image/front/logo.jpg')}}" alt=""></a></div>
            <div class="add_banner"><a href="#"><img src="{{asset('image/front/addbanner_728x90_V1.jpg')}}" alt=""></a></div>
          </div>
        </div>
      </div>
    </header>
    <section id="navArea">
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav main_nav ">
            <li class="active bg_color"><a href="/index"><span class="fa fa-home desktop-home "></span><span class="mobile-show">Home</span></a></li>
            <li><a href="/wontechnology">Technology</a></li>
            <li><a href="/visa">Visa</a></li>
            {{-- <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Visa</a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Android</a></li>
                <li><a href="#">Samsung</a></li>
                <li><a href="#">Nokia</a></li>
                <li><a href="#">Walton Mobile</a></li>
                <li><a href="#">Sympony</a></li>
              </ul>
            </li> --}}
            <li><a href="/wonpolitics">Politics</a></li>
            <li><a href="/wonfestival">Festival</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a href="/about">About</a></li>

            @if($message= Session::get('message_contact'))
            <div class="card-body text-capitalize float-lg-right font-weight-bold message" style="position: absolute; right:0%; z-index: 1; font-weight: bold; color:white; font-size: 17px; background-color: green;padding-left:10px;padding-right: 10px;">
              <i class="icon-copy fa fa-check " aria-hidden="true" style="line-height: 51px; font-size:20px;"></i> &nbsp;  {{ $message}}
            </div>
            @endif 




          </ul>
        </div>
      </nav>
    </section>

    @include('front.breakingnews')
    {{-- start --}}
    <section id="sliderSection">
      <div class="row">
        @yield('section')
        @yield('wonpolitics_section')
        <?php 
        $url = Route::currentRouteName();      
        ?>


        @if(($url=='index')||($url=='/wonpolitics')||($url=='/wontechnology')||($url=='/wonfestival'))
        @include('front.latestpost')


        @endif

      </div>
    </section>

    <section id="contentSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="left_content">

           {{-- pages --}}
           @yield('politics')
           @yield('index')
           @yield('single')
           @yield('slide_singlepage')
           @yield('visa_singlepage')
           @yield('study_singlepage')
           @yield('festival_singlepage')
           @yield('fashion_singlepage')
           @yield('travel_singlepage')
           @yield('politics_singlepage')
           @yield('contact')
           @yield('visa_popularsingle')
           @yield('study_popularsingle')
           @yield('fashion_popularsingle')
           @yield('festival_popularsingle')
           @yield('politics_popularsingle')
           @yield('technology_singlepage')
           @yield('technology_popularsingle')
           @yield('breakingnews_single')
           @yield('about')
           @yield('wonpolitics')
           @yield('wonpolitics_singlepage')

           @yield('wontechnology')
           @yield('wontechnology_singlepage')
           @yield('wonfestival')
           @yield('wonfestival_singlepage')


           @yield('test')
         </div>
       </div>



       @include('front.popularpost')
       {{-- @include('front.latestpost') --}}

     </div>
   </section>
   <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
            <a href="#"><img src="{{asset('image/admin/img.jpg')}}" alt=""></a>
            <a href="#"><img src="{{asset('image/admin/img1.jpg')}}" alt=""></a>
            <a href="#"><img src="{{asset('image/admin/img2.jpg')}}" alt=""></a>
            <a href="#"><img src="{{asset('image/admin/img3.jpg')}}" alt=""></a>
            <a href="#"><img src="{{asset('image/admin/img.jpg')}}" alt=""></a>
            <a href="#"><img src="{{asset('image/admin/img.jpg')}}" alt=""></a>



          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <ul class="tag_nav">
              <li><a href="/wonpolitics">Politics</a></li>
              <li><a href="/visa">Visa</a></li>
              <li><a href="/wonfestival">Festival</a></li>
              <li><a href="/wontechnology">Technology</a></li>
              <li><a href="/contact">Contact</a></li>
              <li><a href="/about">About</a></li>

            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact us</h2>
            <p>We are broadcast News from poland. we respectly share news towards users.<br><br>Name: Hello<br>Email: Shishantkmrs@gmail.com<br>Phone. No.: 48-727-825-007</p>
            <address>
              Poland News, 2020101 S. Ul.AKACJOWA 3, Gadki st.Poznan 62-023, Poland 
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; <span id="year"></span> <a href="/index">News</a></p>
      <p class="developer">Developed By Shisproject</p>
    </div>
  </footer>
</div>
{{-- <script src="https://use.fontawesome.com/e069046a40.js"></script> 
--}}<script src="{{asset('js/front/jquery.min.js')}}"></script> 
<script src="{{asset('js/front/wow.min.js')}}"></script> 
<script src="{{asset('js/front/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/front/slick.min.js')}}"></script> 
<script src="{{asset('js/front/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{asset('js/front/jquery.newsTicker.min.js')}}"></script> 
<script src="{{asset('js/front/jquery.fancybox.pack.js')}}"></script> 
<script src="{{asset('js/front/custom.js')}}"></script>
{{-- <script src="{{asset('js/edit1.js')}}"></script>
<script src="{{asset('js/edit2.js')}}"></script>
<script src="{{asset('js/edit3.js')}}"></script>
<script src="{{asset('js/edit4.js')}}"></script> --}}
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
<style type="text/css" media="screen">
  #google_translate_element{height: 30px; margin-top:-50px; top:10px;position: relative;}
 .goog-te-banner-frame.skiptranslate {
  display: none !important;
} 

.goog-logo-link {
  display:none !important;
}
.trans-section {
  margin: 0px;
}
.goog-te-gadget{font-size: 0px;}
.goog-te-combo{position:relative;top: -5px;font-size: 13px;height: 14px; background-color: red; color:white; border:none;margin-top: -50px;}


.fadeInLeftBig img{width:100px; height:100px; margin:1px;}
</style>

<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.HORIZONTAL}, 'google_translate_element');
  }
</script>
<script>
  setTimeout(function() {
    $('.message').slideUp('slow');
  }, 3000);
  var myDate = new Date();

  let daysList = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  let monthsList = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


  let date = myDate.getDate();
  let month = monthsList[myDate.getMonth()];
  let year = myDate.getFullYear();
  let day = daysList[myDate.getDay()];

  let today = ` ${day}`+', &nbsp;'+ `${date}`+ ' &nbsp;'+ `${month}`+' '+ `${year} `;
  let anuual =`${year}`;
  let amOrPm;
  let twelveHours = function (){
    if(myDate.getHours() > 12)
    {
      amOrPm = 'PM';
      let twentyFourHourTime = myDate.getHours();
      let conversion = twentyFourHourTime - 12;
      return `${conversion}`

    }else {
      amOrPm = 'AM';
      return `${myDate.getHours()}`}
    };
    let hours = twelveHours();
    let minutes = myDate.getMinutes();

    let currentTime = `${hours}:${minutes} ${amOrPm}`;
    document.getElementById("year").innerHTML =`${year}`;
    document.getElementById("today").innerHTML =`${today}`;
// document.getElementById('year').innerHTML=$year;

</script>


</html>