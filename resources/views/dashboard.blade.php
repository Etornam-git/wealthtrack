<x-layout>
  <x-slot:pagename>
    Dashboard
  </x-slot:pagename>

  <div class="flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 p-6 space-y-6">
      <div class="flex items-center">
        <span class="ml-3 text-2xl font-bold text-indigo-600 dark:text-indigo-400">WealthTrack</span>
      </div>
      <nav>
        <ul class="space-y-4">
          @foreach ([
            'accounts' => 'Accounts', 
            'budgets' => 'Budgets', 
            'investments' => 'Investments', 
            'settings' => 'Settings'
          ] as $route => $label)
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
    <div class="flex-1 p-6">
      <!-- Top Summary Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        @foreach ([
          ['Total Expenses', sum($transactions)],
          ['Budget Utilization','Budgets: '. $budget->count()],
          ['Investments', '₵12,500']
        ] as [$title, $value])
          <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md animate-fadeInUp">
            <h3 class="text-lg font-bold text-gray-400 dark:text-gray-100 mb-2">{{ $title }}</h3>
            <p class="text-2xl font-bold text-indigo-400">{{ $value }}</p>
          </div>
        @endforeach
      </div>

      <!-- Chart / Graph Placeholder -->
      <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md mb-8 animate-fadeInUp">
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">Monthly Expenses</h3>
        <div class="h-64 bg-gray-200 dark:bg-gray-600 rounded-md flex items-center justify-center">
          <span class="text-gray-600 dark:text-gray-200">Chart Placeholder</span>
        </div>
      </div>

      <!-- Recent Transactions Table -->
      <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md animate-fadeInUp">
        <div class="space-y-6">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">Recent Transactions</h3>
            <a href="/transactions" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
              View All
            </a>
          </div>
        </div>

        @if ($accounts->count() > 0)

          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
              <thead>
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Account</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($accounts as $account)
                  @foreach ($account->transactions->take(3) as $transaction)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $transaction->created_at }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">{{ $transaction->description }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                        <a href="{{ '/accounts/'.$account->id }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 underline">
                        {{ $account->account_number }}
                        </a>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-right">₵{{ number_format($transaction->amount, 2) }}</td>
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
    </div>
  </div>
</x-layout>
