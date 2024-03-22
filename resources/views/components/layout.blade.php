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
{{--On ajoute la navbar et le flash message--}}
@if (!$attributes->has('no-sidebar'))
    <x-sidebar />
@endif
{{--<x-flash />--}}
<div >
    <div class="ml-18 mr-8 mt-8">
    {{ $slot }}
    </div>
</div>
</body>
</html>
