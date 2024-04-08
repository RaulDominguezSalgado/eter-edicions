<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin/table.css">
    <link rel="stylesheet" href="/css/admin/form.css">
    <link rel="stylesheet" href="/css/admin/nav.css">
    <title>{{ $title ?? 'Èter Edicions' }}</title>
</head>
<body>
    <x-layouts.admin.navigate/>
    {{$slot}}
</body>

</html>
