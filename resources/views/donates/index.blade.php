<x-app-layout>
    <x-slot name="header">
        {{ __('index') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($donations as $donation)
                        <div class="px-8 py-4 mx-auto bg-white rounded-lg shadow-md border-tide border-2 m-1">
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-sm font-light text-gray-600 ">{{ $donation->created_at->format("d/m/Y") }}</span>
                                <span
                                    class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded">{{ $donation->purpose }}</span>
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

                    @endforeach
                    {{ $donations->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
