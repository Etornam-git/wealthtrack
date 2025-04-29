<x-layout>
  <x-slot:pagename>
    Dashboard
  </x-slot:pagename>

  <!-- Mobile Nav Toggle -->
  

  <div class="flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 p-6 space-y-6 hidden md:block">
      <div class="flex items-center">
        <span class="ml-3 text-2xl font-bold text-indigo-600 dark:text-indigo-400">WealthTrack</span>
      </div>
      <nav>
        <ul class="space-y-4">
          @foreach (['accounts' => 'Accounts', 'budgets' => 'Budgets', 'savings' => 'Savings'] as $route => $label)
            <li>
              <a href="/{{ $route }}" class="block px-4 py-2 rounded text-gray-800 dark:text-gray-100 hover:bg-indigo-600 hover:text-white transition">
                {{ $label }}
              </a>
            </li>
          @endforeach
        </ul>
      </nav>
    </aside>

    <!-- Main Dashboard Content -->
    <div class="flex-1 p-4 sm:p-6">
      <!-- Summary Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 mb-6">
        @foreach ([['Total Expenses', $totalExpenses], ['Budget Utilization','Budgets: '. $budget->count()], ['Savings', $totalSavings]] as [$title, $value])
          <div class="bg-white dark:bg-gray-700 p-4 sm:p-6 rounded-lg shadow-md animate-fadeInUp text-sm sm:text-base">
            <h3 class="text-gray-500 dark:text-gray-100 font-bold mb-2">{{ $title }}</h3>
            <p class="text-indigo-500 dark:text-indigo-400 text-xl font-bold">{{ $value }}</p>
          </div>
        @endforeach
      </div>

      <!-- Recent Transactions -->
      <div class="bg-white dark:bg-gray-700 p-4 sm:p-6 rounded-lg shadow-md animate-fadeInUp">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
          <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">Recent Transactions</h3>
          <a href="/transactions" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition text-sm">
            View All
          </a>
        </div>

        @if ($accounts->count() > 0)
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-sm">
              <thead>
                <tr>
                  <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Date</th>
                  <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Description</th>
                  <th class="px-4 py-2 hidden sm:table-cell text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Account</th>
                  <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Amount</th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($accounts as $account)
                  @foreach ($account->transactions->take(3) as $transaction)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                      <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $transaction->created_at }}</td>
                      <td class="px-4 py-2 whitespace-nowrap text-gray-800 dark:text-gray-300">{{ $transaction->description }}</td>
                      <td class="px-4 py-2 hidden sm:table-cell whitespace-nowrap text-gray-800 dark:text-gray-300">
                        <a href="{{ '/accounts/'.$account->id }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 underline">
                          {{ $account->account_number }}
                        </a>
                      </td>
                      <td class="px-4 py-2 whitespace-nowrap text-right text-gray-900 dark:text-gray-100">₵{{ number_format($transaction->amount, 2) }}</td>
                    </tr>
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <div class="text-center py-4">
            <p class="text-gray-500 dark:text-gray-400">No recent transactions available.</p>
          </div>
        @endif
      </div>

      <!-- Review Button -->
      <div class="flex items-center space-x-2 sm:space-x-4 mt-6">
        <a href="#depositModal" 
          class="inline-flex items-center bg-emerald-600 hover:bg-emerald-700 text-white px-3 sm:px-4 py-2 rounded-lg shadow-md transition text-sm sm:text-base">
          <span class="hidden sm:inline">+ Leave a review</span>
        </a>
      </div>

      <!-- Modal -->
      <div id="depositModal" class="fixed inset-0 bg-opacity-10 backdrop-blur-sm overflow-y-auto h-full w-full hidden target:flex items-center justify-center z-50 p-4 sm:p-6">
        <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-sm sm:max-w-lg w-full mx-auto overflow-y-auto">
          <div class="flex justify-between items-center p-4 sm:p-6 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Tell us what you think about the app</h3>
            <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 transition p-2">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </a>
          </div>

          <form action="{{ route('leave-a-review.review')}}" method="POST" class="p-4 sm:p-6">
            @csrf
            <div class="space-y-4">
              <div>
                <x-form-textarea 
                  for="review"
                  name="review"
                  id="review"
                  required
                  class="@error('review') border-red-500 @enderror min-h-[120px]"
                  placeholder="Comment on our app"
                >Review</x-form-textarea>
                <x-form-error name="review"></x-form-error>
              </div>
              <div class="flex items-center justify-end space-x-3 pt-6">
                <a href="#" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 rounded-lg transition text-sm font-medium">
                  Cancel
                </a>
                <x-form-button type="submit">
                  Submit Review
                </x-form-button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  
</x-layout>
