<x-layout>
    <x-slot:pagename>
      Transactions
    </x-slot:pagename>
  
    <div class="max-w-7xl mx-auto px-6 py-10">
      <!-- Transactions Table -->
      <div class="mb-12">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">All Transactions for {{ $user->id }}</h2>
        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
              <tr>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Created At</th>
              </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
              @foreach($transactions as $transaction)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-right">${{ number_format($transaction->amount, 2) }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ ucfirst($transaction->transaction_type) }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">{{ $transaction->description }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $transaction->created_at->format('Y-m-d') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  
      <!-- New Transaction Form -->
      <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Add New Transaction</h2>
        <form action="/transactions" method="POST" class="space-y-6">
          @csrf
          <div>
            <x-form-label for="amount" >Amount</x-form-label>
            <x-form-input type="number" name="amount" id="amount" required placeholder="Enter amount" />
          </div>
          <div>
            <x-form-label for="transaction_type" >Transaction Type</x-form-label>
            <x-form-input type="text" name="transaction_type" id="transaction_type" required placeholder="Deposit, Withdrawal, etc."  />
          </div>
          <div>
            <x-form-label for="description" >Description</x-form-label>
            <x-form-textarea name="description" id="description" rows="3" 
              placeholder="Enter a brief description"></x-form-textarea>
          </div>
          <div>
            <button type="submit"
              class="flex justify-center py-3 px-4 border border-transparent rounded-md shadow-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm font-medium transition duration-300">
              Submit Transaction
            </button>
          </div>
        </form>
      </div>
    </div>
  </x-layout>
  