<x-layout>
  <x-slot:pagename>
    Create Account
  </x-slot:pagename>

  <div class="flex flex-col items-center justify-center mb-6 text-center">
    <h1 class="text-4xl font-extrabold text-gray-800 dark:text-gray-100 mb-2">Your Accounts</h1>
    <p class="text-lg text-gray-600 dark:text-gray-300">Manage all your accounts in one place.</p>
  </div>
  <div class="py-2">
    <div class="flex items-center justify-end mb-6 px-4">
      <a href='/accounts/create' class="bg-blue-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow transition duration-300">
        + Create New Account
      </a>
    </div>
  </div>
    
    @if($accounts->count())
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($accounts as $account)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold text-lg p-3 rounded-t-xl">
          {{ $account->account_type }} account.
        </div>
        <div class="mt-4">
          <p class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-1">Account #: {{ $account->account_number }}</p>
          <p class="text-gray-600 dark:text-gray-300 mb-1">Balance: ${{ number_format($account->balance, 2) }}</p>
          <p class="text-gray-600 dark:text-gray-300 mb-4">Name: {{ $account->first_name }}</p>
        </div>
        <a href="{{ url('/accounts/' . $account->id) }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow-md transition-all duration-300">
          View Details
        </a>
        </div>
      @endforeach
      </div>
    @else
      <div class="flex flex-col items-center justify-center py-16">
        <p class="text-gray-700 dark:text-gray-300 text-xl mb-6">No accounts found. Please create a new account.</p>
        <a href="{{ url('/accounts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow transition duration-300">
          Create Account
        </a>
      </div>
    @endif
  </div>
  

</x-layout>