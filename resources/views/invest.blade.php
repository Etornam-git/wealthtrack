<x-layout>
    <x-slot:pagename>
      Investments
    </x-slot:pagename>
    <main class="container mx-auto px-6 py-10">
      <!-- Hero Section -->
      <div class="text-center mb-12">
        <h1 class="text-6xl font-extrabold text-gray-900 mb-4">Investments</h1>
        <p class="text-xl text-gray-700">
          Unlock potential and grow your wealth with smart investment strategies.
        </p>
      </div>
  
      <!-- Investments Portfolio Cards Section -->
      <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Investment Card 1: Stocks -->
        <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
          <h2 class="text-2xl font-bold text-gray-800">Stocks Portfolio</h2>
          <p class="mt-2 text-gray-600">Value: <span class="font-semibold">$25,000</span></p>
          <p class="mt-1 text-gray-500">Daily Change: <span class="font-semibold text-green-500">+2.3%</span></p>
          <p class="text-gray-600 mt-4">
            A diversified portfolio featuring top-performing companies.
          </p>
          <a href="#" class="mt-4 inline-block text-indigo-600 font-medium hover:underline">
            View Details &rarr;
          </a>
        </div>
  
        <!-- Investment Card 2: Bonds -->
        <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
          <h2 class="text-2xl font-bold text-gray-800">Bond Investments</h2>
          <p class="mt-2 text-gray-600">Value: <span class="font-semibold">$15,000</span></p>
          <p class="mt-1 text-gray-500">Yield: <span class="font-semibold text-green-500">+1.8%</span></p>
          <p class="text-gray-600 mt-4">
            Secure bonds for steady returns and reduced risk.
          </p>
          <a href="#" class="mt-4 inline-block text-indigo-600 font-medium hover:underline">
            View Details &rarr;
          </a>
        </div>
  
        <!-- Investment Card 3: Crypto -->
        <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
          <h2 class="text-2xl font-bold text-gray-800">Crypto Portfolio</h2>
          <p class="mt-2 text-gray-600">Value: <span class="font-semibold">$8,500</span></p>
          <p class="mt-1 text-gray-500">Volatility: <span class="font-semibold text-red-500">-3.4%</span></p>
          <p class="text-gray-600 mt-4">
            Dive into the dynamic world of cryptocurrencies with our curated portfolio.
          </p>
          <a href="#" class="mt-4 inline-block text-indigo-600 font-medium hover:underline">
            View Details &rarr;
          </a>
        </div>
      </section>
  
      <!-- Call to Action Section -->
      <div class="mt-16 text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Elevate Your Investment Game</h2>
        <p class="text-xl text-gray-700 mb-8">
          Get personalized insights and expert advice to optimize your portfolio.
        </p>
        <a href="#" class="px-8 py-4 bg-indigo-600 text-white font-semibold rounded-full shadow-lg hover:bg-indigo-500 transition duration-300">
          Explore More Investments
        </a>
      </div>
    </main>
  </x-layout>
  