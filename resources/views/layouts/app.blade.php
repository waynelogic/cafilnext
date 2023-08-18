<!doctype html>
<html lang="ru" class="scroll-smooth scroll-pt-52">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title', 'ФилНекст | Коллекторское Агентство')</title>
    <! -- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{--    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <! -- Styles -->
    @vite('resources/css/app.css')
</head>

<body>
    @include('common.header')
    @yield('content')
    @include('common.footer')
    @vite('resources/js/app.js')
</body>
</html>
