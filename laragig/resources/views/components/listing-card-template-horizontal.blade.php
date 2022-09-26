
<div class="rounded-md w-full bg-white px-4 py-4 shadow-md transition transform duration-500 cursor-pointer">
    <div class="flex flex-col justify-start">
      <div class="flex justify-between items-center w-full">
        <div class="text-lg font-semibold text-bookmark-blue flex space-x-3 items-center mb-2">
            <img class="w-12 h-12 rounded" src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}" />
          <span>{{$listing->title}}</span>
        </div>
      </div>
    </div>

    <div class="flex justify-between">
        <x-listing-tag :tagsCSV="$listing->tags"/>
        <a class="mr-2 my-1 uppercase tracking-wider px-2 text-indigo-600 
        border-indigo-600 hover:bg-indigo-600 hover:text-white border 
        text-sm font-semibold rounded py-1 transition 
        transform duration-500 cursor-pointer" href="/listings/{{$listing->id}}">Apply</a>

    </div>
    <div class="flex space-x-10">
      <div class="text-md font-semibold flex space-x-1 items-center text-gray-500 ml-2 mt-2 mb-1">
        <i class="fa-solid fa-building"></i><span>{{$listing->company}}</span>
        </div>
        <div class="text-md font-semibold flex space-x-1 items-center text-gray-500 ml-2 mt-2 mb-1">
            <i class="fa-solid fa-location-dot"></i><span>{{$listing->location}}</span>
        </div>
    </div>
  </div>