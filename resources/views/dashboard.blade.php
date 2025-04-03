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
            'expenses' => 'Expenses', 
            'budgets' => 'Budgets', 
            'investments' => 'Investments', 
            'reports' => 'Reports', 
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
          ['Total Expenses', '$4,230'],
          ['Budget Utilization', '76%'],
          ['Investments', '$12,500']
        ] as [$title, $value])
          <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md animate-fadeInUp">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">{{ $title }}</h3>
            <p class="text-2xl font-semibold text-indigo-600">{{ $value }}</p>
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
        <div class="space-y-4">
          <h3 class="font-bold text-gray-800 dark:text-gray-100">Recent Transactions</h3>
          <div class="flex justify-end">
            <a href="/transactions" class="px-4 py-2 rounded text-gray-800 dark:text-gray-100 hover:bg-indigo-600 hover:text-white transition">
              All transactions
            </a>
          </div>
        </div>

        @forelse ($transactions as $transaction)
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
              <thead>
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($transactions as $transaction)
                  <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $transaction->created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">{{ $transaction->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-right">${{ number_format($transaction->amount, 2) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @empty
          <div class="text-center py-4">
            <p class="text-gray-500 dark:text-gray-400">No recent transactions available.</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</x-layout>
