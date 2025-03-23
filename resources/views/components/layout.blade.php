<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script> --}}
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css"> --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
  <title>@yield('title', 'WealthTrack')</title>
</head>
<body class="bg-white">
  <header class="bg-white shadow">
    <nav class="container mx-auto flex items-center justify-between p-6">
      <a href="/" class="flex items-center">
        <img class="h-4 w-4" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="WealthTrack">
        <span class="text-sm font-semibold text-gray-900">WealthTrack - <span>{{ htmlspecialchars($pagename, ENT_QUOTES, 'UTF-8') }}</span></span>
      </a>
      <div class="hidden lg:flex space-x-5">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/trends" :active="request()->is('trends')">Finance Trends</x-nav-link>
        <x-nav-link href="/savings" :active="request()->is('savings')">Savings</x-nav-link>
        <x-nav-link href="/budgets" :active="request()->is('budgets')">Budgets</x-nav-link>
        <x-nav-link href="/invest" :active="request()->is('invest')">Invest</x-nav-link>
        <x-nav-link href="/users" :active="request()->is('users')">Users</x-nav-link>
      </div>
      <div class="hidden lg:flex">
        <a href="/user/login" class="text-sm font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
      </div>
      <div class="lg:hidden">
        <button type="button" class="text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
    </nav>
  </header>
  
  <main class="container mx-auto px-6 py-10">
    {{ $slot }}
  </main>

  <footer class="bg-gray-800 py-8 mt-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <p class="text-gray-400">&copy; 2025 WealthTrack. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
