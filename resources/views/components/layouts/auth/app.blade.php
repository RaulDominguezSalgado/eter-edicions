<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="/css/main.css"> --}}
    <link rel="stylesheet" href="/css/admin/main.css">
    <title>{{ $title ?? 'Èter Edicions' }}</title>
    @vite(['resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col justify-center items-center m-0 bg-surfacemedium">
    <main class="flex flex-col justify-center items-center w-[24em] sm:w-[32em] md:w-[40em] px-8 pb-8">
        {{$slot}}
    </main>
</body>

</html>
