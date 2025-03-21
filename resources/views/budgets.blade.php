<x-layout>
    <x-slot:pagename>
      Your Budgets
    </x-slot:pagename>
    <main class="container mx-auto px-6 py-10">
      <!-- Hero Section -->
      <div class="text-center mb-12">
        <h1 class="text-6xl font-extrabold text-gray-900 mb-4">Your Budgets</h1>
        <p class="text-xl text-gray-700">
          Plan, track, and master your spending with personalized budgets designed for you.
        </p>
      </div>
  
      <!-- Budgets Overview Section -->
      <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Budget Card 1: Monthly Essentials -->
        <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
          <h2 class="text-2xl font-bold text-gray-800">Monthly Essentials</h2>
          <p class="mt-2 text-gray-600">Allocated: <span class="font-semibold">$2,500</span></p>
          <p class="mt-1 text-gray-500">Spent: <span class="font-semibold">$1,800</span></p>
          <div class="mt-4">
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-indigo-600 h-2 rounded-full" style="width: 72%"></div>
            </div>
            <p class="text-sm text-gray-500 mt-1">72% used</p>
          </div>
        </div>
  
        <!-- Budget Card 2: Entertainment -->
        <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
          <h2 class="text-2xl font-bold text-gray-800">Entertainment</h2>
          <p class="mt-2 text-gray-600">Allocated: <span class="font-semibold">$500</span></p>
          <p class="mt-1 text-gray-500">Spent: <span class="font-semibold">$350</span></p>
          <div class="mt-4">
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-indigo-600 h-2 rounded-full" style="width: 70%"></div>
            </div>
            <p class="text-sm text-gray-500 mt-1">70% used</p>
          </div>
        </div>
  
        <!-- Budget Card 3: Savings -->
        <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
          <h2 class="text-2xl font-bold text-gray-800">Savings</h2>
          <p class="mt-2 text-gray-600">Allocated: <span class="font-semibold">$1,000</span></p>
          <p class="mt-1 text-gray-500">Spent: <span class="font-semibold">$200</span></p>
          <div class="mt-4">
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-indigo-600 h-2 rounded-full" style="width: 20%"></div>
            </div>
            <p class="text-sm text-gray-500 mt-1">20% used</p>
          </div>
        </div>
      </section>
  
      <!-- Call to Action Section -->
      <div class="mt-16 text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Ready to Optimize Your Spending?</h2>
        <p class="text-xl text-gray-700 mb-8">
          Create a new budget tailored to your financial goals and start managing your money better.
        </p>
        <a href="#" class="px-8 py-4 bg-indigo-600 text-white font-semibold rounded-full shadow-lg hover:bg-indigo-500 transition duration-300">
          Add New Budget
        </a>
      </div>
    </main>
  </x-layout>
  