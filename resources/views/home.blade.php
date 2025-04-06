<x-layout>
  <x-slot:pagename>
    Home
  </x-slot:pagename>

  <!-- Hero Section -->
  <main class="container mx-auto px-6 py-16 animate-fadeInUp">
    <div class="text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-gray-100 mb-6">
        WealthTrack
      </h1>
      <p class="text-xl md:text-2xl text-gray-700 dark:text-gray-300 mb-8">
        Track your expenses, create budgets, and build a strong financial foundation.
      </p>
      <a href="#features" class="bg-indigo-600 text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-indigo-500 transition duration-300 ease-in-out shadow-lg">
        Get Started
      </a>
    </div>
  </main>

  <!-- Features Section -->
  <section id="features" class="py-16 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Feature Card 1 -->
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-8 transform hover:scale-105 transition duration-300 animate-fadeInUp delay-200">
          <div class="mb-4">
            <svg class="h-12 w-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 8h8l3-8h4"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Smart Budgeting</h3>
          <p class="text-gray-600 dark:text-gray-300">
            Plan your expenses with intuitive tools and insightful analytics.
          </p>
        </div>
        <!-- Feature Card 2 -->
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-8 transform hover:scale-105 transition duration-300 animate-fadeInUp delay-400">
          <div class="mb-4">
            <svg class="h-12 w-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V2a1 1 0 011-1h1a1 1 0 011 1v9h5a1 1 0 010 2h-5v9a1 1 0 01-1 1h-1a1 1 0 01-1-1v-9H6a1 1 0 010-2h5z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Real-Time Trends</h3>
          <p class="text-gray-600 dark:text-gray-300">
            Stay updated with the latest financial news and market trends.
          </p>
        </div>
        <!-- Feature Card 3 -->
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-8 transform hover:scale-105 transition duration-300 animate-fadeInUp delay-600">
          <div class="mb-4">
            <svg class="h-12 w-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Secure Investments</h3>
          <p class="text-gray-600 dark:text-gray-300">
            Make informed decisions with our expert investment guidance.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="bg-indigo-600 py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fadeInUp">
        Ready to Transform Your Finances?
      </h2>
      <p class="text-xl text-indigo-200 mb-8 animate-fadeInUp delay-200">
        Join thousands of users taking charge of their financial destiny.
      </p>
      <a href="/register" class="px-8 py-4 bg-white text-indigo-600 font-semibold rounded-full shadow-lg hover:bg-gray-100 transition duration-300 ease-in-out animate-fadeInUp delay-400">
        Sign Up Today
      </a>
    </div>
  </section>
</x-layout>
