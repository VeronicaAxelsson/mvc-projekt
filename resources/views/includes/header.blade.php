<!-- /**
 * Standard view template to generate a simple web page, or part of a web page.
 */ -->

<!doctype html>
<html>
    <meta charset="utf-8">
    <!-- <title><?= $title ?? "No title" ?></title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>

<header>
    <nav>
        <a href="{{ url('/') }}">Hem</a>
        <a href="{{ url('/adventure') }}">Äventyr</a>
    </nav>
</header>
<main>
