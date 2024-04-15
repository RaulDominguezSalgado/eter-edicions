<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/front/nav.css">
    <link rel="stylesheet" href="/css/front/footer.css">
    <title>{{ $title ?? 'Èter Edicions' }}</title>
    
</head>
<body>
    <x-layouts.navigate/>
    {{$slot}}
    <x-layouts.footer/>
</body>
</html>
