@extends('layouts.app')

@section('main')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ $employee->last_name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <form method="POST" action="{{ route('employees.update', $employee) }}">
                    @method('PUT')
                    @csrf
                    <div class="flex flex-col space-y-6">
                        <div>
                            <x-jet-label for="first_name" value="{{ __('First name') }}" />
                            <x-jet-input id="first_name" value="{{ old('first_name') ?? $employee->first_name }}" class="block mt-1 w-full" type="text" name="first_name" required autofocus />
                            @error('first_name')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="last_name" value="{{ __('Last   name') }}" />
                            <x-jet-input id="last_name" value="{{ old('last_name') ?? $employee->last_name }}" class="block mt-1 w-full" type="text" name="last_name" required autofocus />
                            @error('last_name')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="email" value="{{ __('Employee email') }}" />
                            <x-jet-input id="email" value="{{ old('email') ?? $employee->email }}" class="block mt-1 w-full" type="text" name="email" autofocus />
                            @error('email')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <x-jet-label for="company_id" value="{{ __('Select company') }}" />
                            <div class="relative inline-flex">
                                <select name="company_id" class="border border-gray-300 rounded-md text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value="{{ null }}">Choose a company</option>
                                    @foreach($companies as $company)
                                        <option @if($company->id == $employee->company_id) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            @error('company_id')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="phone" value="{{ __('Employee phone number') }}" />
                            <x-jet-input id="phone" value="{{ old('phone') ?? $employee->phone}}" class="block mt-1 w-full" type="text" name="phone" autofocus />
                            @error('phone')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-jet-button class="bg-green-500 hover:bg-green-500">
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
