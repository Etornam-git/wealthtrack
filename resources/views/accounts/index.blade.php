<x-layout>
    <x-slot:pagename>
      Create Account
    </x-slot:pagename>
  
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-8 mt-10 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Open New Account</h2>
  
      <form action="{{ url('/accounts') }}" method="POST" class="space-y-6">
        @csrf
  
        <div>
          <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
          <input type="text" name="first_name" id="first_name" class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
        </div>
  
        <div>
          <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
          <input type="text" name="last_name" id="last_name" class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
        </div>
  
        <div>
          <label for="account_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Account Type</label>
          <select name="account_type" id="account_type" class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
            <option value="">Select type</option>
            <option value="savings">Savings</option>
            <option value="current">Current</option>
            <option value="investment">Investment</option>
          </select>
        </div>
  
        <div>
          <label for="balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Initial Balance</label>
          <input type="number" name="balance" id="balance" class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
        </div>
  
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
          <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
        </div>
  
        <div class="flex justify-end">
          <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
            Create Account
          </button>
        </div>
      </form>
    </div>
  </x-layout>
  