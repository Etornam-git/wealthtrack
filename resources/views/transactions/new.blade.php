<x-layout>
  <x-slot:pagename>
    New Transaction
  </x-slot:pagename>
  <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg max-w-lg mx-auto">
    <div class="flex justify-between items-center mb-6">
      <a href="/transactions" class="inline-block px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">Back</a>
      <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">New Transaction</h2>
    </div>
    <form action="/transactions" method="POST" class="space-y-6">
      @csrf
      <div>
        <x-form-label for="amount"></x-form-label>
        <x-form-input type="number" name="amount" id="amount" required placeholder="Enter amount" />
      </div>
      <x-form-error name="amount" />

      <div>
        <x-form-label for="account_id"></x-form-label>
        <select name="account_id" id="account_id" required>
          <option value="">Select Account</option>
          @foreach ($accounts as $account)
            <option value="{{ $account->id }}">{{ $account->account_number }}</option>
          @endforeach
        </select>
      </div>
      <x-form-error name="account_id" />

      <div>
        <select name="transaction_type" id="transaction_type" required>
          <option value="">Select Transaction Type</option>
          <option name="deposit" value="deposit">Deposit</option>
          <option name="withdrawal" value="withdrawal">Withdrawal</option>
        </select>
      </div>
      <x-form-error name="transaction_type" />

      <div>
        <x-form-label for="description"></x-form-label>
        <x-form-textarea name="description" id="description" rows="3" placeholder="Enter a brief description(optional)"></x-form-textarea>
      </div>

      <div>
        <button type="submit"
          class="flex justify-center py-3 px-4 border border-transparent rounded-md shadow-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm font-medium transition duration-300">
          Submit Transaction
        </button>
      </div>
    </form>
  </div>
</x-layout>
