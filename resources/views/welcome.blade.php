<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TODO APP</title>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/scss/app.scss','resources/js/app.js'])
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
