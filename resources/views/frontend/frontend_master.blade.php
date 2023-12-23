<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Classimax | Classified Marketplace Template</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="classimax" />

  <!-- favicon -->
  <link href="images/favicon.png" rel="shortcut icon">

  <!-- 
  Essential stylesheets
  =====================================-->
  <link href="{{ URL::asset('../frontend/plugins/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('../frontend/plugins/bootstrap/bootstrap-slider.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('../frontend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('../frontend/plugins/slick/slick.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('../frontend/plugins/slick/slick-theme.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('../frontend/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  
  <link href="{{ URL::asset('../frontend/css/style.css')}}" rel="stylesheet">

</head>

<body class="body-wrapper">



    @include('frontend.body.header')

    @yield('frontend')
    @include('frontend.body.footer')

<!-- 
Essential Scripts
=====================================-->
<script src="{{ URL::asset('../frontend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('../frontend/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{ URL::asset('../frontend/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('../frontend/plugins/bootstrap/bootstrap-slider.js')}}"></script>
<script src="{{ URL::asset('../frontend/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{ URL::asset('../frontend/plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{ URL::asset('../frontend/plugins/slick/slick.min.js')}}"></script>
<script src="{{ URL::asset('../frontend/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
<!-- google map -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="plugins/google-map/map.js" defer></script> --}}

<script src="{{ URL::asset('../frontend/js/script.js')}}"></script>

</body>

</html>



