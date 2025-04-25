<x-layout>
    <x-slot:pagename>
      Savings Plans
    </x-slot:pagename>
  

    <div class="flex flex-col items-center justify-center mb-6 text-center">
      <h1 class="text-4xl font-extrabold text-gray-800 dark:text-gray-100 mb-2">Your savings</h1>
      <p class="text-lg text-gray-600 dark:text-gray-300">Manage all your savings in one place.</p>
    </div>
    <div class="py-2">
      <div class="flex items-center justify-between mb-6 px-4">
        <a href="/dashboard" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow transition duration-300">
          ← Back to Dashboard
        </a>
        <a href='/savings/create' class="bg-blue-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow transition duration-300">
          + Create New Account
        </a>
      </div>
    </div>
    <div class="max-w-7xl mx-auto px-6 py-10">
      <!-- Savings Plans Cards -->
      @if ($savings->isEmpty())
        <div class="text-center text-gray-600 dark:text-gray-300">
          <p class="text-lg">You currently have no savings plans. Start by creating one!</p>
        </div>
      @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach ($savings as $saving)
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $saving->planName }}</div>
            <div class="mt-2 text-gray-600 dark:text-gray-300">
              <p><strong>Desired Amount:</strong> ₵{{ number_format($saving->desiredAmount, 2) }}</p>
              <p><strong>Saved Amount:</strong> ₵{{ number_format($saving->savedAmount, 2) }}</p>
              <p><strong>Status:</strong> {{ ucfirst($saving->status) }}</p>
              <p><strong>Start Date:</strong> {{ $saving->start_date->format('d M, Y') }}</p>
              <p><strong>End Date:</strong> {{ $saving->end_date->format('d M, Y') }}</p>
            </div>
            <div class="mt-4 flex justify-between">
              <a href="{{ route('savings.show', $saving->id) }}" class="inline-block px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">View Details</a>
          @endforeach
        </div>
      @endif
    </div>
</x-layout>
                
