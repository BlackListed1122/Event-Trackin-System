<x-layout>


    <div class="min-h-screen bg-gray-100 py-10 px-4">

        <div class="max-w-5xl mx-auto">

            <!-- Card -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

                <!-- Image -->
                @if ($event->image)
                    <div class="relative">

                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->eventTitle }}"
                            class="w-full h-[400px] object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent">
                        </div>

                        <!-- Title Overlay -->
                        <div class="absolute bottom-0 left-0 p-8 text-white">

                            <p class="uppercase tracking-[4px] text-sm text-gray-200 mb-2">
                                Official Event
                            </p>

                            <h1 class="text-4xl font-bold">
                                {{ $event->eventTitle }}
                            </h1>

                        </div>

                    </div>
                @endif


                <!-- Content -->
                <div class="p-8 md:p-10">

                    <!-- Event Info -->
                    <div class="grid md:grid-cols-3 gap-6 mb-8">

                        <!-- Date -->
                        <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200">

                            <p class="text-sm text-gray-500 mb-1">
                                Event Date
                            </p>

                            <h2 class="text-xl font-semibold text-gray-800">
                                {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                            </h2>

                        </div>
                        <!-- TIME -->
                        <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200">

                            <p class="text-sm text-gray-500 mb-1">
                                Event Date
                            </p>

                            <h2 class="text-xl font-semibold text-gray-800">
                                {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
                                -
                                {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                            </h2>

                        </div>


                        <!-- Location -->
                        <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200">

                            <p class="text-sm text-gray-500 mb-1">
                                Location
                            </p>

                            <h2 class="text-xl font-semibold text-gray-800">
                                {{ $event->location }}
                            </h2>

                        </div>

                    </div>

                    <!-- Description -->
                    <div class="mb-10">

                        <h2 class="text-2xl font-bold text-gray-800 mb-4">
                            Event Description
                        </h2>

                        <div
                            class="leading-8 text-gray-600 text-lg bg-gray-50 p-6 rounded-2xl border border-gray-200 whitespace-pre-wrap break-words leading-7">
                            {{ $event->eventDescription }}
                        </div>


                    </div>


                    <!-- PDF -->
                    @if ($event->pdf)
                        <a href="{{ asset('storage/' . $event->pdf) }}" download
                            class="px-6 py-3 bg-gray-900 hover:bg-black text-white rounded-2xl font-medium transition shadow-lg inline-flex items-center gap-2">

                            Download PDF
                        </a>
                    @endif
                    <a href="{{ route('pages.index') }}#events"
                        class="inline-block px-6 py-3 rounded-2xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition text-center">
                        Cancel
                    </a>

                </div>

            </div>

        </div>

    </div>

    </div>

</x-layout>
