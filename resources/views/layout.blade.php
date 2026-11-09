<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>San Isidro Municipal Hall</title>

</head>

<body class="bg-[#F8F9FA] ">
    {{-- <x-header :count="count(session('cart') ?? []) /> --}}
    {{ $slot }}


</body>

</html>
