<x-layout>
    <x-slot:pagename>
      All users
    </x-slot:pagename>

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">All Users</h1>
        <a href="/users/create" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</a>
    </div>
    <table class="min-w-full divide-y divide-gray-200">
        <caption class="text-lg font-medium text-gray-900 mb-4">All users</caption>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->first_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->last_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button>
                            <a href="/users/{{ $user->id }}/edit" class="text-indigo-600 hover:text-indigo-900">
                                Edit
                            </a>
                        </button>
                        <a href="/user/{{ $user->id }}">
                            <button type="submit" form="deleteForm">Delete</button>
                        </a>
                        
                        
                    </td>
                </tr>
                <form method="POST" action="/users/{{ $user->id }}" id="deleteForm" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                
            @endforeach
        </tbody>
    </table>
    
</x-layout>