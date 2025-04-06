<x-layout>
    <x-slot:pagename>
      Account Details
    </x-slot:pagename>
  
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-xl rounded-2xl mt-6">
      <!-- Account Details -->
      <div class="mb-6 p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm">
        <div class="flex items-center justify-between mb-4">
          <h1 class="text-3xl font-bold text-gray-800">Account Details</h1>
          <a href="/accounts" class="text-blue-500 hover:text-blue-700 font-medium">Back to Accounts</a>
        </div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Account Information</h2>
        <div class="space-y-2">
          <p class="text-gray-700"><strong class="font-medium">Account Number:</strong> {{ $account->account_number }}</p>
          <p class="text-gray-700"><strong class="font-medium">Account Type:</strong> {{ $account->type }}</p>
          <p class="text-gray-700"><strong class="font-medium">Balance:</strong> ${{ number_format($account->balance, 2) }}</p>
          <p class="text-gray-700"><strong class="font-medium">Created On:</strong> {{ $account->created_at->format('F d, Y') }}</p>
        </div>
      </div>
  
      <!-- Action Buttons -->
      <div class="flex space-x-4 mb-6">
        <a href="{{ '/accounts/' . $account->id }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition duration-200 ease-in-out transform hover:scale-105">
          Edit Account
        </a>
        
        <form action="{{ route('accounts.destroy') }}" method="POST" class="inline-block ml-auto"
              onsubmit="return confirm('Are you sure you want to delete this account?');">
          @csrf
          @method('DELETE')
          <x-form-button type="submit">
            Delete Account
          </x-form-button>
        </form>
      </div>
  
      <!-- Transactions Section -->
      <div>
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Transactions</h3>
  
        @if($account->transactions->count() > 0)
          <table class="min-w-full border border-gray-200">
            <thead>
              <tr class="bg-gray-100">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600">Description</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600">Amount</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach($account->transactions as $transaction)
                <tr>
                  <td class="px-6 py-4">{{ $transaction->created_at }}</td>
                  <td class="px-6 py-4">{{ $transaction->description }}</td>
                  <td class="px-6 py-4 text-right">${{ number_format($transaction->amount, 2) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <p class="text-gray-500">No transactions found for this account.</p>
        @endif
      </div>
    </div>
  </x-layout>
  