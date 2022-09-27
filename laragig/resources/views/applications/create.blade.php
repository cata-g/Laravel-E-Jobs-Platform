<x-layout>

    <x-card class="max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 text-indigo-900">
                Application
            </h2>
            <p class="mb-4 text-indigo-700 font-semibold">Apply to: {{$listing->title}}</p>
        </header>

        <form action="/listings/submitApplyTo/{{$listing->id}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label
                    for="priorWork"
                    class="inline-block text-lg mb-2 font-semibold text-indigo-700"
                >
                    Prior Work
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full text-black"
                    name="priorWork"
                    rows="10"
                    placeholder="Include a short personal description, work places...."
                >{{old('priorWork')}}</textarea>

                @error('priorWork')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label
                    for="portofolioWork"
                    class="inline-block text-lg mb-2 font-semibold text-indigo-700"
                    >Portofolio Link</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="portofolioWork"
                    placeholder="Resume, LinkedIn, etc"
                    value="{{old('portofolioWork')}}"
                />

                @error('portofolioWork')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="desiredSalary"
                    class="inline-block text-lg mb-2 font-semibold text-indigo-700"
                    >Desired Salary (in $)</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="desiredSalary"
                    placeholder="ex: 10000"
                    value="{{old('desiredSalary')}}"
                />

                @error('desiredSalary')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="text-white rounded py-2 px-4 bg-indigo-900 hover:bg-violet-400"
                >
                    Create Application
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>

</x-layout>