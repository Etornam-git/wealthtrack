<x-layout>
  <x-slot:pagename>
    Accounts
  </x-slot:pagename>

  <!-- Navigation Bar -->
  <nav class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <a href="/dashboard" 
           class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
          </svg>
          Back to Dashboard
        </a>
        <a href="/accounts/create" 
           class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg shadow-md transition focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
          New Account
      </a>
    </div>
  </div>
  </nav>

  <!-- Header Section -->
  <section class="text-center py-8 px-4">
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-3">Your Accounts</h1>
    <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
      Manage all your accounts in one place.
    </p>
  </section>

  <!-- Accounts Section -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if($accounts->count())
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($accounts as $account)
          <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <!-- Card Header -->
            <div class="relative">
              <div class="absolute top-4 right-4">
                <span class="px-3 py-1 text-sm font-medium rounded-full bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-400">
                  {{ $account->account_type }}
                </span>
              </div>
              <div class="p-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Account #{{ $account->account_number }}</h2>
              </div>
            </div>

            <!-- Account Details -->
            <div class="px-6 pb-4">
              <div class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                <div class="flex justify-between">
                  <span>Balance:</span>
                  <span class="font-medium">${{ number_format($account->balance, 2) }}</span>
                </div>
                <div class="flex justify-between">
                  <span>Account Holder:</span>
                  <span class="font-medium">{{ $account->first_name }}</span>
                </div>
        </div>
        </div>

            <!-- Action Buttons -->
            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-700">
              <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('accounts.show', $account->id) }}" 
                   class="flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200"
                   title="View Details">
                   <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                   </svg>
                   View
                </a>
                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          onclick="return confirm('Are you sure you want to delete this account?')"
                          class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-red-700 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 bg-red-50 dark:bg-red-900/50 rounded-lg border border-red-200 dark:border-red-800 hover:bg-red-100 dark:hover:bg-red-900/75 transition-colors duration-200"
                          title="Delete Account">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete
                  </button>
                </form>
              </div>
            </div>
        </div>
      @endforeach
      </div>
    @else
      <div class="text-center py-10">
        <p class="text-lg text-gray-500 dark:text-gray-400">
          You currently have no accounts.<br>Start by creating one!
        </p>
      </div>
    @endif
  </div>
</x-layout>