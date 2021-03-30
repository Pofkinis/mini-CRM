<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ $company->name }} company
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col space-y-6">
                        <div>
                            <x-jet-label for="name" value="{{ __('Company name') }}" />
                            <x-jet-input id="name" value="{{ old('name') ?? $company->name }}" class="block mt-1 w-full" type="text" name="name" required autofocus />
                            @error('name')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="email" value="{{ __('Company email') }}" />
                            <x-jet-input id="email" value="{{ old('email') ?? $company->email }}" class="block mt-1 w-full" type="text" name="email" autofocus />
                            @error('email')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="website" value="{{ __('Company website') }}" />
                            <x-jet-input id="website" value="{{ old('website') ?? $company->website }}" class="block mt-1 w-full" type="text" name="website" autofocus />
                            @error('website')
                            <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="logo" value="{{ __('It is an old compnay logo. Please upload new one') }}" />
                            <img class="w-10 h-10" src="{{ asset('storage/' . $company->logo) }}"/>
                            <x-jet-input id="logo" class="block mt-1 w-auto" type="file" name="logo" autofocus />
                            @error('logo')
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
</x-app-layout>
