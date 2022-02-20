<x-app-layout>
    <x-slot name="header">
        {{ __('report') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="relative px-5 py-4 mx-auto rounded-md">
                    <form action="{{ route('donates.report') }}" method="GET">
                        <input class="rounded-md" type="month" id="date" name="date"
                               value="{{isset($date) ? $date : date('Y-m') }}">
                        <button
                            type="submit"
                            class="items-center m-2 p-2.5 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-tide rounded-md hover:bg-gothic focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 ">
                            <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    fill="currentColor"
                                    d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/>
                            </svg>
                        </button>
                    </form>
                </section>
                <div class="w-full p-6 bg-white border-b border-gray-200">

                    <ul class="list-disc">
                        @foreach($churchRecords as $record)
                            <li>
                                Εις μνήμη {{ __($record->memoriam) . "από " . __($record->donor) . ", " .  __($record->amount) }} €
                            </li>
                        @endforeach
                    </ul>
                    <ul class="list-disc">
                        @foreach($cemeteryRecords as $record)
                            <li>
                                Εις μνήμη {{ __($record->memoriam) . "από " . __($record->donor) . ", " .  __($record->amount) }} €
                            </li>
                        @endforeach
                    </ul>
                    <ul class="list-disc">
                        @foreach($parishRecords as $record)
                            <li>
                                Εις μνήμη {{ __($record->memoriam) . "από " . __($record->donor) . ", " .  __($record->amount) }} €
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
