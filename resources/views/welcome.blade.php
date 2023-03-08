<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

    <link rel="icon" type="image/png" href="/assets/image/logo-w.png" />

    <title>SHB PLATFORME</title>

    <!-- Fonts -->
    <!-- Styles -->


     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    <div id="app">
        <router-view></router-view>
    </div>

</body>

</html>
