<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-xl overflow-hidden grid md:grid-cols-2">

        <!-- Left Side -->
        <div class="bg-gray-900  text-white p-10 flex flex-col justify-center">
            <h1 class="text-4xl font-bold mb-4">Create Admin Account</h1>
            <p class="text-blue-100 text-lg">
                Register a new administrator account for the Municipal Hall Admin Panel.
            </p>

            <div class="mt-8 space-y-3 text-sm">
                <p>✔ Manage Events</p>
                <p>✔ Upload Announcements</p>
                <p>✔ Control User Access</p>
                <p>✔ Secure Admin Dashboard</p>
            </div>
        </div>

        <!-- Right Side -->
        <div class="p-4">

            <form method="POST" action="{{ route('account.store') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- PROFILE PREVIEW -->
                <div class="flex flex-col items-center">
                    <img id="preview" src="https://via.placeholder.com/120"
                        class="w-28 h-28 rounded-full object-cover border-4 border-blue-500 shadow">

                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="hidden"
                        onchange="previewImage(event)">

                    <label for="profile_picture"
                        class="mt-3 cursor-pointer text-blue-600 font-semibold hover:underline">
                        Upload Profile Picture
                    </label>
                </div>

                <!-- First Name -->
                <x-inputs.text id="first_name" name="first_name" label="First Name" placeholder="Enter First Name" />
                <!-- Middle Name -->

                <x-inputs.text id="middle_name" name="middle_name" label="Middle Name"
                    placeholder="Enter Middle Name" />

                <!-- Last Name -->

                <x-inputs.text id="last_name" name="last_name" label="Last Name" placeholder="Enter Last Name" />


                <!-- Email Address-->
                <x-inputs.text id="email" name="email" label="Email Address" placeholder="Enter Email Address" />


                <!-- Username -->
                <x-inputs.text id="username" name="username" label="Username " placeholder="Enter Username" />



                <!-- Password -->
                <x-inputs.text id="password" name="password" label="Password " placeholder="Enter password" />



                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Confirm Password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm password"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <!-- Role -->
                <div>
                    {{-- <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Admin Role
                    </label>
                    <select
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option>Super Admin</option>
                        <option>Event Manager</option>
                    </select> --}}

                    {{-- <x-inputs.select id="role" name="role" label="Role" :options="[
                        'Super Admin' => 'Super Admin',
                        'Event Manager' => 'Event Manager',
                    ]" /> --}}
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-md">
                    Create Admin Account
                </button>

                <!-- Login Button -->
                <a href="{{ url('/account') }}"
                    class="block w-full text-center border border-blue-600 text-blue-600 hover:bg-blue-50 py-3 rounded-xl font-semibold transition">
                    Back
                </a>

                <p class="text-center text-sm text-gray-500">
                    Authorized personnel only.
                </p>

            </form>
        </div>
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
