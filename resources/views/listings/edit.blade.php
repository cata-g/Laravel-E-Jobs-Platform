<x-layout>
    <x-card class="max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 text-indigo-900">
                Edit Gig
            </h2>
            <p class="mb-4 text-indigo-700 font-semibold">Edit: {{$listing->title}}</p>
        </header>

        <form action="/listings/{{$listing->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2 text-indigo-700 font-semibold"
                    >Company Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                    value="{{$listing->company}}"
                />

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2 text-indigo-700 font-semibold"
                    >Job Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                    value="{{$listing->title}}"
                />

                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <div class="flex justify-between">
                <label class="inline-block text-lg mb-2 font-semibold text-indigo-700" for="type">
                    Job Type
                </label>
                <select class="inline-block text-lg mb-2 font-semibold text-indigo-700" id="type" name="type">
                    <option value="full-time" {{$listing->type == 'full-time' ? 'selected' : ''}}>Full-time</option>
                    <option value="part-time" {{$listing->type == 'part-time' ? 'selected' : ''}}>Part-time</option>
                    <option value="freelance" {{$listing->type == 'freelance' ? 'selected' : ''}}>Freelance</option>
                    <option value="contract" {{$listing->type == 'contract' ? 'selected' : ''}}>Contract</option>
                </select>
            </div>
            @error('type')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2 text-indigo-700 font-semibold"
                    >Job Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full "
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                    value="{{$listing->location}}"
                />

                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2 text-indigo-700 font-semibold"
                    >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{$listing->email}}"
                />

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2 text-indigo-700 font-semibold"
                >
                    Website/Application URL
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                    value="{{$listing->website}}"
                />
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2 text-indigo-700 font-semibold">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                    value="{{$listing->tags}}"
                />
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2 text-indigo-700 font-semibold">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />

                <img
                class="w-48 mr-6 mb-6"
                src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                alt=""
            />
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <div x-data="{ price: {{$listing->salary}} }" class="w-full">
                    <label for="price" class="inline-block text-lg mb-2 font-semibold text-indigo-700" x-text="`Salary $` + price"></label>
                    <input type="range" min="1000" name="salary" max="10000" value = {{$listing->salary}} x-model="price"
                      class="w-full h-2 bg-blue-100 appearance-none"/>
                  </div>
                  @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
    
                </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2 text-indigo-700 font-semibold"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >
                {{$listing->description}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-indigo-900 text-white rounded py-2 px-4 hover:bg-violet-400"
                >
                    Update Gig
                </button>

                <a href="/" class="text-indigo-400 ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>