<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'halaman login')</title>
    {{-- Link Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Google -->
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Poppins&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    {{-- Link css --}}
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
        @yield('content')

</body>
</html>
