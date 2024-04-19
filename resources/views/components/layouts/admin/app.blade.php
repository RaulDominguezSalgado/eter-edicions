<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/admin/main.css">
    <link rel="stylesheet" href="/css/admin/form.css">
    <link rel="stylesheet" href="/css/admin/nav.css">
    <link rel="stylesheet" href="/css/admin/table.css">
    <script src="/js/admin/nav.js"></script>
    <script src="/js/book/book.js"></script>
    <title>{{ $title ?? 'Èter Edicions' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="flex space-x-10">
    <x-layouts.admin.navigate/>
    <main>
        {{$slot}}
    </main>
</body>

</html>
