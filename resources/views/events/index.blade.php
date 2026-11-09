 <x-layout>
     <x-header-admin></x-header-admin>
     <section id="events" class="pt-25">
         <div class="bg-[#F8F9FA] rounded-2xl  transition duration-300">
             <h1 class="text-2xl p-2 bold ml-4 text-gray-700 font-bold">LATEST EVENTS</h1>
             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-4 ">

                 @forelse($events as $event)
                     <!-- Events Card -->
                     <x-event-card :event="$event"></x-event-card>
                 @empty
                     <p>No events available</p>
                 @endforelse

     </section>
 </x-layout>
