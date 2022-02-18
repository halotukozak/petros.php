<x-app-layout>
    <x-slot name="header">
        {{ __('create') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 md:p-6 bg-white border-b border-gray-200">

                    <section class="p-6  mx-auto bg-white rounded-md shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-700 capitalize ">{{__('Donation')}}</h2>

                        <form method="POST" action="{{ route('donates.store') }}">
                            @csrf
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 " for="donor">{{ __('Donor') }}</label>
                                    <input autocomplete="off" id="donor" type="text" name="donor"
                                           value="{{ old('donor') ? old('donor') : __('Anonim') }}"
                                           onfocus="this.value=''"
                                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring @error('donor') is-invalid @enderror">
                                </div>

                            </div>
                            <div class=" mt-4 sm:grid-cols-2">
                                <label class="text-gray-700 " for="purpose">{{ __('Purpose') }}</label>

                                <div>
                                    <div>
                                        <label class="items-center">
                                            <input autocomplete="off" id="purpose" type="radio" name="purpose" value="church" checked
                                                   class="inline-flex @error('purpose') is-invalid @enderror">
                                            <span class="ml-2">{{ __('church') }}</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="items-center">
                                            <input autocomplete="off" id="purpose" type="radio" name="purpose" value="cemetery"
                                                   class="inline-flex @error('purpose') is-invalid @enderror">
                                            <span class="ml-2">{{ __('cemetery') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 " for="memoriam">{{ __('Memoriam') }}</label>
                                    <input autocomplete="off" id="memoriam" type="text" name="memoriam" value="{{old('memoriam')}}"
                                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring @error('memoriam') is-invalid @enderror">
                                </div>

                            </div>
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 " for="amount">{{ __('Amount') }}</label>
                                    <input autocomplete="off" id="amount" type="number" step="0.01" name="amount"
                                           value="{{ old('amount') }}"
                                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring @error('amount') is-invalid @enderror">
                                </div>

                            </div>
                            @if($errors->any())
                                <div class="w-full text-white is-invalid rounded my-2 sm:mx-2">
                                    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                        <div class="flex">
                                            <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                <path
                                                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                                            </svg>
                                            <p class="mx-3">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="flex justify-end mt-6">
                                <button
                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
