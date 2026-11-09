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
            <form action="{{ route('account.update', $account->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="flex flex-col md:flex-row gap-10">

                    <!-- Profile Picture -->
                    <div class="flex-shrink-0">

                        @if ($account->profile_picture)
                            <img src="{{ asset('storage/' . $account->profile_picture) }}"
                                alt="{{ $account->first_name }}"
                                class="w-56 h-56 rounded-3xl object-cover border-4 border-gray-200 shadow-md">
                        @else
                            <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile"
                                class="w-56 h-56 rounded-3xl object-cover border-4 border-gray-200 shadow-md">
                        @endif

                    </div>

                    <!-- Information -->
                    <div class="flex-1">

                        <div class="grid md:grid-cols-6 gap-2">

                            <div>
                                <label class="text-sm text-gray-500">ID</label>
                                <p class="text-xl font-semibold text-gray-800">
                                    #{{ $account->id }}
                                </p>
                            </div>

                            <div>
                                <x-inputs.text type="first_name" id="first_name" name="first_name" label="First Name"
                                    :value="old('first_name', $account->first_name)" />
                            </div>

                            <div>
                                <x-inputs.text type="middle_name" id="middle_name" name="middle_name"
                                    label="Middle Name" :value="old('middle_name', $account->middle_name)" />
                            </div>

                            <div>
                                <x-inputs.text type="last_name" id="last_name" name="last_name" label="Last Name"
                                    :value="old('last_name', $account->last_name)" />
                            </div>


                            <div class="md:col-span-2">
                                <x-inputs.text type="email" id="email" name="email" label="Email "
                                    :value="old('email', $account->email)" />
                            </div>
                            <div>
                                <x-inputs.text type="username" id="username" name="username" label="Username "
                                    :value="old('username', $account->username)" />
                            </div>



                            <div class="md:col-span-2">
                                <x-inputs.text type="password" id="password" name="password" label="New Password"
                                    placeholder="Enter new password" />
                            </div>
                            <div class="md:col-span-2">
                                <x-inputs.text type="password" id="password_confirmation" name="password_confirmation"
                                    label="Confirm Password" placeholder="Confirm password" />
                            </div>


                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4 mt-10">

                            <button type="submit"
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition">
                                Update
                            </button>


                            <a href="{{ route('account.show', $account->id) }}"
                                class="px-6 py-3 border border-gray-300 hover:bg-gray-100 text-gray-700 rounded-xl font-semibold transition">
                                Back
                            </a>

                        </div>

                    </div>

                </div>

        </div>

    </div>
    </form>
</x-layout>
