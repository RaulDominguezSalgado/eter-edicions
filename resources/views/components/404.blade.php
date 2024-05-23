<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <main>
        <p>ERROR 404</p>
    </main>

</x-layouts.app>
{{-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Error 404 - No trobat</title>
    <style>
        body {

            font-family: Arial, sans-serif;

            margin: 0;

            padding: 0;

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

            background-color: #f9f9f9;
            /* opcional */

        }

        .container {

            max-width: 400px;
            /* ajusta el valor segons les teves necessitats */

            margin: 20px;

            padding: 20px;

            background-color: #fff;

            border: 1px solid #ddd;

            border-radius: 10px;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        .message {

            text-align: center;

        }

        .button {

            display: block;

            margin: 20px auto;

            padding: 10px 20px;

            background-color: #4CAF50;

            color: #fff;

            border: none;

            border-radius: 5px;

            cursor: pointer;

            text-decoration: none;
        }

        .button:hover {

            background-color: #3e8e41;

        }
    </style>
</head>

<body>
    <div class="container">

        <div class="message">
            <h2>Ups! Sembla que aquest llibre no existeix.</h2>
            <p>La pàgina que estàs buscant no es troba a la nostra biblioteca.</p>
            <a href="/" class="button">Tornar a l'inici</a>
        </div>
    </div>
</body>

</html> --}}
