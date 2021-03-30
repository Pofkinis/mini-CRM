<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <a href="{{ route('companies.index') }}" class='relative bg-blue-500 text-white p-6 rounded text-2xl font-bold overflow-visible mr-3'>
                    Companies
                </a>
                <a href="{{ route('employees.index') }}" class='relative bg-green-500 text-white p-6 rounded text-2xl font-bold overflow-visible ml-3'>
                    Employees
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
