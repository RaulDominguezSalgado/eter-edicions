<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/admin/form.css">
    <link rel="stylesheet" href="/css/admin/nav.css">
    <link rel="stylesheet" href="/css/admin/table.css">
    <title>{{ $title ?? 'Èter Edicions' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-layouts.admin.navigate/>
    {{-- admin --}}
    {{$slot}}
</body>

</html>
