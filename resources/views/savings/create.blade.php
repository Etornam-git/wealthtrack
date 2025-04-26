<x-layout>
    <x-slot:pagename>
      Create Savings Plan
    </x-slot:pagename>
  
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-8 mt-10 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Create New Savings Plan</h2>

      @if(session('error'))
          <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded relative" role="alert">
              <strong class="font-bold">Error!</strong>
              <span class="block sm:inline">{{ session('error') }}</span>
          </div>
      @endif

      @if(session('success'))
          <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
              <strong class="font-bold">Success!</strong>
              <span class="block sm:inline">{{ session('success') }}</span>
          </div>
      @endif
  
      <form action="{{ route('savings.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
          <x-form-label for="planName">Plan Name</x-form-label>
          <x-form-input 
            type="text" 
            name="planName" 
            id="planName" 
            value="{{ old('planName') }}" 
            required 
            maxlength="255"
            class="@error('planName') border-red-500 @enderror"
          />
          <x-form-error name="planName"></x-form-error>
        </div>
  
        <div>
          <x-form-label for="account_id">Select Account</x-form-label>
          <select 
            name="account_id"       
            id="account_id" 
            required
            class="w-full rounded-md border-gray-300 @error('account_id') border-red-500 @enderror"
          >
            <option value="">Choose an account</option>
            @foreach ($accounts as $account)
              <option value="{{ $account->id }}" {{ old('account_id') == $account->id ? 'selected' : '' }}>
                {{ $account->account_number }} (Balance: ₵{{ number_format($account->balance, 2) }})
              </option>
            @endforeach
          </select>
          <x-form-error name="account_id"></x-form-error>
        </div>
  
        <div>
          <x-form-label for="desiredAmount">Target Amount (₵)</x-form-label>
          <x-form-input 
            type="number" 
            name="desiredAmount" 
            id="desiredAmount" 
            step="0.01" 
            min="0.01"
            max="999999999.99"
            value="{{ old('desiredAmount') }}" 
            required 
            class="@error('desiredAmount') border-red-500 @enderror"
          />
          <x-form-error name="desiredAmount"></x-form-error>
        </div>
  
        <div>
          <x-form-label for="regularity">Saving Regularity</x-form-label>
          <select 
            name="regularity" 
            id="regularity" 
            required
            class="w-full rounded-md border-gray-300 @error('regularity') border-red-500 @enderror"
          >
            <option value="">Select interval</option>
            <option value="daily" {{ old('regularity') == 'daily' ? 'selected' : '' }}>Daily</option>
            <option value="weekly" {{ old('regularity') == 'weekly' ? 'selected' : '' }}>Weekly</option>
            <option value="biweekly" {{ old('regularity') == 'biweekly' ? 'selected' : '' }}>Biweekly</option>
            <option value="monthly" {{ old('regularity') == 'monthly' ? 'selected' : '' }}>Monthly</option>
            <option value="quarterly" {{ old('regularity') == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
            <option value="yearly" {{ old('regularity') == 'yearly' ? 'selected' : '' }}>Yearly</option>
          </select>
          <x-form-error name="regularity"></x-form-error>
        </div>
  
        <div>
          <x-form-label for="amount_per_interval">Amount Per Interval (₵)</x-form-label>
          <x-form-input 
            type="number" 
            step="0.01" 
            name="amount_per_interval" 
            id="amount_per_interval" 
            min="0.01"
            max="999999999.99"
            value="{{ old('amount_per_interval') }}"
            class="@error('amount_per_interval') border-red-500 @enderror"
          />
          <p class="text-gray-600 dark:text-gray-400 text-xs mt-1">
            Leave empty for manual savings or enter amount for scheduled savings
          </p>
          <x-form-error name="amount_per_interval"></x-form-error>
        </div>
  
        <div>
          <x-form-label for="start_date">Start Date</x-form-label>
          <x-form-input 
            type="date" 
            name="start_date" 
            id="start_date" 
            value="{{ old('start_date', date('Y-m-d')) }}" 
            required 
            class="@error('start_date') border-red-500 @enderror"
          />
          <x-form-error name="start_date"></x-form-error>
        </div>
  
        <div>
          <x-form-label for="end_date">End Date</x-form-label>
          <x-form-input 
            type="date" 
            name="end_date" 
            id="end_date" 
            value="{{ old('end_date', date('Y-m-d', strtotime('+1 day'))) }}" 
            required 
            class="@error('end_date') border-red-500 @enderror"
          />
          <x-form-error name="end_date"></x-form-error>
        </div>
  
        <div>
          <x-form-label for="automatic">Automatic Saving</x-form-label>
          <label class="inline-flex items-center space-x-2">
            <input 
              type="checkbox" 
              name="automatic" 
              id="automatic" 
              value="1" 
              {{ old('automatic') ? 'checked' : '' }}
              class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            >
            <span class="text-gray-700 dark:text-gray-300">Enable automatic savings</span>
          </label>
          <p class="text-gray-600 dark:text-gray-400 text-xs mt-1">
            When enabled, the specified amount will be automatically saved at the chosen interval
          </p>
          <x-form-error name="automatic"></x-form-error>
        </div>
  
        <div>
          <x-form-label for="description">Description (optional)</x-form-label>
          <textarea 
            name="description" 
            id="description" 
            rows="4" 
            maxlength="1000"
            class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-100 @error('description') border-red-500 @enderror"
          >{{ old('description') }}</textarea>
          <p class="text-gray-600 dark:text-gray-400 text-xs mt-1">
            Maximum 1000 characters
          </p>
          <x-form-error name="description"></x-form-error>
        </div>
  
        <div class="flex justify-end">
          <x-form-button type="submit">
            Create Savings Plan
          </x-form-button>
        </div>
      </form>
    </div>
  </x-layout>
  