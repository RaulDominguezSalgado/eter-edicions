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
<body class="flex flex-col justify-center items-center h-screen space-y-5 md:space-y-5 m-0 bg-surfacemedium">
    <main class="flex flex-col justify-center items-center w-[40em] px-8 py-8 space-y-8 overflow-auto">
        {{$slot}}
    </main>
</body>

</html>
