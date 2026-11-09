 @props(['event'])

 <div
     class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 hover:-translate-y-2  ">
     <a href="{{ route('pages.show', $event->id) }}" class="text-blue-600 text-sm font-semibold ">

         @if ($event->image)
             <img src="{{ asset('storage/' . $event->image) }}" class="w-full h-48 object-cover"
                 alt="{{ $event->eventTitle }}">
         @endif

         <div class="p-5">

             <h2 class="text-lg font-bold text-gray-800">
                 {{ $event->eventTitle }}
             </h2>

             <p class="text-gray-600 text-sm mt-2 line-clamp-3">
                 {{ $event->eventDescription }}
             </p>

             <div class="flex items-center justify-between mt-4">
                 <span class="text-xs text-gray-500">
                     {{ $event->date }}
                 </span>



             </div>

         </div>
     </a>
 </div>
