<x-layout>

    <x-header-admin />

    <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-lg border border-gray-200 overflow-hidden mt-10">

        <!-- Header -->
        <div class="bg-blue-700 px-8 py-6">
            <h1 class="text-3xl font-bold text-white">
                Administrator Profile
            </h1>
            <p class="text-blue-100 mt-1">
                View administrator information.
            </p>
        </div>

        <!-- Content -->
        <div class="p-10">

            <div class="flex flex-col md:flex-row gap-10">

                <!-- Profile Picture -->
                <div class="flex-shrink-0">

                    @if ($account->profile_picture)
                        <img src="{{ asset('storage/' . $account->profile_picture) }}" alt="{{ $account->first_name }}"
                            class="w-56 h-56 rounded-3xl object-cover border-4 border-gray-200 shadow-md">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile"
                            class="w-56 h-56 rounded-3xl object-cover border-4 border-gray-200 shadow-md">
                    @endif

                </div>

                <!-- Information -->
                <div class="flex-1">

                    <div class="grid md:grid-cols-4 gap-6">

                        <div>
                            <label class="text-sm text-gray-500">ID</label>
                            <p class="text-xl font-semibold text-gray-800">
                                #{{ $account->id }}
                            </p>
                        </div>

                        {{-- <div>
                            <label class="text-sm text-gray-500">Role</label>
                            <p class="text-xl font-semibold text-gray-800">
                                {{ $account->role }}
                            </p>
                        </div> --}}

                        <div>
                            <label class="text-sm text-gray-500">First Name</label>
                            <p class="text-xl font-semibold text-gray-800">
                                {{ $account->first_name }}
                            </p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-500">Middle Name</label>
                            <p class="text-xl font-semibold text-gray-800">
                                {{ $account->middle_name }}
                            </p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-500">Last Name</label>
                            <p class="text-xl font-semibold text-gray-800">
                                {{ $account->last_name }}
                            </p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-500">Username</label>
                            <p class="text-xl font-semibold text-gray-800">
                                {{ $account->username }}
                            </p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="text-sm text-gray-500">Email Address</label>
                            <p class="text-xl font-semibold text-gray-800">
                                {{ $account->email }}
                            </p>
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 mt-10">

                        <a href="{{ route('account.edit', $account->id) }}"
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition">
                            Update
                        </a>

                        <a href="{{ url('/account') }}"
                            class="px-6 py-3 border
                            border-gray-300 hover:bg-gray-100 text-gray-700 rounded-xl font-semibold transition">
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layout>
