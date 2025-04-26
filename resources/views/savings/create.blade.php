<x-layout>
    <x-slot:pagename>
      Create Savings Plan
    </x-slot:pagename>
  
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-8 mt-10 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Create New Savings Plan</h2>
  
      <form action="{{ route('savings.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
          <x-form-label for="planName">Plan Name</x-form-label>
          <x-form-input type="text" name="planName" id="planName" value="{{ old('planName') }}" required />
        </div>
        <x-form-error name="planName" />
  
        <div>
          <x-form-label for="account_id">Select Account</x-form-label>
          <select name="account_id" id="account_id" required>
            <option value="">Choose an account</option>
            @foreach ($accounts as $account)
              <option value="{{ $account->id }}" {{ old('account_id') == $account->id ? 'selected' : '' }}>
                {{ $account->account_number }}
              </option>
            @endforeach
          </select>
        </div>
        <x-form-error name="account_id" />
  
        <div>
          <x-form-label for="desiredAmount">Target Amount (₵)</x-form-label>
          <x-form-input type="number" name="desiredAmount" id="desiredAmount" step="0.01" value="{{ old('desiredAmount') }}" required />
        </div>
        <x-form-error name="desiredAmount" />
  
        <div>
          <x-form-label for="regularity">Saving Regularity</x-form-label>
          <select name="regularity" id="regularity" required>
            <option value="">Select interval</option>
            <option value="daily" {{ old('regularity') == 'daily' ? 'selected' : '' }}>Daily</option>
            <option value="weekly" {{ old('regularity') == 'weekly' ? 'selected' : '' }}>Weekly</option>
            <option value="biweekly" {{ old('regularity') == 'biweekly' ? 'selected' : '' }}>Biweekly</option>
            <option value="monthly" {{ old('regularity') == 'monthly' ? 'selected' : '' }}>Monthly</option>
            <option value="quarterly" {{ old('regularity') == 'quarterly' ? 'selected' : '' }}>Quartely</option>
            <option value="yearly" {{ old('regularity') == 'yearly' ? 'selected' : '' }}>Yearly</option>

          </select>
        </div>
        <x-form-error name="regularity" />
  
        <div>
          <x-form-label for="amount_per_interval">Amount Per Interval (₵)</x-form-label>
          <x-form-input type="number" step="0.01" name="amount_per_interval" id="amount_per_interval" value="{{ old('amount_per_interval') }}" />
        </div>
        <x-form-error name="amount_per_interval" />
  
        <div>
          <x-form-label for="start_date">Start Date</x-form-label>
          <x-form-input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required />
        </div>
        <x-form-error name="start_date" />
  
        <div>
          <x-form-label for="end_date">End Date</x-form-label>
          <x-form-input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required />
        </div>
        <x-form-error name="end_date" />
  
        <div>
          <x-form-label for="automatic">Automatic Saving</x-form-label>
          <label class="inline-flex items-center space-x-2">
            <input type="checkbox" name="automatic" id="automatic" value="1" {{ old('automatic') ? 'checked' : '' }}>
            <span class="text-gray-700 dark:text-gray-300">Enable</span>
          </label>
        </div>
        <x-form-error name="automatic" />
  
        <div>
          <x-form-label for="description">Description (optional)</x-form-label>
          <textarea name="description" id="description" rows="4" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-100">{{ old('description') }}</textarea>
        </div>
        <x-form-error name="description" />
  
        <div class="flex justify-end">
          <x-form-button type="submit">
            Create Savings Plan
          </x-form-button>
        </div>
      </form>
    </div>
  </x-layout>
  