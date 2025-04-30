<x-layout>
    <x-slot:pagename>Create New Savings Plan</x-slot:pagename>

    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Create New Savings Plan</h2>
            <a href="{{ route('savings.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                Back to Savings
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800 dark:text-red-200">There were errors with your submission</h3>
                        <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('savings.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <x-form-label for="name">Plan Name</x-form-label>
                <x-form-input type="text" name="name" id="name" required 
                    value="{{ old('name') }}" />
                <x-form-error name="name" />
            </div>

            <x-form-select
                name="account_id"
                label="Select Account"
                :options="$accounts->mapWithKeys(function($account) {
                    return [$account->id => $account->first_name . ' - ' . $account->account_number];
                })"
                required
                :error="$errors->first('account_id')"
            />

            <div>
                <x-form-label for="target_amount">Target Amount</x-form-label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 dark:text-gray-400 sm:text-sm">₵</span>
                    </div>
                    <x-form-input type="number" name="target_amount" id="target_amount" step="0.01" min="0" required 
                        value="{{ old('target_amount') }}" class="pl-7" />
                </div>
                <x-form-error name="target_amount" />
            </div>

            <x-form-select
                name="regularity"
                label="Saving Regularity"
                :options="['daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly']"
                required
                :error="$errors->first('regularity')"
                :selected="old('regularity')"
            />

            <div>
                <x-form-label for="amount_per_interval">Amount per Interval</x-form-label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 dark:text-gray-400 sm:text-sm">₵</span>
                    </div>
                    <x-form-input type="number" name="amount_per_interval" id="amount_per_interval" step="0.01" min="0" required 
                        value="{{ old('amount_per_interval') }}" class="pl-7" />
                </div>
                <x-form-error name="amount_per_interval" />
            </div>

            <div class="flex justify-end">
                <x-form-button type="submit">
                    Create Savings Plan
                </x-form-button>
            </div>
        </form>
    </div>
</x-layout>
  