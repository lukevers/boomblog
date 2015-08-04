<!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <meta charset="utf-8">
        <meta name="description" content="Description">

        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="canonical" href="{{ Request::url() }}">
        <link rel="stylesheet" href="/assets/css/styles.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lustria' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,300italic,300' rel='stylesheet' type='text/css'>
    </head>
    <body class="{{ str_replace('/', '-', Request::path()) }}">
        <div id="page-content" class="page-content">
            @yield('content')
        </div>

        <script type="text/javascript" src="/assets/js/scripts.js"></script>
    </body>
</html>

