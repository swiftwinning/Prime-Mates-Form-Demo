<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Prime Mates')
    </title>

    <meta charset='utf-8'>
    <link href="/css/foobooks.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

    <header>
        <img src='{{ asset("images/shirt.svg") }}'
        style='width:100px'
        alt='T Shirt Logo'>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }} Jeff Winning<br>
        Icon made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from 
        <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is 
        licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 
        title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>