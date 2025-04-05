<x-layout>
  <x-slot:pagename>
    Create Account
  </x-slot:pagename>
  <div class="py-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Accounts</h1>
  
    @if($accounts->count())
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($accounts as $account)
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transform transition duration-300 hover:scale-105 animate-fadeInUp">
            <p class="text-lg font-semibold mb-2">Account #: {{ $account->account_number }}</p>
            <p class="text-gray-600 dark:text-gray-300 mb-2">Balance: ${{ number_format($account->balance, 2) }}</p>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Name: {{ $account->first_name }}</p>
            <a href="{{ url('/accounts/' . $account->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition duration-300">
              View Details
            </a>
          </div>
        @endforeach
      </div>
    @else
      <div class="flex flex-col items-center justify-center py-16">
        <p class="text-gray-700 dark:text-gray-300 text-xl mb-6">No accounts found. Please create a new account.</p>
        <a href="{{ url('/accounts/create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow transition duration-300">
          Create Account
        </a>
      </div>
    @endif
  </div>
  

</x-layout>