<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    <link href='/css/p4.css' rel='stylesheet'>


    @stack('head')
</head>
<body>

<header>
    <img src='/images/WSP.png' id='logo' alt='WSP Logo'>
    <h1><a href='/'>Geospatial Project Tracker</a></h1>
    @include('modules.nav')
</header>


<section>


    @yield('content')
</section>




@stack('body')
<footer>
    &copy; WSP {{ date('Y') }}
</footer>
</body>
</html>