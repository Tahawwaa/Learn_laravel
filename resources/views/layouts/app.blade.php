<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NOIR — Minimal Monochrome Fashion Store</title>
<meta name="description" content="NOIR is a minimal, black & white fashion store template — timeless essentials for a quieter wardrobe.">
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 32 32%27%3E%3Crect width=%2732%27 height=%2732%27 fill=%27%230a0a0a%27/%3E%3Ctext x=%2716%27 y=%2723%27 font-family=%27Georgia,serif%27 font-size=%2718%27 fill=%27%23fff%27 text-anchor=%27middle%27%3EN%3C/text%3E%3C/svg%3E">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    @include('pages.header')

    <main>
        @yield('content')
    </main>

    @include('pages.footer')

    <script src="assets/js/products.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/main.js"></script>

    @stack('scripts')
</body>
</html>