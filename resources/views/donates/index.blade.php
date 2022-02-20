<x-app-layout>
    <x-slot name="header">
        {{ __('report') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full p-6 bg-white border-b border-gray-200">
                    <section class="relative w-full max-w-2xl px-5 py-4 mx-auto rounded-md">
                        <form action="{{ route('donate.search') }}" method="GET">
                            <input type="text"
                                   class="w-10/12 py-3 pl-10 pr-4 text-gray-700 bg-white border rounded-md focus:border-blue-500 focus:outline-none focus:ring"
                                   placeholder="{{__('Search')}}"
                                   autocomplete="off"
                                   value="{{$search ?? ""}}"
                                   name="search">
                            <button
                                type="submit"
                                class="align-top items-center m-2 p-2.5 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-tide rounded-md hover:bg-gothic focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 ">
                                <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        fill="currentColor"
                                        d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/>
                                </svg>
                            </button>

                            <input class="rounded-md" type="date" id="start" name="start"
                                   value="{{isset( $start) ? $start : date('Y-m-d') }}">
                            -
                            <input class="rounded-md" type="date" id="end" name="end"
                                   value="{{isset($end) ? $end : date('Y-m-d') }}">
                            <a class="p-2" href="{{ route('donates.index') }}">
                                <div class="inline-block align-middle">
                                    <svg class="w-5 h-5 mx-1 text-gothic m-1" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 512 512">
                                        <path
                                            fill="currentColor"
                                            d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
                                    </svg>
                                </div>
                            </a>
                        </form>
                    </section>

                    @forelse($donations as $donation)
                        <div class="px-8 py-4 mx-auto bg-white rounded-lg shadow-md border-tide border-2 m-1">
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-sm font-light text-gray-600 ">{{ $donation->created_at->format("d/m/Y") }}
                                    &nbsp;  &nbsp;nr {{$donation->id}}</span>
                                <div>
                                    <span
                                        class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded">{{ __($donation->purpose) }}</span>
                                    <a href="{{ route('donate.delete', ['id' =>$donation->id]) }}"
                                       class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-red-600 rounded">
                                        {{ __('Remove') }}
                                    </a>
                                </div>
                            </div>

                            <div class="mt-2">
                                <span
                                    class="text-2xl font-bold text-gray-700">{{ $donation->donor }}</span>
                                <p class="mt-2 text-gray-600 ">{{ $donation->memoriam }}</p>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                <a class="text-blue-600 hover:underline cursor-pointer"
                                   href="{{ route('donates.show', ['donate' =>$donation]) }}">{{ __('Print') }}</a>
                                <div class="flex items-center">
                                    <span class="font-bold text-gray-700">{{ $donation->amount }}€</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-8 py-4 mx-auto bg-white rounded-lg shadow-md border-tide border-2 m-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span
                                        class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded">no i dupa</span>
                                </div>
                            </div>

                            <div class="mt-2">
                                <span
                                    class="text-2xl font-bold text-gray-700">{{ __('Listen. I don\'t know what you\'re on...' ) }}</span>
                                <p class="mt-2 text-gray-600 "></p>
                            </div>

                        </div>
                    @endforelse
                    {{ $donations->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
