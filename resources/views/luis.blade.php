<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Home</title>
    </head>

    <body>
    
    
    
    <div id="app">
    
        <nav-component></nav-component>
        <search-component></search-component>    
        <luis-component></luis-component>
    </div>

    
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
