<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage employees
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session('success'))
                    <div class="bg-green-500 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm bg-green-500">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create new employee</a>

                <table class="table-fixed w-full mt-6">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">Id</th>
                        <th class="px-4 py-2">First name</th>
                        <th class="px-4 py-2">Last name</th>
                        <th class="px-4 py-2">Company</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Phone</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td class="border px-4 py-2">{{ $employee->id }}</td>
                            <td class="border px-4 py-2">{{ $employee->first_name }}</td>
                            <td class="border px-4 py-2">{{ $employee->last_name }}</td>
                            <td class="border px-4 py-2">{{ $employee->company->name ?? '-'}}</td>
                            <td class="border px-4 py-2">{{ $employee->email }}</td>
                            <td class="border px-4 py-2">{{ $employee->phone }}</td>
                            <td class="border px-4 py-2 flex fex-row">
                                <a href="{{ route('employees.edit', $employee) }}" class="bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form method="POST" action="{{ route('employees.destroy', $employee) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
