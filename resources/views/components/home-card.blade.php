<!-- Home Section -->
<section id="home gap-4">
    <!-- Blog Card -->
    <div class="bg-yellow-200  shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="relative w-screen h-screen overflow-hidden">
            <!-- Dark Overlay with 50% opacity -->
            <div class="absolute inset-0 bg-black opacity-70"></div>

            <!-- Text Inside Image -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 z-10">
                <h1 class="text-white text-4xl md:text-6xl font-bold">
                    Welcome to San Isidro
                </h1>

                <p class="text-white text-lg md:text-2xl mt-4 max-w-2xl">
                    A progressive, peaceful, and sustainable municipality serving every San Isidrense.
                </p>
                <a href="#about"
                    class="btn rounded-2xl shadow-md text-white border px-4 py-2 transition duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-2 mt-10">
                    Let's go
                </a>
            </div>
            <!-- Slides -->
            <div id="slider" class="flex transition-transform duration-500 h-full">

                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/JfPoblacion%2C_San_Isidro%2C_Nueva_EcijaHall2136fvf_01.JPG/1280px-JfPoblacion%2C_San_Isidro%2C_Nueva_EcijaHall2136fvf_01.JPG"
                    class="w-screen h-screen object-cover flex-shrink-0 opacity-70">


                <img src="https://upload.wikimedia.org/wikipedia/commons/d/df/San_Isidro_Municipal_Hall%2C_Nueva_Ecija%2C_Oct_2025_%281%29.jpg"
                    class="w-screen h-screen object-cover flex-shrink-0 opacity-70">

                <img src="https://upload.wikimedia.org/wikipedia/commons/7/7d/San_Isidro_Church%2C_Nueva_Ecija%2C_Oct_2025_%281%29.jpg"
                    class="w-screen h-screen object-cover flex-shrink-0 opacity-70">


                <img src="https://upload.wikimedia.org/wikipedia/commons/b/bd/San_Isidro_Town_Plaza_%28Nueva_Ecija%29_10.jpg"
                    class="w-screen h-screen object-cover flex-shrink-0 opacity-70">
            </div>

            <!-- Buttons -->
            {{-- <button onclick="prev()"
                class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 text-white px-3 py-2 rounded-full">
                ❮
            </button>

            <button onclick="next()"
                class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 text-white px-3 py-2 rounded-full">
                ❯
            </button> --}}

        </div>


        <script>
            let index = 0;
            const slider = document.getElementById("slider");
            const total = slider.children.length;

            function update() {
                slider.style.transform = `translateX(-${index * 100}vw)`;
            }

            function next() {
                index = (index + 1) % total;
                update();
            }

            // AUTO SLIDE every 3 seconds
            setInterval(next, 3000);
        </script>
    </div>
</section>
