<x-layout>
    <x-slot:pagename>
      All users
    </x-slot:pagename>

    <table class="min-w-full divide-y divide-gray-200">
        <caption class="text-lg font-medium text-gray-900 mb-4">All users</caption>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email Verified at</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user['first_name'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user['last_name'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user['email'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>