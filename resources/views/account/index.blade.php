<x-layout>

    <x-header-admin></x-header-admin>

    {{-- <div class="flex justify-end mb-6">
        <a href="{{ url('/signup') }}"
            class="inline-flex items-center mt-4 mr-4 px-8 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-md">
            Create Admin Account
        </a>
    </div> --}}
    <!-- Table -->
    {{-- <div class="overflow-hidden rounded-3xl border border-gray-200 text-sm">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr class="text-left text-gray-600 uppercase tracking-wide">

                    <th class="px-8 py-5 ">
                        Id
                    </th>
                    <th class="px-8 py-5">
                        Profile
                    </th>
                    <th class="px-8 py-5">
                        First Name
                    </th>

                    <th class="px-8 py-5">
                        Middle Name
                    </th>
                    <th class="px-8 py-5">
                        Last Name
                    </th>

                    <th class="px-8 py-5">
                        Email
                    </th>
                    <th class="px-8 py-5">
                        Username
                    </th>
                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)
                    <tr class="border-t hover:bg-gray-50 transition text-sm">

                        {{-- 'profile_picture', --}}

    {{-- <td class="px-8 py-6">
                            <span class=" px-4 py-2  font-semibold text-gray-700">
                                {{ $user->id }}
                            </span>
                        </td>


                        <td class="px-8 py-6">
                            @if ($user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                    alt="{{ $user->first_name }}" class="w-8 h-8 rounded-full object-cover">
                            @else
                                <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile"
                                    class="w-24 h-24 rounded-full object-cover">
                            @endif
                        </td>


                        <td class="px-8 py-6 font-semibold text-gray-800">
                            {{ $user->first_name }}
                        </td>

                        <td class="px-8 py-6 font-semibold text-gray-800">
                            {{ $user->middle_name }}
                        </td>
                        <td class="px-8 py-6 font-semibold text-gray-800">
                            {{ $user->last_name }}
                        </td>

                        <td class="px-8 py-6">
                            <span class="bg-gray-200 px-4 py-2 rounded-full font-semibold text-gray-700">
                                #{{ $user->email }}
                            </span>
                        </td>


                        <td class="px-8 py-6 font-semibold text-gray-800">
                            {{ $user->username }}
                        </td>


                        <td class="px-8 py-6">



                            <div class="flex gap-3">

                                <a href="{{ route('account.show', $user->id) }}"
                                    class="px-6 py-3 bg-blue-700 hover:bg-blue-800 text- white rounded-2xl font-medium transition shadow-lg">

                                    Open

                                </a>

                                <form method="POST" action="{{ route('account.destroy', $user->id) }}"
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

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div> --}}





    <div class="bg-white shadow-md border border-gray-200 p-8 min-h-screen flex flex-col">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">

            <!-- Left Side -->
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12l3-2 3 2 3-2 3 2V7a2 2 0 00-2-2h-2" />
                </svg>

                <h2 class="text-3xl font-bold text-gray-800">
                    Users
                </h2>
            </div>

            <!-- Right Side -->
            <a href="{{ url('/signup') }}"
                class="px-6 py-3 border border-blue-600 text-blue-600 hover:bg-blue-50 rounded-xl font-semibold transition">
                Create Account
            </a>

        </div>

        <hr class="mb-4">

        <!-- Responsive Scrollable Table -->
        <div class="bg-white rounded-3xl border border-gray-200 shadow-md overflow-hidden">

            <!-- Scrollable Container -->
            <div class="overflow-x-auto overflow-y-auto max-h-[650px]">

                <table class="min-w-[1100px] w-full text-sm">

                    <!-- Sticky Header -->
                    <thead class="bg-gray-100 sticky top-0 z-20">

                        <tr class="text-left text-gray-600 uppercase tracking-wide">

                            <th class="px-5 py-4">ID</th>
                            <th class="px-5 py-4">Profile</th>
                            <th class="px-5 py-4">First Name</th>
                            <th class="px-5 py-4">Middle Name</th>
                            <th class="px-5 py-4">Last Name</th>
                            <th class="px-5 py-4">Email</th>
                            <th class="px-5 py-4">Username</th>
                            <th class="px-5 py-4 text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($accounts as $account)
                            <tr class="border-t hover:bg-blue-50 transition duration-200">

                                <td class="px-5 py-4 whitespace-nowrap">
                                    {{ $account->id }}
                                </td>

                                <td class="px-5 py-4 whitespace-nowrap">

                                    @if ($account->profile_picture)
                                        <img src="{{ asset('storage/' . $account->profile_picture) }}"
                                            class="w-12 h-12 rounded-xl object-cover shadow"
                                            alt="{{ $account->first_name }}">
                                    @else
                                        <img src="{{ asset('images/default-profile.png') }}"
                                            class="w-12 h-12 rounded-xl object-cover shadow" alt="Default">
                                    @endif

                                </td>

                                <td class="px-5 py-4 whitespace-nowrap">
                                    {{ $account->first_name }}
                                </td>

                                <td class="px-5 py-4 whitespace-nowrap">
                                    {{ $account->middle_name }}
                                </td>

                                <td class="px-5 py-4 whitespace-nowrap">
                                    {{ $account->last_name }}
                                </td>

                                <td class="px-5 py-4 whitespace-nowrap">
                                    {{ $account->email }}
                                </td>

                                <td class="px-5 py-4 whitespace-nowrap">
                                    {{ $account->username }}
                                </td>

                                <td class="px-5 py-4">

                                    <div class="flex flex-col md:flex-row gap-2">

                                        <a href="{{ route('account.show', $account->id) }}"
                                            class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-xl text-center transition">
                                            Open
                                        </a>

                                        <form action="{{ route('account.destroy', $account->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this account?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="w-full md:w-auto px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl transition">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center py-10 text-gray-500">

                                    No accounts found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>


</x-layout>
