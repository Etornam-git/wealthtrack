<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeInUp {
      animation: fadeInUp 0.8s ease-out forwards;
    }
    .delay-200 { animation-delay: 0.2s; }
    .delay-400 { animation-delay: 0.4s; }
  </style>
  <title>@yield('title', 'WealthTrack')</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900">

  <!-- Header -->
  <header class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50 animate-fadeInUp">
    <nav class="container mx-auto flex items-center justify-between p-6">
      <a href="/" class="flex items-center transition transform hover:scale-105">
        @auth
          <span class="ml-3 text-2xl font-bold text-gray-900 dark:text-gray-100">
            WealthTrack - {{ Auth::user()->first_name }}
          </span>
        @endauth
      </a>

      <!-- Desktop Navigation -->
      <div class="hidden lg:flex items-center space-x-8">
        @auth
          <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
          <x-nav-link href="/savings" :active="request()->is('savings')">Savings</x-nav-link>
          <x-nav-link href="/budgets" :active="request()->is('budgets')">Budgets</x-nav-link>
          <x-nav-link href="/profile" :active="request()->is('profile')">Profile</x-nav-link>
          <form action="/logout" method="POST" id="logout">
            @csrf
            <button type="submit" form="logout">Logout</button>
          </form>
        @endauth

        @guest
          <x-nav-link href="/" :active="request()->is('home')">Home</x-nav-link>
          <x-nav-link href="/login">Login</x-nav-link>
          <x-nav-link href="/register">Register</x-nav-link>
        @endguest
      </div>

      <!-- Mobile Toggle Button -->
      <div class="lg:hidden">
        <button onclick="toggleMobileMenu()" class="text-gray-700 dark:text-gray-300 focus:outline-none">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
    </nav>

    <!-- Mobile Navigation Menu -->
    <div id="mobileMenu" class="lg:hidden hidden px-6 pb-4">
      @auth
        <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
        <x-nav-link href="/savings" :active="request()->is('savings')">Savings</x-nav-link>
        <x-nav-link href="/budgets" :active="request()->is('budgets')">Budgets</x-nav-link>
        <x-nav-link href="/profile" :active="request()->is('profile')">Profile</x-nav-link>
        <form action="/logout" method="POST" id="logoutMobile">
          @csrf
          <button type="submit" form="logoutMobile" class="block w-full text-left text-red-500">Logout</button>
        </form>
      @endauth

      @guest
        <x-nav-link href="/" :active="request()->is('home')">Home</x-nav-link>
        <x-nav-link href="/trends" :active="request()->is('trends')">Finance Trends</x-nav-link>
        <x-nav-link href="/login">Login</x-nav-link>
        <x-nav-link href="/register">Register</x-nav-link>
      @endguest
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-10 animate-fadeInUp">
    {{ $slot }}
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 dark:bg-gray-700 py-8">
    <div class="container mx-auto px-6 text-center">
      <p class="text-gray-400">&copy; 2025 WealthTrack. All rights reserved.</p>
    </div>
  </footer>

  <!-- JS: Toggle Mobile Menu -->
  <script>
    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    }
  </script>
</body>
</html>
