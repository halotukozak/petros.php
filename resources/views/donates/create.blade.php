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
                                    <input id="donor" type="text" name="donor" value="{{ old('donor') ? old('donor') : __('Anonim') }}" onfocus="this.value=''"
                                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring @error('donor') is-invalid @enderror">
                                </div>

                            </div>
                            <div class=" mt-4 sm:grid-cols-2">
                                <label class="text-gray-700 " for="purpose">{{ __('Purpose') }}</label>

                                <div>
                                    <div>
                                        <label class="items-center">
                                            <input id="purpose" type="radio" name="purpose" value="church" checked
                                                   class="inline-flex @error('purpose') is-invalid @enderror">
                                            <span class="ml-2">{{ __('church') }}</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="items-center">
                                            <input id="purpose" type="radio" name="purpose" value="cemetery"
                                                   class="inline-flex @error('purpose') is-invalid @enderror">
                                            <span class="ml-2">{{ __('cemetery') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 " for="memoriam">{{ __('Memoriam') }}</label>
                                    <input id="memoriam" type="text" name="memoriam" value="{{old('memoriam')}}"
                                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring @error('memoriam') is-invalid @enderror">
                                </div>

                            </div>
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 " for="amount">{{ __('Amount') }}</label>
                                    <input id="amount" type="number" step="0.01" name="amount" value="{{ old('amount') }}"
                                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40  focus:outline-none focus:ring @error('amount') is-invalid @enderror">
                                </div>

                            </div>

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
