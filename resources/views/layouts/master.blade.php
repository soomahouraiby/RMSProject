<html>

<head>

    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('../css/bootstrap-rtl.css')}}">
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->

    <!--Fontawesome-->
    <link rel="stylesheet" href="{{asset('../css/font/all.css')}}">

    <!--Custom-->
    <link rel="stylesheet" href="{{asset('../css/style.css')}}">

</head>

<body>


{{--Navbar--}}
@include('include/header')




<div class="container-fluid ">
    <div class="row ">

        {{--List--}}

        @if(auth()->user())
            @include('include.sidebarMenu')
        @endif

        {{--Content--}}
        @yield('content')



    </div>
</div>



<!--jquery and Bootstrap.js-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@yield('save_ajax')
</body>
</html>
