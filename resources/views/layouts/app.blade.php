<!DOCTYPE html>
<html lang="en">
<head class="bg-gray-900">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Film Review</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="font-sans antialiased bg-gray-900 text-white">
  <!-- Header -->
  @include('layouts.header')
  <!-- Konten Utama -->
  <main>
    @yield('content')
  </main>

  <!-- Footer (jika ada) -->
  @include('layouts.footer')

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  @include('layouts.modal-error')
</body>
</html>
