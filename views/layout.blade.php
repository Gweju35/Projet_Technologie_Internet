<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site Web</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
@include("sections.header")
@yield('content')
@include("sections.footer")
<script src="/public/js/main.js"></script>
</body>
</html>