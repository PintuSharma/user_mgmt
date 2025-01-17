<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <a href="{{ route('users.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Add User
                    </a>
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                            <strong>Success!</strong> {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full table-auto border mt-2">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border-b">Name</th>
                                <th class="px-4 py-2 border-b">Email</th>
                                <th class="px-4 py-2 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                                    <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <a href="{{ route('users.show', $user) }}" class="text-blue-500">View</a>
                                        <a href="{{ route('users.edit', $user) }}" class="ml-2 text-yellow-500">Edit</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-2 text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 text-center text-gray-500">{{ __('No User created') }}</td>
                                </tr>
                            @endforelse
                         
                        </tbody>
                    </table>
                    <div class="pagination"> {{ $users->links()}} </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
