<header class="flex items-center justify-between p-4 bg-white shadow-md w-full top-0 left-0 ">

    <!-- Logo -->
    <div class="flex items-center gap-3">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyKdSj5ApaZWpulop7w8zaA0aT-xC53sbL4w&s"
            alt="Municipal Logo" class="w-16 h-16 rounded-full object-cover border">
        <div>
            <h1 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                MuniTrack
            </h1>

            <p class="text-xs sm:text-sm text-gray-500">
                Municipal Event Tracking System
            </p>
        </div>
    </div>

    {{-- <!-- Desktop Menu -->
    <!-- Smooth scroll effect -->
    <html class="scroll-smooth">
    <!-- Navigation --> --}}
    <nav class="hidden md:flex gap-6 ">
        <a href="{{ url('/events') }}" class="hover:text-blue-600">Events</a>
        <a href="{{ url('/events/create') }}" class="hover:text-blue-600">Create Events</a>
        <a href="{{ url('/dashboard') }}" class="hover:text-blue-600">Dashboard</a>
        <a href="{{ url('/account') }}" class="hover:text-blue-600">Accounts</a>
        <form method="POST" action="{{ route('logout') }}"
            onsubmit="return confirm('Are you sure you want to logout?')">
            @csrf
            <button type="submit" class="text-red-600 hover:underline">
                Logout
            </button>
        </form>
    </nav>

    <!-- Burger Button (Mobile Only) -->
    <button id="menu-btn" class="md:hidden text-3xl">
        ☰
    </button>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden flex flex-col bg-white shadow-md p-4 space-y-3 ">
    <a href="{{ url('/events') }}" class="hover:text-blue-600">Events</a>
    <a href="{{ url('/events/create') }}" class="hover:text-blue-600">Create Events</a>
    <a href="{{ url('/dashboard') }}" class="hover:text-blue-600">Dashboard</a>
    <a href="{{ url('/account') }}" class="hover:text-blue-600">Accounts</a>
    <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?')">
        @csrf
        <button type="submit" class="text-red-600 hover:underline">
            Logout
        </button>
    </form>

</div>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
