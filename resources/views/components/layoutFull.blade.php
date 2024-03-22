<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> {{ $title ?? 'Beer Chope' }}</title>
</head>
<body class="bg-gray-100">
{{$slot}}
<x-flash></x-flash>
</body>
</html>
