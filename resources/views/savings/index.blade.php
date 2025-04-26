<x-layout>
  <x-slot:pagename>
    Savings Plans
  </x-slot:pagename>

  <!-- Navigation Bar -->
  <nav class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <a href="/dashboard" 
           class="text-gray-800 dark:text-gray-100 font-bold text-lg hover:text-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded transition">
          ← Dashboard
        </a>
        <a href="/savings/create" 
           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg shadow-md transition focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
          + New Plan
        </a>
      </div>
    </div>
  </nav>

  <!-- Header Section -->
  <section class="text-center py-8 px-4">
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-3">Your Savings</h1>
    <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
      Manage all your saving goals in one place.
    </p>
  </section>

  <!-- Savings Plans Section -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if ($savings->isEmpty())
      <div class="text-center py-10">
        <p class="text-lg text-gray-500 dark:text-gray-400">
          You currently have no savings plans.<br>Start by creating one!
        </p>
      </div>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($savings as $saving)
          <div class="flex flex-col bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
            <div class="p-6 flex-1">
              <div class="flex justify-between items-start mb-4">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $saving->planName }}</h2>
                <span class="px-3 py-1 text-xs font-bold rounded-full 
                  {{ $saving->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                  {{ ucfirst($saving->status) }}
                </span>
              </div>
              <div class="space-y-2 text-gray-600 dark:text-gray-300">
                <p><strong>Target:</strong> ₵{{ number_format($saving->desiredAmount, 2) }}</p>
                <p><strong>Saved:</strong> ₵{{ number_format($saving->savedAmount, 2) }}</p>
                <p><strong>Start:</strong> {{ $saving->start_date }}</p>
                <p><strong>End:</strong> {{ $saving->end_date }}</p>
              </div>
            </div>
            <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 flex flex-col sm:flex-row sm:justify-between gap-3">
              <a href="{{ route('savings.show', $saving->id) }}" 
                 class="w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-medium shadow-md transition focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2" 
                 aria-label="View Savings Plan">
                View
              </a>
              <a href="{{ route('savings.edit', $saving->id) }}" 
                 class="w-full text-center bg-yellow-500 hover:bg-yellow-600 text-white py-2 rounded-lg font-medium shadow-md transition focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2" 
                 aria-label="Edit Savings Plan">
                Edit
              </a>
              <form action="{{ route('savings.destroy', $saving->id) }}" method="POST" class="w-full">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Are you sure you want to delete this savings plan?')"
                        class="w-full text-center bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg font-medium shadow-md transition focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2"
                        aria-label="Delete Savings Plan">
                  Delete
                </button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</x-layout>
