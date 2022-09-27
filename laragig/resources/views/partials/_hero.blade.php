<section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center mb-4 "
            style="background-color: #17153A"
            >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('images/back1.jpg')"
            ></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                    PGR.<span style="color: #A7A3F7">Gigs</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Hire or get hired
                </p>
                @guest
                <div>
                    <a
                        href="/register"
                        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-violet-400 hover:border-violet-400"
                        >Sign Up to List a Gig</a
                    >
                </div>
                @endguest
            </div>
        </section>
