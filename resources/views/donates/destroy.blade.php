<x-app-layout>
    <x-slot name="header">
        {{ __('delete') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 md:p-6 bg-white border-b border-gray-200">
                    <section class="bg-white">
                        <div class="max-w-3xl px-6 py-16 mx-auto text-center">
                            <form action="{{ route('donates.destroy', $donation->id) }}" method="post">

                                @csrf
                                @method('DELETE')
                                <h1 class="text-3xl font-semibold text-gray-800 ">{{ __('Are you sure you want to delete the donation nr') . " " . $donation->id . "?" }}</h1>
                                <p class="max-w-md mx-auto mt-5 text-gray-500 ">
                                    {{__('Date') . ": " . $donation->created_at->format("d/m/Y") }}<br/>
                                    {{ __('Donor') . ": " .$donation->donor }}<br/>
                                    {{ __('Memoriam') . ": " .  $donation->memoriam }} <br/>
                                    <strong class="font-bold">
                                        {{  $donation->amount . "€" }}
                                    </strong>
                                </p>

                        <div
                            class="flex flex-col mt-8 space-y-3 sm:space-y-0 sm:flex-row sm:justify-center sm:-mx-2">
                            <button
                                type="submit"
                                class="px-4 py-2 text-sm font-medium tracking-wide text-white  transition-colors duration-200 transform bg-red-400 rounded-md sm:mx-2 hover:bg-red-600 focus:outline-none focus:bg-red-700">
                                {{ __('Yes, delete this donation.') }}
                            </button>
                            <button
                                type="button"
                                onclick="history.back()"
                                class="px-4 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 transform  rounded-md sm:mx-2 bg-gothic hover:bg-hoki focus:outline-none focus:bg-tide">
                                {{ __('Cancel') }}
                            </button>
                        </div>
                        </form>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
