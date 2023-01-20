<!DOCTYPE html>

<head>
  <title>Laravel From Scratch Blog</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="//unpkg.com/alpinejs" defer></script>

  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body style="font-family: Open Sans, sans-serif">
  <section class="px-6 py-8">
    <x-layout-nav />
    <main>{{$slot}}</main>
    <x-layout-footer />
  </section>
  <x-flash />
</body>

</html>