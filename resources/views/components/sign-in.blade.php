<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2">

        <!-- Left Side -->
        <div class="bg-gray-900  from-blue-700 to-blue-500 text-white p-12 flex flex-col justify-center">
            <h1 class="text-4xl font-bold mb-4">
                Admin Login Panel
            </h1>

            <p class="text-blue-100 text-lg leading-relaxed">
                Welcome to the Municipal Hall Administration System.
                Securely manage events, announcements, PDF files,
                and administrator access in one dashboard.
            </p>

            <div class="mt-10 space-y-4 text-sm">
                <div class="flex items-center gap-3">
                    <span>✔</span>
                    <p>Manage Events & Activities</p>
                </div>

                <div class="flex items-center gap-3">
                    <span>✔</span>
                    <p>Upload PDF Announcements</p>
                </div>

                <div class="flex items-center gap-3">
                    <span>✔</span>
                    <p>Control Admin Permissions</p>
                </div>

                <div class="flex items-center gap-3">
                    <span>✔</span>
                    <p>Secure Dashboard Access</p>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="p-12 flex flex-col justify-center">

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800">
                    Sign In
                </h2>
                <p class="text-gray-500 mt-2">
                    Please login using your administrator credentials
                </p>
            </div>

            <form method="POST" action="{{ route('login.authenticate') }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                <!-- Username -->
                <div>
                    {{-- <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Username or Email
                    </label>

                    <input type="text" id="username" name="username" placeholder="Enter username"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"> --}}
                    <x-inputs.text id="username" name="username" label="Username" placeholder="Username" />
                </div>

                <!-- Password -->
                <div>
                    {{-- <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label> --}}
                    <x-inputs.text type="password" id="password" name="password" label="Password"
                        placeholder="Password" />
                    {{-- <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"> --}}
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-600">
                        <input type="checkbox" class="rounded">
                        Remember Me
                    </label>

                    <a href="#" class="text-blue-600 hover:underline">
                        Forgot Password?
                    </a>
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold shadow-md transition">
                    Login to Dashboard
                </button>

                <!-- Sign Up Button -->
                {{-- <a href="{{ url('/signup') }}"
                    class="block w-full text-center border border-blue-600 text-blue-600 hover:bg-blue-50 py-3 rounded-xl font-semibold transition">
                    Create Admin Account
                </a> --}}

                <!-- Footer -->
                <p class="text-center text-sm text-gray-500">
                    Authorized personnel only.
                </p>

            </form>
        </div>
    </div>
</div>
