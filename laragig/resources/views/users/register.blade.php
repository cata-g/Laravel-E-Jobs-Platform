<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 text-indigo-900">
                Register
            </h2>
            <p class="mb-4 text-indigo-800 font-semibold">Create an account to post gigs</p>
        </header>

        <form action="/users" method="post">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2 text-indigo-800 font-semibold">
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{old('name')}}"
                />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

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
                <label
                    for="password_confirmation"
                    class="inline-block text-lg mb-2 text-indigo-800 font-semibold"
                >
                    Confirm Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password_confirmation"
                    value="{{old('password_confirmation')}}"
                />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="text-white rounded py-2 px-4 bg-indigo-900 hover:bg-violet-400"
                >
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p class="text-indigo-800 font-semibold">
                    Already have an account?
                    <a href="/login" class="text-indigo-900 font-bold"
                        >Login</a
                    >
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
