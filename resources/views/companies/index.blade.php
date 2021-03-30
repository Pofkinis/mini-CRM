@extends('layouts.app')

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
                    Manage companies
                </h2>
                @if (session('success'))
                    <div class="border-t border-b border-green-600 text-green-600 px-4 py-3 mb-4" role="alert">
                        <p class="font-bold">{{ session('success') }}</p>
                    </div>
                @endif

                <a href="{{ route('companies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create new company</a>

                <table class="table-fixed w-full mt-6" id="datatable">
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
            $('#datatable').DataTable({
                paging: false,
                bInfo: false
            });
        } );
    </script>
@endpush
