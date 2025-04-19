<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">My Budgets</h2>
                <a href="{{ route('budgets.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    Create New Budget
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($budgets as $budget)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $budget->category }}</h3>
                                    <p class="text-sm text-gray-500">{{ ucfirst($budget->period) }}</p>
                                </div>
                                <span class="px-2 py-1 text-sm rounded-full {{ $budget->status === 'active' ? 'bg-green-100 text-green-800' : ($budget->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ ucfirst($budget->status) }}
                                </span>
                            </div>

                            <div class="mb-4">
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Progress</span>
                                    <span>{{ number_format($budget->progress_percentage, 1) }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: {{ min($budget->progress_percentage, 100) }}%"></div>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Budget</span>
                                    <span class="font-semibold">${{ number_format($budget->amount, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Remaining</span>
                                    <span class="font-semibold {{ $budget->remaining_amount < 0 ? 'text-red-600' : 'text-green-600' }}">
                                        ${{ number_format($budget->remaining_amount, 2) }}
                                    </span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>{{ \Carbon\Carbon::parse($budget->start_date)->format('M d, Y') }}</span>
                                    <span>{{ \Carbon\Carbon::parse($budget->end_date)->format('M d, Y') }}</span>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-end space-x-2">
                                <a href="{{ route('budgets.show', $budget) }}" class="text-blue-500 hover:text-blue-700">
                                    View Details
                                </a>
                                <a href="{{ route('budgets.edit', $budget) }}" class="text-gray-500 hover:text-gray-700">
                                    Edit
                                </a>
                                <form action="{{ route('budgets.destroy', $budget) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this budget?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                            <p class="text-gray-500">No budgets found. Create your first budget to start tracking your expenses!</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
