<x-layout>
    <x-slot:pagename>
      New Account Settings
    </x-slot:pagename>
  
    <div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Update Account Details</h2>
  
      <form action="{{ route('accounts.update', $account) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')
        <div>
          <x-form-label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">First Name</x-form-label>
          <x-form-input type="text" name="name" id="name" value="{{ old('first_name', $account->first_name) }}" required />
          <x-form-error name="first_name" />
        </div>

        <div>
            <x-form-label for="name" >Last Name</x-form-label>
            <x-form-input type="text" name="last_name" id="name" value="{{ old('name', $account->last_name) }}" required />
            <x-form-error name="last_name" />
        </div>

        <div>
            <x-form-label for="email" >New Email</x-form-label>
            <x-form-input type="email" name="email" id="email" value="{{ old('email', $account->email) }}" required />
            <x-form-error name="email" />
        </div>
  
        <!-- Account Type -->
        <div>
          <x-form-label for="type" >Account Type</x-form-label>
          <select name="type" id="type"
                  class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                  required>
            <option value="savings" {{ $account->type === 'savings' ? 'selected' : '' }}>Savings</option>
            <option value="checking" {{ $account->type === 'checking' ? 'selected' : '' }}>Checking</option>
            <option value="investment" {{ $account->type === 'investment' ? 'selected' : '' }}>Investment</option>
          </select>
          <x-form-error name="account_type" />
        </div>
  
        <!-- Submit Button -->
        <div class="flex justify-between items-center">
          <a href="{{ route('accounts.index') }}" class="text-sm text-indigo-600 hover:underline">← Back to Accounts</a>
          <x-form-button type="submit">Save Changes</x-form-button>
        </div>
      </form>
    </div>
  </x-layout>
  