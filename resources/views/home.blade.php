<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata and external resources -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to Tailwind CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Home - WealthTrack</title>
</head>
<body>
    <div class="bg-white">
        <!-- Header section with navigation -->
        <header class="absolute inset-x-0 top-0 z-50">
          <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
              <!-- Logo link -->
              <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">WealthTrack</span>
                <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
              </a>
            </div>
            <div class="flex lg:hidden">
              <!-- Mobile menu button -->
              <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
              </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
              <!-- Navigation links for larger screens -->
              <x-nav-link href="/" :active="request()->is('/')" >Features</x-nav-link>
              <x-nav-link href="/trends" :active="request()->is('/trends')" >Finance Trends</x-nav-link>
              <x-nav-link href="/savings" :active="request()->is('/savings')">Savings</x-nav-link>
              <x-nav-link href="/budgets" :active="request()->is('/budgets')">Budgets</x-nav-link>
              <x-nav-link href="invest" :active="request()->is('/invest')">Invest</x-nav-link>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
              <!-- Log in link for larger screens -->
              <a href="#" class="text-sm/6 font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
          </nav>
          <!-- Mobile menu, show/hide based on menu open state. -->
          {{-- <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-100">
              <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                  <!-- Mobile logo link -->
                  <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
                  </a>
                  <!-- Close menu button -->
                  <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
                <div class="mt-6 flow-root">
                  <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                      <!-- Mobile navigation links -->
                      <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Product</a>
                      <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Features</a>
                      <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Marketplace</a>
                      <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
                    </div>
                    <div class="py-6">
                      <!-- Mobile log in link -->
                      <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </header>
      
        <!-- Main content section -->
        <div class="relative isolate px-6 pt-14 lg:px-3">
          <!-- Background gradient decoration -->
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#fbbf24] via-[#10b981] to-[#f97316] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
          <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-30">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
            </div>
            <div class="text-center">
              <!-- Main heading -->
              <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">WealthTrack</h1>
              <!-- Subheading -->
              <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Track your expenses, make budgets. Build a strong finance structure!...</p>
              <div class="mt-10 flex items-center justify-center gap-x-6">
                <!-- Call to action button -->
                <a href="#" class="rounded-md bg-indigo-600 px-10 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
              </div>
            </div>
          </div>
          <!-- Bottom background gradient decoration -->
          <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
          </div>
        </div>
      </div>
      
</body>
</html>