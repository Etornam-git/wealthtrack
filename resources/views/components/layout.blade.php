<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- TailwindCSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
    /* Custom Animations */
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
  <!-- Header: Sticky Navigation -->
  <header class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50 animate-fadeInUp">
    <nav class="container mx-auto flex items-center justify-between p-6">
      <a href="/" class="flex items-center transition transform hover:scale-105">
        <svg class="size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
          <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
        </svg>
        @auth
          <span class="ml-3 text-2xl font-bold text-gray-900 dark:text-gray-100">WealthTrack - {{ Auth::user()->first_name }}, {{ Auth::user()->id }}</span>
        @endauth
      </a>
      @auth
        <ul class="hidden lg:flex space-x-8">
          <li>
            <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
          </li>
          <li>
            <x-nav-link href="/savings" :active="request()->is('savings')">Savings</x-nav-link>
          </li>
          <li>
            <x-nav-link href="/budgets" :active="request()->is('budgets')">Budgets</x-nav-link>
          </li>
          <li>
            <x-nav-link href="/invest" :active="request()->is('invest')">Invest</x-nav-link>
          </li>
          
          <li>
            <form action="/logout" method="POST" id="logout">
              @csrf
              <button type="submit" form="logout">Logout</button>
            </form>
          </li>
          
          
        </ul>
      @endauth
      
      @guest
        <div class="hidden lg:flex space-x-4">
              <div class="flex flex-col lg:flex-row items-center lg:space-x-4 space-x-12 space-y-2 lg:space-y-0">
                <x-nav-link href="/" :active="request()->is('home')">Home</x-nav-link>
                <x-nav-link href="/trends" :active="request()->is('trends')">Finance Trends</x-nav-link>
              </div>
          <x-nav-link href="/login" >Login</x-nav-link>
          <x-nav-link href="/register">Register</x-nav-link>
        </div>
      @endguest
      <div class="lg:hidden">
        <button type="button" class="text-gray-700 dark:text-gray-300 focus:outline-none">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
    </nav>
  </header>

  <!-- Main Content Area -->
  <main class="container mx-auto px-6 py-10 animate-fadeInUp">
    {{ $slot }}
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 dark:bg-gray-700 py-8">
    <div class="container mx-auto px-6 text-center">
      <p class="text-gray-400">&copy; 2025 WealthTrack. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
