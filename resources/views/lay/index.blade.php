<!DOCTYPE html>
<html lang="en" class="app">
   <!-- Mirrored from flatfull.com/themes/musik/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2019 06:25:14 GMT -->
   <head>
      <meta charset="utf-8" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <base href="{{ asset('') }}">
      <title>{{ trans('label.title') }}</title>
      <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link rel="stylesheet" href="bower_components/hoang-md-client/client/js/jPlayer/jplayer.flat.css" type="text/css" />
      <link rel="stylesheet" href="bower_components/hoang-md-client/client/css/app.v1.css" type="text/css" />
      <link rel="stylesheet" href="bower_components/hoang-md-client/client/css/mycss.css" type="text/css" />
      <link rel="stylesheet" href="bower_components/hoang-md-client/client/js/sweetalert2/dist/sweetalert2.css" type="text/css" />
      @yield('css')
      <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
   </head>
   <body class="">
      <section class="vbox">
         @yield('content')
      </section>
      <!-- Bootstrap --> <!-- App --> 
      @yield('script')
      <script src="{{ config('home.link.ajax') }}"></script>
      <script src="/bower_components/hoang-md-client/client/js/app.v1.js"></script> 
      <script src="/bower_components/hoang-md-client/client/js/app.plugin.js"></script> 
      <script type="text/javascript" src="/bower_components/hoang-md-client/client/js/jPlayer/jquery.jplayer.min.js"></script> 
      <script type="text/javascript" src="/bower_components/hoang-md-client/client/js/jPlayer/add-on/jplayer.playlist.min.js"></script> 
      <script type="text/javascript" src="/bower_components/hoang-md-client/client/js/myjs.js"></script>
      <script type="text/javascript" src="custom-js/mjs.js"></script>
      <script type="text/javascript" src="custom-js/search.js"></script>
      <script type="text/javascript" src="custom-js/comment.js"></script>
      <script type="text/javascript" src="custom-js/review_image.js"></script>
      <script src="{{ config('home.link.typehead') }}"></script>
      <script src="bower_components/hoang-md-client/client/js/sweetalert2/dist/sweetalert2.all.min.js"></script>
   </body>
   <!-- Mirrored from flatfull.com/themes/musik/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2019 06:26:28 GMT -->
</html>
