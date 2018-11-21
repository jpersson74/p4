
<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    {{-- CSS global to every page can be loaded here --}}
    <link href='/css/p3.css' rel='stylesheet'>

    {{-- CSS specific to a given page/child view can be included via a stack --}}
    @stack('head')
</head>
<body>

<header>

</header>

<section>
    @yield('content')
</section>

<footer>
    &copy; WSP {{ date('Y') }}
</footer>

{{-- JS global to every page can be loaded here; jQuery included just as an example --}}


{{-- JS specific to a given page/child view can be included via a stack --}}
@stack('body')

</body>
</html>