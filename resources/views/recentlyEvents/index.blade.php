  <x-layout>

      <x-header-admin></x-header-admin>



      <div class="grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-2 p-2">

          <!-- Total Events -->
          <a href="{{ route('recentlyEvents.totalEvents') }}">
              <div
                  class="bg-white rounded-xl shadow-md p-4 overflow-hidden hover:shadow-lg transition duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-0.5">
                  <p class="text-gray-500 text-sm font-medium">Total Events</p>
                  <h2 class="text-4xl font-bold text-gray-800 mt-2">
                      {{ $totalEvents }}
                  </h2>
              </div>
          </a>

          <!-- This Month -->
          <a href="{{ route('recentlyEvents.thisMonthEvents') }}">
              <div
                  class="bg-white rounded-xl shadow-md p-4 overflow-hidden hover:shadow-lg transition duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-0.5">
                  <p class="text-gray-500 text-sm font-medium">This Month</p>
                  <h2 class="text-4xl font-bold text-blue-600 mt-2">
                      {{ $thisMonthEvents }}
                  </h2>
              </div>
          </a>

          <!-- Upcoming -->
          <a href="{{ route('recentlyEvents.upcomingEvents') }}">
              <div
                  class="bg-white rounded-xl shadow-md p-4 overflow-hidden hover:shadow-lg transition duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-0.5">
                  <p class="text-gray-500 text-sm font-medium">Upcoming</p>
                  <h2 class="text-4xl font-bold text-green-600 mt-2">
                      {{ $upcomingEvents }}
                  </h2>
              </div>
          </a>

          <!-- Archived -->
          <a href="{{ route('recentlyEvents.archivedEvents') }}">
              <div
                  class="bg-white rounded-xl shadow-md p-4 overflow-hidden hover:shadow-lg transition duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-0.5">
                  <p class="text-gray-500 text-sm font-medium">Archived</p>
                  <h2 class="text-4xl font-bold text-red-600 mt-2">
                      {{ $archivedEvents }}
                  </h2>
              </div>
          </a>

      </div>



      <div class="bg-white rounded-3xl shadow-md border border-gray-200 p-8 text-sm">

          <!-- Header -->
          <div class="flex items-center justify-between mb-8">
              <div class="flex items-center gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-700" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">

                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12l3-2 3 2 3-2 3 2V7a2 2 0 00-2-2h-2" />
                  </svg>

                  <h2 class="text-3xl font-bold text-gray-800">
                      All Recent Events
                  </h2>
              </div>


          </div>

          <hr class="mb-4">


          {{-- SEARCH BAR --}}


          <form action="{{ route('recentlyEvents.search') }}" method="GET" class="max-w-xl mx-auto m-4">
              <div class="flex">
                  <input type="text" name="search" value="{{ request('search') }}"
                      placeholder="Search events, services, announcements..."
                      class="w-full px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-600">

                  <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-6 rounded-r-lg transition">
                      Search
                  </button>
              </div>
          </form>
          {{-- 
          <form action="{{ route('recentlyEvents.search') }}" method="GET" class="max-w-xl mx-auto">
              <input type="text" name="search" placeholder="Search events, services, announcements..."
                  value="{{ request('search') }}"
                  class="w-full px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-600">

              <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-6 rounded-r-lg transition">
                  Search
              </button>
          </form> --}}





          {{-- <!-- Table -->
          <div class="overflow-hidden rounded-3xl border border-gray-200">

              <table class="w-full">

                  <thead class="bg-gray-100">

                      <tr class="text-left text-gray-600 uppercase tracking-wide">

                          <th class="px-8 py-5">
                              Date
                          </th>
                          <th class="px-8 py-5">
                              Time
                          </th>

                          <th class="px-8 py-5">
                              Event ID
                          </th>

                          <th class="px-8 py-5">
                              Event
                          </th>
                          <th class="px-8 py-5">
                              Location
                          </th>

                          <th class="px-8 py-5">
                              Action
                          </th>

                      </tr>

                  </thead>

                  <tbody>

                      @forelse($events->sortByDesc('date') as $event)
                          <tr class="border-t hover:bg-gray-50 transition">

                              <td class="px-8 py-6 text-lg text-gray-700">
                                  {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                              </td>

                              <td class="px-8 py-6">
                                  <span class="bg-gray-200 px-4 py-2 rounded-full font-semibold text-gray-700">
                                      {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
                                      -
                                      {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                  </span>
                              </td>


                              <td class="px-8 py-6">
                                  <span class="bg-gray-200 px-4 py-2 rounded-full font-semibold text-gray-700">
                                      #{{ $event->id }}
                                  </span>
                              </td>

                              <td class="px-8 py-6 font-semibold text-gray-800">
                                  {{ $event->eventTitle }}
                              </td>

                              <td class="px-8 py-6 font-semibold text-gray-800">
                                  {{ $event->location }}
                              </td>


                              <td class="px-8 py-6">

                                  <div class="flex gap-3">

                                      <a href="{{ route('events.show', $event->id) }}"
                                          class="px-6 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-2xl font-medium transition shadow-lg">

                                          Open

                                      </a>

                                      <form method="POST" action="{{ route('events.destroy', $event->id) }}"
                                          onsubmit="return confirm('Delete this event?')">

                                          @csrf
                                          @method('DELETE')

                                          <button
                                              class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-2xl font-medium transition shadow-lg">

                                              Delete

                                          </button>

                                      </form>

                                  </div>

                              </td>

                          </tr>

                      @empty

                          <tr>

                              <td colspan="4" class="py-10 text-center text-gray-500">

                                  No events found.

                              </td>

                          </tr>)
                      @endforelse

                  </tbody>

              </table>

          </div> --}}


          <!-- Responsive Scrollable Table -->
          <div class="rounded-3xl border border-gray-200 shadow-md overflow-hidden">

              <!-- Scroll Container -->
              <div class="overflow-x-auto overflow-y-auto max-h-[600px]">

                  <table class="min-w-[1000px] w-full">

                      <thead class="bg-gray-100 sticky top-0 z-10">

                          <tr class="text-left text-gray-600 uppercase text-sm">

                              <th class="px-6 py-4">Date</th>
                              <th class="px-6 py-4">Time</th>
                              <th class="px-6 py-4">Event ID</th>
                              <th class="px-6 py-4">Event</th>
                              <th class="px-6 py-4">Location</th>
                              <th class="px-6 py-4 text-center">Action</th>

                          </tr>

                      </thead>

                      <tbody>

                          @forelse($events->sortByDesc('date') as $event)
                              <tr class="border-t hover:bg-gray-50">

                                  <td class="px-6 py-4 whitespace-nowrap">
                                      {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                                  </td>

                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="bg-gray-200 px-3 py-1 rounded-full text-sm">
                                          {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
                                          -
                                          {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                      </span>
                                  </td>

                                  <td class="px-6 py-4 whitespace-nowrap">
                                      #{{ $event->id }}
                                  </td>

                                  <td class="px-6 py-4 whitespace-nowrap">
                                      {{ $event->eventTitle }}
                                  </td>

                                  <td class="px-6 py-4 whitespace-nowrap">
                                      {{ $event->location }}
                                  </td>

                                  <td class="px-6 py-4">

                                      <div class="flex gap-2">

                                          <a href="{{ route('events.show', $event->id) }}"
                                              class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-xl">
                                              Open
                                          </a>

                                          <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                              onsubmit="return confirm('Delete this event?')">

                                              @csrf
                                              @method('DELETE')

                                              <button
                                                  class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl">
                                                  Delete
                                              </button>

                                          </form>

                                      </div>

                                  </td>

                              </tr>

                          @empty

                              <tr>
                                  <td colspan="6" class="text-center py-8">
                                      No events found.
                                  </td>
                              </tr>
                          @endforelse

                      </tbody>

                  </table>

              </div>

          </div>

      </div>

  </x-layout>
