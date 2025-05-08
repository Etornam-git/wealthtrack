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
      <a href="/register" class="bg-indigo-600 text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-indigo-500 transition duration-300 ease-in-out shadow-lg">
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

  <!-- How It Works Section -->
  <section class="py-16 bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-6">
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 dark:text-white mb-12 animate-fadeInUp">
        How It Works
      </h2>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Step 1 -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300 animate-fadeInUp delay-200">
          <div class="flex items-center justify-center w-12 h-12 bg-indigo-600 text-white rounded-full mb-4 mx-auto">
            <span class="text-xl font-bold">1</span>
          </div>
          <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2 text-center">Create Account</h3>
          <p class="text-gray-600 dark:text-gray-300 text-center">
            Sign up and create your personal account to get started with WealthTrack.
          </p>
        </div>
        <!-- Step 2 -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300 animate-fadeInUp delay-300">
          <div class="flex items-center justify-center w-12 h-12 bg-indigo-600 text-white rounded-full mb-4 mx-auto">
            <span class="text-xl font-bold">2</span>
          </div>
          <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2 text-center">Set Up Accounts</h3>
          <p class="text-gray-600 dark:text-gray-300 text-center">
            Add your financial accounts and set up your initial budget categories.
          </p>
        </div>
        <!-- Step 3 -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300 animate-fadeInUp delay-400">
          <div class="flex items-center justify-center w-12 h-12 bg-indigo-600 text-white rounded-full mb-4 mx-auto">
            <span class="text-xl font-bold">3</span>
          </div>
          <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2 text-center">Track & Analyze</h3>
          <p class="text-gray-600 dark:text-gray-300 text-center">
            Monitor your spending, track your savings, and analyze your financial patterns.
          </p>
        </div>
        <!-- Step 4 -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300 animate-fadeInUp delay-500">
          <div class="flex items-center justify-center w-12 h-12 bg-indigo-600 text-white rounded-full mb-4 mx-auto">
            <span class="text-xl font-bold">4</span>
          </div>
          <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2 text-center">Achieve Goals</h3>
          <p class="text-gray-600 dark:text-gray-300 text-center">
            Use insights to make better financial decisions and reach your financial goals.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Recent Reviews Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
      <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 dark:text-white mb-12 animate-fadeInUp">
          What Our Users Are Saying
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          @foreach ($reviews as $review)
            <!-- Review Card -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg shadow-md p-6 animate-fadeInUp delay-200 flex flex-col min-h-[200px] hover:shadow-lg transition-shadow duration-300">
              <div class="flex-grow">
                <div class="flex items-start mb-4">
                  <div class="flex-shrink-0 mt-1">
                    <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                  </div>
                  <p class="text-gray-700 dark:text-gray-300 italic ml-2 break-words">
                    "{{ $review->review }}"
                  </p>
                </div>
              </div>
              <div class="mt-auto pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                  <div class="text-left">
                    <div class="flex items-center">
                      @for($i = 1; $i <= 5; $i++)
                        <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                      @endfor
                    </div>
                  </div>
                  <div class="text-right">
                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                      – {{ $review->user->first_name }} {{ $review->user->last_name }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
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
