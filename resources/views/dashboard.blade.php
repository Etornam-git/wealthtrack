<x-layout>
    <x-slot:pagename>
      Dashboard
    </x-slot:pagename>
  
    <div class="flex flex-col md:flex-row">
      <!-- Sidebar -->
      <aside class="w-full md:w-64 bg-gray-100 dark:bg-gray-800 p-6 space-y-6">
        <div class="flex items-center">
          <img class="h-10 w-10" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="WealthTrack Logo">
          <span class="ml-3 text-2xl font-bold text-indigo-600 dark:text-indigo-400">WealthTrack</span>
        </div>
        <nav>
          <ul class="space-y-4">
            <li>
              <a href="/dashboard" class="block px-4 py-2 rounded text-gray-800 dark:text-gray-100 hover:bg-indigo-600 hover:text-white transition">
                Dashboard
              </a>
            </li>
            <li>
              <a href="/expenses" class="block px-4 py-2 rounded text-gray-800 dark:text-gray-100 hover:bg-indigo-600 hover:text-white transition">
                Expenses
              </a>
            </li>
            <li>
              <a href="/budgets" class="block px-4 py-2 rounded text-gray-800 dark:text-gray-100 hover:bg-indigo-600 hover:text-white transition">
                Budgets
              </a>
            </li>
            <li>
              <a href="/investments" class="block px-4 py-2 rounded text-gray-800 dark:text-gray-100 hover:bg-indigo-600 hover:text-white transition">
                Investments
              </a>
            </li>
            <li>
              <a href="/reports" class="block px-4 py-2 rounded text-gray-800 dark:text-gray-100 hover:bg-indigo-600 hover:text-white transition">
                Reports
              </a>
            </li>
            <li>
              <a href="/settings" class="block px-4 py-2 rounded text-gray-800 dark:text-gray-100 hover:bg-indigo-600 hover:text-white transition">
                Settings
              </a>
            </li>
          </ul>
        </nav>
      </aside>
  
      <!-- Main Content -->
      <div class="flex-1 p-6">
        <!-- Top Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
          <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md animate-fadeInUp">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">Total Expenses</h3>
            <p class="text-2xl font-semibold text-indigo-600">$4,230</p>
          </div>
          <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md animate-fadeInUp delay-200">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">Budget Utilization</h3>
            <p class="text-2xl font-semibold text-indigo-600">76%</p>
          </div>
          <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md animate-fadeInUp delay-400">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">Investments</h3>
            <p class="text-2xl font-semibold text-indigo-600">$12,500</p>
          </div>
        </div>
  
        <!-- Chart / Graph Placeholder -->
        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md mb-8 animate-fadeInUp delay-600">
          <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">Monthly Expenses</h3>
          <div class="h-64 bg-gray-200 dark:bg-gray-600 rounded-md flex items-center justify-center">
            <span class="text-gray-600 dark:text-gray-200">Chart Placeholder</span>
          </div>
        </div>
  
        <!-- Recent Transactions Table -->
        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md animate-fadeInUp delay-800">
          <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">Recent Transactions</h3>
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
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">2025-03-29</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">Grocery Shopping</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-right">-$120.50</td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">2025-03-28</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">Utility Bill</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-right">-$75.00</td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">2025-03-27</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">Dining Out</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-right">-$45.25</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </x-layout>
  