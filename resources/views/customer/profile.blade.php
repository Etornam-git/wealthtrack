<x-layout>
    <section class="min-h-screen bg-gray-100 dark:bg-gray-900 py-16 px-4">
      <div class="max-w-3xl mx-auto space-y-12">

        {{-- BACK TO DASHBOARD --}}
        <div class="mb-4">
          <a
            href="{{ route('dashboard') }}"
            class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium"
          >
            &larr; Back to Dashboard
          </a>
        </div>

        {{-- PROFILE HERO --}}
        <header class="relative bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl overflow-hidden shadow-lg text-white p-8 flex flex-col items-center text-center">
          <img
            src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
            alt="{{ Auth::user()->name }}’s avatar"
            class="w-32 h-32 rounded-full border-4 border-white shadow-md mb-4"
          >
          <h1 class="text-4xl font-extrabold">{{ Auth::user()->name }}</h1>
          <p class="mt-1 text-lg opacity-90">{{ Auth::user()->email }}</p>
          <a
            href="{{ route('profile.edit') }}"
            class="mt-6 inline-block bg-white text-indigo-700 font-semibold py-2 px-6 rounded-full shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition"
          >
            Edit Profile
          </a>
        </header>

        {{-- DETAILS LIST --}}
        <dl class="bg-white dark:bg-gray-800 rounded-xl shadow divide-y divide-gray-200 dark:divide-gray-700">
          @foreach ([
            'Joined'    => Auth::user()->created_at->format('F j, Y'),
            'Status'    => ucfirst(Auth::user()->status ?? 'active'),
            'Phone'     => Auth::user()->phone ?? 'Not Provided',
            'Location'  => Auth::user()->location ?? 'Ghana',
          ] as $label => $value)
            <div class="px-6 py-4 sm:flex sm:justify-between sm:items-center">
              <dt class="text-gray-500 dark:text-gray-400 font-medium">{{ $label }}</dt>
              <dd class="mt-1 text-gray-900 dark:text-gray-200 sm:mt-0">{{ $value }}</dd>
            </div>
          @endforeach
        </dl>

        {{-- REVIEW FORM --}}
        <section aria-labelledby="leave-review" class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
          <h2 id="leave-review" class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Leave a Review</h2>
          <form action="{{ route('leave-a-review.review') }}" method="POST" class="space-y-4">
            @csrf
            <label for="review" class="sr-only">Your review</label>
            <textarea
              id="review"
              name="review"
              rows="4"
              required
              placeholder="What do you think of WealthTrack?"
              class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-4 bg-transparent text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            ></textarea>
            <button
              type="submit"
              class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-5 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition"
            >
              Submit Review
            </button>
          </form>
        </section>

        {{-- RESOURCES --}}
        <section aria-labelledby="resources" class="space-y-4">
          <h2 id="resources" class="text-2xl font-bold text-gray-900 dark:text-white">Learn More About Money</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <a
              href="https://www.investopedia.com/personal-finance-4427761"
              target="_blank"
              rel="noopener"
              class="block bg-white dark:bg-gray-800 rounded-xl shadow p-6 hover:shadow-lg transition focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
              <h3 class="text-lg font-semibold text-indigo-600 mb-1">Investopedia</h3>
              <p class="text-gray-600 dark:text-gray-300 text-sm">
                In-depth articles & tutorials on budgeting, saving, investing, and more.
              </p>
            </a>

            <a
              href="https://www.nerdwallet.com/"
              target="_blank"
              rel="noopener"
              class="block bg-white dark:bg-gray-800 rounded-xl shadow p-6 hover:shadow-lg transition focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
              <h3 class="text-lg font-semibold text-indigo-600 mb-1">NerdWallet</h3>
              <p class="text-gray-600 dark:text-gray-300 text-sm">
                Expert reviews & tools for managing credit cards, loans, and personal finance.
              </p>
            </a>

            <a
              href="https://www.moneyunder30.com/"
              target="_blank"
              rel="noopener"
              class="block bg-white dark:bg-gray-800 rounded-xl shadow p-6 hover:shadow-lg transition focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
              <h3 class="text-lg font-semibold text-indigo-600 mb-1">Money Under 30</h3>
              <p class="text-gray-600 dark:text-gray-300 text-sm">
                Clever, relatable advice on saving, investing, and building wealth in your 20s & 30s.
              </p>
            </a>

            <a
              href="https://www.consumerfinance.gov/"
              target="_blank"
              rel="noopener"
              class="block bg-white dark:bg-gray-800 rounded-xl shadow p-6 hover:shadow-lg transition focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
              <h3 class="text-lg font-semibold text-indigo-600 mb-1">CFPB</h3>
              <p class="text-gray-600 dark:text-gray-300 text-sm">
                Official consumer finance guides, tools, and resources from the U.S. government.
              </p>
            </a>
          </div>
        </section>
        
      </div>
    </section>
  </x-layout>