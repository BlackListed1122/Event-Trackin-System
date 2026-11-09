 <x-layout>
     <x-header-admin></x-header-admin>
     <div class="min-h-screen bg-gray-100 py-10 px-4">

         <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">

             <!-- Header -->
             <div class="bg-blue-900 text-white px-8 py-6">
                 <h1 class="text-3xl font-bold tracking-wide">
                     Update Event
                 </h1>

                 <p class="text-blue-100 mt-2 text-sm">
                     Fill in the official event information and attach supporting files.
                 </p>
             </div>

             <!-- Form -->
             <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data"
                 class="p-8 space-y-6">

                 @csrf
                 @method('PUT')


                 <!-- Event Title -->
                 <div>

                     <x-inputs.text id="eventTitle" name="eventTitle" label="Event Title" placeholder="Software Engineer"
                         :value="old('eventTitle', $event->eventTitle)" />
                 </div>

                 <!-- Description -->
                 <div>
                     <x-inputs.text-area rows="10" id="eventDescription" name="eventDescription"
                         label="Event Description" placeholder="Software Engineer" :value="old('eventDescription', $event->eventDescription)" />

                 </div>

                 <!-- Grid -->
                 <div class="grid md:grid-cols-2 gap-6">

                     <!-- Event Date -->
                     <div>
                         <x-inputs.text type="date" id="date" name="date" label="Event Date"
                             :value="old('date', $event->date)" />

                     </div>
                     <!-- Event Time -->

                     <div class="mb-4">
                         <label class="block text-sm font-semibold text-gray-700 mb-2">
                             Event Time
                         </label>

                         <div class="flex items-center gap-2">

                             <!-- Start Time -->
                             <input type="time" name="start_time" id="start_time"
                                 value="{{ old('start_time', \Carbon\Carbon::parse($event->start_time)->format('H:i')) }}"
                                 class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                 required>

                             <span class="text-4xl font-light text-gray-400">–</span>

                             <!-- End Time -->
                             <input type="time" name="end_time" id="end_time"
                                 value="{{ old('end_time', \Carbon\Carbon::parse($event->end_time)->format('H:i')) }}"
                                 class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                 required>

                         </div>

                         @error('start_time')
                             <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                         @enderror

                         @error('end_time')
                             <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                         @enderror
                     </div>





                     <!-- Location -->
                     <div>
                         <x-inputs.text id="location" name="location" label="Event Location"
                             placeholder="Software Engineer" :value="old('location', $event->location)" />

                     </div>


                 </div>

                 <!-- Image Attachment -->
                 <div>
                     <label class="block text-sm font-semibold text-gray-700 mb-3">
                         Event Image Attachment
                     </label>

                     <div
                         class="border-2 border-dashed border-gray-300 rounded-3xl p-8 text-center bg-gray-50 hover:bg-gray-100 transition">
                         @if ($event->image)
                             <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->eventTitle }}"
                                 alt="Blog Image"
                                 class="border-2 border-dashed border-gray-300 rounded-3xl p-8
                                 text-center bg-gray-50 hover:bg-gray-100 transition">
                         @endif
                         <h2 class="text-xl font-semibold text-center mt-4">
                             {{ $event->eventTitleeventTitle }}
                         </h2>
                         <div class="flex flex-col items-center justify-center space-y-3">

                             <div>
                                 <p class="text-gray-700 font-medium">
                                     Upload Event Banner or Poster
                                 </p>

                                 <p class="text-sm text-gray-500 mt-1">
                                     PNG, JPG, or JPEG files only
                                 </p>
                             </div>
                             <img id="preview" src="https://via.placeholder.com/120" class="object-cover ">

                             <input type="file" id="image" name="image" accept="image/*" class="hidden"
                                 onchange="previewImage(event)">

                             <label for="image" class="block w-full max-w-sm text-sm text-gray-600 hover:underline">
                                 Upload Profile Picture
                             </label>



                         </div>

                     </div>
                 </div>


                 <!-- PDF Attachment -->
                 <div>
                     <label class="block text-sm font-semibold text-gray-700 mb-2">
                         PDF Attachment
                     </label>

                     <input type="file" name="pdf" accept=".pdf"
                         class="w-full border border-gray-300 rounded-2xl px-4 py-3 bg-white">
                 </div>

                 <!-- Buttons -->
                 <div class="flex justify-end gap-4 pt-4">

                     <a href="{{ route('events.index') }}"
                         class="inline-block px-6 py-3 rounded-2xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition text-center">
                         Cancel
                     </a>
                     <button type="submit"
                         class="px-8 py-3 rounded-2xl bg-blue-800 text-white font-semibold hover:bg-blue-900 transition shadow-lg">
                         Save Event
                     </button>

                 </div>

             </form>

         </div>

     </div>

     <!-- IMAGE PREVIEW SCRIPT -->
     <script>
         function previewImage(event) {
             const reader = new FileReader();
             reader.onload = function() {
                 document.getElementById('preview').src = reader.result;
             }
             reader.readAsDataURL(event.target.files[0]);
         }
     </script>

 </x-layout>
