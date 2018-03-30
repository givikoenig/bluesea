<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bluesea Corporate</title>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery.fonticonpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery.fonticonpicker.grey.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery.fonticonpicker.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/font-icon.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> 
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}"> 
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-iconpicker.min.css') }}"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.flexslider-min.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}"></script> 
<script src="{{ asset('assets/js/admin.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.fancybox.pack.js') }}"></script>  
<script src="{{ asset('assets/js/jquery.fonticonpicker.min.js') }}"></script>  
<script src="{{ asset('assets/js/modernizr.js') }}"></script> 
<script src="{{ asset('assets/js/main.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/jquery.contact.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/jquery.devrama.slider.min-0.9.4.js') }}"></script>
</head>

<body>

<header id="header_wrapper">
        @yield('header')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
</header>
        @yield('content')
</body>
</html>