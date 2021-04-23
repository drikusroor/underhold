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
            <h1 class="text-3xl font-bold mb-10 text-gray-800">Inloggen</h1>
            <form method="POST" class="space-y-8">

                @csrf

                <div>
                    <label for="email" class="block mb-2 font-bold">E-mail</label>
                    <input id="email" name="email" class="rounded w-full p-1 border-2 border-gray-200 outline-none focus:border-blue-400" type="email">
                </div>

                <div>
                    <label for="password" class="block mb-2 font-bold">Wachtwoord</label>
                    <input id="password" name="password" class="rounded w-full p-1 border-2 border-gray-200 outline-none focus:border-blue-400" type="password">
                </div>

                <button class="block w-full bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 transition duration-300 p-4 rounded">Aanmelden</button>

            </form>
        </div>
    </div>

</body>