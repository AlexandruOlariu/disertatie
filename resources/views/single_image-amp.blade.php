<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <img src="<?php echo '.././storage/'.$post->url;?>" class="heightSet">
    <div class="card-body">
        <div class="form-group col-md-6">

            <h1 class="card-title"><?php echo $post->title;?></h1>
        </div>
        <div>

            <h2 class="card-text"><?php echo $post->description;?></h2>
        </div>
        <div>

            <h6 class="card-text"><?php echo substr($post->created_at,0,10);?></h6>
        </div>
        </div>
    </div>
    </div>
</div>

</body>
