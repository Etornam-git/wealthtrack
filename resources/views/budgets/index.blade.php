<x-layout>
    <x-slot:pagename>
      Budgets
    </x-slot:pagename>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <!-- Navigation Bar -->
      <nav class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50 mb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between items-center h-16">
            <a href="/dashboard" 
               class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
              </svg>
              Back to Dashboard
            </a>
            <a href="{{ route('budgets.create') }}" 
               class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg shadow-md transition focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
              </svg>
              New Budget
            </a>
          </div>
        </div>
      </nav>

      <!-- Header Section -->
      <section class="text-center py-8 px-4">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-3">Your Budgets</h1>
        <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
          Track and manage your spending goals.
        </p>
      </section>

      @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 dark:bg-emerald-900/20 border-l-4 border-emerald-500">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm text-emerald-700 dark:text-emerald-300">
                {{ session('success') }}
              </p>
            </div>
          </div>
        </div>
      @endif

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($budgets as $budget)
          <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <!-- Card Header -->
            <div class="relative">
              <div class="absolute top-4 right-4">
                <span class="px-3 py-1 text-sm font-medium rounded-full 
                  {{ $budget->status === 'active' ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-400' : 
                     ($budget->status === 'completed' ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/50 dark:text-blue-400' : 
                     'bg-amber-50 text-amber-700 dark:bg-amber-900/50 dark:text-amber-400') }}">
                  {{ ucfirst($budget->status) }}
                </span>
              </div>
              <div class="p-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $budget->category }}</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ ucfirst($budget->period) }}</p>
              </div>
            </div>

            <!-- Progress Bar -->
            <div class="px-6 pb-4">
              <div class="mb-4">
                <div class="flex justify-between items-baseline mb-2">
                  <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Progress</span>
                  <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ number_format($budget->progress_percentage, 1) }}%</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                  <div class="bg-indigo-600 h-2 rounded-full transition-all duration-500" style="width: {{ min($budget->progress_percentage, 100) }}%"></div>
                </div>
              </div>

              <!-- Budget Details -->
              <div class="space-y-3">
                <div class="flex justify-between items-center">
                  <span class="text-sm text-gray-500 dark:text-gray-400">Budget</span>
                  <span class="text-lg font-semibold text-gray-900 dark:text-white">₵{{ number_format($budget->amount, 2) }}</span>
                </div>
                <div class="flex justify-between items-center">
                  <span class="text-sm text-gray-500 dark:text-gray-400">Remaining</span>
                  <span class="text-lg font-semibold {{ $budget->remaining_amount < 0 ? 'text-red-600 dark:text-red-400' : 'text-emerald-600 dark:text-emerald-400' }}">
                    ₵{{ number_format($budget->remaining_amount, 2) }}
                  </span>
                </div>
                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                  <span>{{ \Carbon\Carbon::parse($budget->start_date)->format('M d, Y') }}</span>
                  <span>{{ \Carbon\Carbon::parse($budget->end_date)->format('M d, Y') }}</span>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-700">
              <div class="grid grid-cols-3 gap-2">
                <a href="{{ route('budgets.show', $budget) }}" 
                   class="flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200"
                   title="View Details">
                   <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                   </svg>
                   View
                </a>
                <a href="{{ route('budgets.edit', $budget) }}" 
                   class="flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200"
                   title="Edit Budget">
                   <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                   </svg>
                   Edit
                </a>
                <form action="{{ route('budgets.destroy', $budget) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          onclick="return confirm('Are you sure you want to delete this budget?')"
                          class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-red-700 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 bg-red-50 dark:bg-red-900/50 rounded-lg border border-red-200 dark:border-red-800 hover:bg-red-100 dark:hover:bg-red-900/75 transition-colors duration-200"
                          title="Delete Budget">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete
                  </button>
                </form>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-full">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center">
              <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
              <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">No budgets found</h3>
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Create your first budget to start tracking your expenses!
              </p>
            </div>
          </div>
        @endforelse
      </div>
    </div>
</x-layout>
