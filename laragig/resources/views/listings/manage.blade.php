<x-layout>
    <x-card class="p-10 mt-20 mx-10 bg-violet-50">
        <a href="/" class="text-indigo-700 ml-4 font-semibold"> Back </a>
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase text-indigo-900"
            >
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($listings->isEmpty())
                @foreach($listings as $listing)
                <tr class="border-violet-300">
                    <td
                        class="px-4 py-8 border-t border-b border-violet-300 text-lg text-indigo-800 font-semibold"
                    >
                        <a href="show.html">
                           {{$listing->title}}
                        </a>
                    </td>
                    <td
                        class="py-8 border-t border-b border-violet-300 text-lg text-indigo-800 font-semibold"
                    >
                        <a
                            href="/listings/{{$listing->id}}/edit"
                            class="text-indigo-700 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <form action="/listings/{{$listing->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i>Delete
                        </button>
                    </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Listings Found</p>
                    </td>
                </tr> 
                @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>