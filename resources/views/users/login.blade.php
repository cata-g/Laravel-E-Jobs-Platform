<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 text-indigo-900">
                Login
            </h2>
            <p class="mb-4 text-indigo-800 font-semibold">Log into your account</p>
        </header>

        <form action="/users/authenticate" method="post">
            @csrf
        
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2 text-indigo-800 font-semibold"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{old('email')}}"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2 text-indigo-800 font-semibold"
                >
                    Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                    value="{{old('password')}}"
                />
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="text-white rounded py-2 px-4 bg-indigo-900 hover:bg-violet-400"

                >
                    Sign In
                </button>
            </div>

            <div class="mt-8">
                <p class="text-indigo-800 font-semibold">
                    Don't have an account?
                    <a href="/register" class="text-indigo-900 font-bold"
                        >Register</a
                    >
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
