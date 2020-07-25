<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('dine_in_asset/css/menu-style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Playfair+Display&display=swap" rel="stylesheet"> 
    <link rel="apple-touch-icon" sizes="144x144" href="{{ theme_url('dine_in_asset/img/apple-touch-icon-ipad-retina-display.png') }}" /> 
    <title>Digital Menu</title>
  </head>
  <body class="feedback-bg">
    
  <div class="container pt-5 mt-5">
    <div class="row pt-5 mt-5">
      
      <div id="carouselExampleSlidesOnly" class="carousel slide  col-sm-12" data-ride="carousel">
      <div class="carousel-inner">
        
        <div class="carousel-item active" data-interval="false">
          <h2 class=""> How did you like the Food? </h2>
          <a href="#" class="col-sm-4" id="excellent"> <img src="{{theme_url('dine_in_asset/img/ic-excellent.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4" id="good"> <img src="{{theme_url('dine_in_asset/img/ic-good.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4" id="bad_food"> <img src="{{theme_url('dine_in_asset/img/ic-bad.svg')}}" class=""> </a>
        </div>
        
        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> Which Item did you not like? </h2>
          <a href="#" class="col-sm-12 item-not-like text-left align-items-center"> <img src="{{theme_url('dine_in_asset/img/tikka.jpg')}}" class="item-not-like-pic"> Bahawalpur Ganne Ka Ras </a>
          <a href="#" class="col-sm-12 item-not-like text-left align-items-center"> <img src="{{theme_url('dine_in_asset/img/tikka.jpg')}}" class="item-not-like-pic"> Paneer Tikka </a>
          <a href="#" class="col-sm-12 item-not-like text-left align-items-center"> <img src="{{theme_url('dine_in_asset/img/tikka.jpg')}}" class="item-not-like-pic"> Steamed Rice </a>
        </div>
        
         <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How did you like the Service? </h2>
          <a href="#" id="ser_execellent" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-excellent.svg')}}" class=""> </a>
          <a href="#" id="ser_good" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-good.svg')}}" class=""> </a>
          <a href="#" id="ser_bad" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-bad.svg')}}" class=""> </a>
        </div>

        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How would you rate the staff behaviour? </h2>
          <a href="#" id="staff_cheer" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-cheerfully.svg')}}" class=""> </a>
          <a href="#" id="staff_bare" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-barely.svg')}}" class=""> </a>
          <a href="#" id="staff_no_greet" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-no-greet.svg')}}" class=""> </a>
        </div>
        
        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How would you rate speed of service? </h2>
          <a href="#" id="speed_very_fast" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-very-fast.svg')}}" class="mt-3"> </a>
          <a href="#" id="speed_fast" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-fast.svg')}}" class="mt-3"> </a>
          <a href="#" id="speed_slow" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-slow.svg')}}" class="mt-3"> </a>
        </div>
        
        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How would you rate the cleanliness? </h2>
          <a href="#" id="clean_execellent" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-excellent.svg')}}" class=""> </a>
          <a href="#" id="clean_good" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-good.svg')}}" class=""> </a>
          <a href="#" id="clean_bad" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-bad.svg')}}" class=""> </a>
        </div>

        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How was your overall dining experience? </h2>
          <a href="#" id="exp_execellent" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-excellent.svg')}}" class=""> </a>
          <a href="#" id="exp_good" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-good.svg')}}" class=""> </a>
          <a href="#" id="exp_bad" class="col-sm-4"> <img src="{{theme_url('dine_in_asset/img/ic-bad.svg')}}" class=""> </a>
        </div>

        <div class="carousel-item" data-interval="false">
          <img src="{{theme_url('dine_in_asset/img/ic-gray-smile.svg')}}">
          <h2 class="col-sm-12 mt-5"> Thank You<br>for your invaluable feedback! </h2>
        </div> 
      
      </div>
    </div>


    </div>
  </div>
  <div class="container fixed-bottom">
    <div class="row">
      <div class="col-sm-12 text-center">
        <img src="{{theme_url('dine_in_asset/img/ic-feedback-hotels.svg')}}">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 text-center cutom-exp-p mt-3">
        CUSTOMER EXPERIENCE PORTAL
      </div>
    </div>
  </div>

   

    

              


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <!--  <script type="text/javascript" src="assets/js/custom-menu.js"></script> -->
    <script type="text/javascript">
      $(document).ready(function(){
          //alert('foo');
          $('#carouselExampleSlidesOnly').carousel({interval: false}); 
          
          $(".carousel-item a").click(function(){
          		if(this.id == "bad_food"){
          		              $("#carouselExampleSlidesOnly").carousel('next');
          		          }
          		          else if(this.id == 'good' || this.id == 'excellent'){
          		          	$(this).parent('div').next('div').remove();
          		          	$("#carouselExampleSlidesOnly").carousel('next');
          		          }
          		          else{
          		          	$("#carouselExampleSlidesOnly").carousel('next');
          		          }
          });

      });
      $('#good').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"likefood" , attr:"Good"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            console.log(data);
                        }
                    });
      });
      $('#excellent').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"likefood" , attr:"Excellent"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#bad_food').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"likefood" , attr:"Bad"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#ser_execellent').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"service" , attr:"Excellent"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#ser_good').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"service" , attr:"Good"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#ser_bad').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"service" , attr:"Bad"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#staff_cheer').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"staff" , attr:"Cheerfully Greeted"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#staff_bare').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"staff" , attr:"Barely Acknowledged"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#staff_no_greet').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"staff" , attr:"Not Greeted"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#speed_very_fast').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"speed" , attr:"Very Fast"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#speed_fast').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"speed" , attr:"Fast"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#speed_slow').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"speed" , attr:"Slow"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#clean_execellent').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"clean" , attr:"Excellent"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#clean_good').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"clean" , attr:"Good"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#clean_bad').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"clean" , attr:"Bad"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#exp_execellent').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"exp" , attr:"Excellent"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#exp_good').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"exp" , attr:"Good"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
      $('#exp_bad').on('click',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                        /* the route pointing to the post function */
                        url: "feedback",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN , action:"exp" , attr:"Bad"},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            
                        }
                    });
      });
    </script>   
 
  </body>
</html>