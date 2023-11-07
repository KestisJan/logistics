<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <x-link href="{{ route('tasks.create') }}" class="m-4">Add new task</x-link>
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Task Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($tasks as $task) 
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $task->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-link href="{{ route('tasks.edit', $task) }}">Edit</x-link>
                                        <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button 
                                            type="submit"
                                            onclick="return confirm('Are you sure?')">Delete</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="2" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No tasks found') }}
                                    </td>
                                </tr>
                             @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>