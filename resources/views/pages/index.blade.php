<x-layout>
    <x-header></x-header>
    <section id="home">
        <x-home-card />
    </section>
    <section id="about">
        <x-about-card />
    </section>
    <section id="events">

        <div class="bg-[#F8F9FA] rounded-2xl  transition duration-300">
            <h1 class="text-2xl p-2 bold ml-4 text-gray-700 font-bold">LATEST EVENTS</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-4 ">

                @forelse($events as $event)
                    <!-- Events Card -->
                    <x-public-event-card :event="$event"></x-public-event-card>
                @empty
                    <p>No events available</p>
                @endforelse


    </section>

    <section id="services">
        <x-service-card />
    </section>
    <section id="contact">
        <x-contact-card />
    </section>

    </section>
    <x-footer></x-footer>
</x-layout>
