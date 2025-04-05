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
  
        <div>
          <x-form-label for="last_name" >Last Name</x-form-label>
          <x-form-input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" 
           required />
        </div>
  
        <div>
          <x-form-label for="account_type" >Account Type</x-form-label>
          <select name="account_type" id="account_type"  required >
            <option value="">Select type</option>
            <option value="savings">Savings</option>
            <option value="current">Current</option>
            <option value="investment">Investment</option>
          </select>
        </div>
  
        <div>
          <x-form-label for="balance" >Initial Balance</x-form-label>
          <x-form-input type="number" name="balance" id="balance"  required placeholder="Initial Balance" />
        </div>
  
        <div>
          <x-form-label for="email" >Email</x-form-label>
          <x-form-input type="email" name="email" id="email"  required  value="{{ $user->email }}"/>
        </div>
  
        <div class="flex justify-end">
          <button type="submit" >
            Create Account
          </button>
        </div>
      </form>
    </div>
  </x-layout>
  