@extends('layouts.app')

@section('main')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage companies
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

                <a href="{{ route('companies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create new company</a>

                <table class="table-fixed w-full mt-6" id="table">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">Id</th>
                        <th class="px-4 py-2 w-20">Logo</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Website</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td class="border px-4 py-2">{{ $company->id }}</td>
                            <td class="border px-4 py-2">
                                <img class="w-10 h-10" src="{{ asset('storage/' . $company->logo) }}" alt="logo"/>
                            </td>
                            <td class="border px-4 py-2">{{ $company->name }}</td>
                            <td class="border px-4 py-2">{{ $company->email }}</td>
                            <td class="border px-4 py-2"><a href="http:\\{{ $company->website }}" target="_blank">{{ $company->website }} </a></td>
                            <td class="border px-4 py-2 flex fex-row">
                                <a href="{{ route('companies.edit', $company) }}" class="bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form method="POST" action="{{ route('companies.destroy', $company) }}">
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
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                paging: false,
                bInfo: false
            });
        } );
    </script>
@endpush
