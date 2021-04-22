<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .subtitle {
            font-family: 'PermanentMarker', PermanentMarker, 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-green">

    <div class="min-h-screen flex items-center justify-center">
        <div class="m-2 sm:m-0 p-6 sm:p-8 md:p-16 bg-white shadow-2xl sm:w-2/3 max-w-2xl rounded">
            <h1 class="text-3xl font-bold mb-10 text-gray-800">{{ $title }}</h1>

            <p>Welkom, {{ $name }}</p>

        </div>
    </div>

</body>