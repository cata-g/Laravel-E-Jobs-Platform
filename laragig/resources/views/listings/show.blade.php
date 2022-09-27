<x-layout>
{{--  --}}

<div class="flex-col h-[75vh] mx-10">
    <div class="w-full mt-8">
        <x-card class="p-2 flex rounded-none border-0">
            <div class="w-4/12 flex justify-start">
                <a class="text-indigo-800 font-bold" href="/"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
            </div>
            @if(auth()->id() == $listing->user_id)
            <div class="w-8/12 flex justify-end space-x-6">
                <a class="text-indigo-800 font-semibold" href="/listings/{{$listing->id}}/edit">
                    <i class="fa-solid fa-pencil"></i>Edit
                </a>

                <form action="/listings/{{$listing->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="text-red-700 font-semibold">
                        <i class="fa-solid fa-trash"></i>Delete
                    </button>
                </form>
            </div>
            @endif
        </x-card>

    </div>
    <div class="flex h-[70vh]">
    <x-card class="w-4/12 bg-indigo-900 border-0 p-0 relative text-center opacity-100 rounded-none">
        <div class="absolute w-full h-full bg-[url('/images/back1.jpg')] bg-no-repeat bg-cover 
         opacity-20 bg-center"></div>

        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <img
            class="w-48 ml-6 mr-6 mb-6"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
            alt=""
            />

            <h3 class="text-2xl mb-2 text-white font-bold">{{$listing->title}}</h3>
            <div class="text-xl font-semibold text-zinc-300 mb-4"><i class="fa-solid fa-building"></i> {{$listing->company}}</div>
            <x-listing-tag :tagsCSV="$listing->tags"/>
            <div class="flex space-x-4">
                <div class="text-lg text-zinc-300 my-4 font-semibold">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                </div>
                <div class="text-lg text-zinc-300 my-4 font-semibold">
                    <i class="fa-solid fa-money-bill"></i> ${{$listing->salary}}
                </div>
                <div class="text-lg text-zinc-300 my-4 font-semibold">
                    <i class="fa-solid fa-keyboard"></i> {{$listing->type}}
                </div>
            </div>
            <div class="border border-violet-400 w-full mb-6"></div>
                <a
                    href="mailto:{{$listing->email}}"
                    class="block bg-indigo-800 hover:opacity-80 text-white py-2 px-2 mt-6 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-envelope"></i>
                    Contact Employer</a
                >

                <a
                    href="{{$listing->website}}"
                    target="_blank"
                    class="block bg-black text-white py-2 px-2 mt-3 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-globe"></i> Visit
                    Website</a
                >
        </div>

    </x-card>


    <x-card class="w-8/12 rounded-none border-0">
        <div class="flex flex-col items-center justify-center text-center">
            <h3 class="text-3xl font-bold mb-4 text-indigo-900">
                Job Description
            </h3>
            <div class="border border-violet-200 w-full mb-6"></div>
            <div class="text-lg space-y-6">
                {{$listing->description}}
                
            </div>
            <div class="absolute bottom-0 inset-x-0 h-12 w-12">

            </div>
        </div>
    </x-card>
</div>
</div>

</x-layout>