<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/favicon.ico">
    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="{{asset('js/main.js')}}" ></script>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
</head>
<body>
{{--<div class="row justify-content-center">--}}
{{--    <div>--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ul class="breadcrumb">--}}
{{--                <li class="breadcrumb-item"><a href="#">Главная</a></li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page" >Вакансии</li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--</div>--}}
<h1 class="text-center mt-5">@yield('h1')</h1>
<div class="toaster"></div>
<div class="container-fluid">
@section('modal')
    <span hidden class="appendModal"></span>
@show
@yield('content')
</div>
</body>
<footer>
</footer>
</html>