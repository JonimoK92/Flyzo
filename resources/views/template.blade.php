<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<title>@yield('titre')</title>
</head>
<body>

    <div class="@yield('header_container', 'container-fluid p-5 bg-primary text-white')">
        <h1>@yield('header')</h1>
    </div>
    <div>   
            @yield('nav')
    </div>

<div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>