<x-layout>
    <x-slot:pagename>
      Create Account
    </x-slot:pagename>
  
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-8 mt-10 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Open New Account</h2>
  
      <form action="{{ url('/accounts') }}" method="POST" class="space-y-6">
        @csrf
  
        <div>
          <x-form-label for="first_name">First Name</x-form-label>
          <x-form-input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" required  />
          
        </div>
        <x-form-error name="first_name" />
  
        <div>
          <x-form-label for="last_name" >Last Name</x-form-label>
          <x-form-input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" 
           required />
        </div>
        <x-form-error name="last_name" />
  
        <div>
          <x-form-label for="account_type" >Account Type</x-form-label>
          <x-form-select
            name="account_type"
            label="Account Type"
            :options="[
                'savings' => 'Savings Account',
                'current' => 'Current Account',
                'fixed_deposit' => 'Fixed Deposit Account',
                'investment' => 'Investment Account'
            ]"
            required
            :error="$errors->first('account_type')"
            :selected="old('account_type')"
          />
        </div>
        <x-form-error name="account_type" />
        
        <div>
          <x-form-label for="email" >Email</x-form-label>
          <x-form-input type="email" name="email" id="email"  required  value="{{ $user->email }}"/>
        </div>
        <x-form-error name="email" />

        <div>
          <x-form-label for="password" ></x-form-label>
          <x-form-input id="password" name="password" type="password" required  placeholder="Password" />
        </div>
        <x-form-error name="password" />

        <!-- Confirm Password Field -->
        <div>
          <x-form-label for="password_confirmation" class="sr-only"></x-form-label>
          <x-form-input id="password_confirmation" 
            name="password_confirmation" type="password" required placeholder="Confirm Password" />
        </div>
        <x-form-error name="password" />
  
        <div class="flex justify-end">
          <x-form-button type="submit" >
            Create Account
          </x-form-button>
        </div>
      </form>
    </div>
  </x-layout>
  