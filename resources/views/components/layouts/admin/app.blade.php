<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="/css/main.css"> --}}
    <link rel="stylesheet" href="/css/admin/main.css">
    <link rel="stylesheet" href="/css/admin/form.css">
    <link rel="stylesheet" href="/css/admin/nav.css">
    <link rel="stylesheet" href="/css/admin/userSelect.css">
    <link rel="stylesheet" href="/css/admin/table.css">
    <script src="/js/admin/userSelect.js"></script>
    <script src="/js/admin/nav.js"></script>
    {{-- <script src="/js/form/post_dates.js"></script> --}}
    <title>{{ $title ?? 'Èter Edicions' }}</title>
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/js/app.js'])
</head>
<body class="flex flex-col md:flex-row space-y-5 md:space-y-5 m-0">
    <x-layouts.admin.navigate/>
    <main class="w-full p-5 md:p-8 lg:p-20 space-y-8">
        <x-layouts.admin.usernav/>
        {{$slot}}
    </main>
</body>

</html>
