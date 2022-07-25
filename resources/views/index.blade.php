<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
</head>

<body>
<div id="app">
    <v-header></v-header>
    <router-view></router-view>
</div>
<script src="./js/app.js"></script>
</body>
</html>
