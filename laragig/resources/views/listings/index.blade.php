<x-layout>

@include('partials._hero')
@include('partials._search')


<div class="2xl:grid 2xl:grid-cols-3 lg:grid lg:grid-cols-2 gap-5 space-y-2 md:grid-cols-2 mx-4">

    @if(count($listings) == 0)
        <p>No listings found!</p>
    @endif

    @foreach($listings as $listing)

        <x-listing-card-template-horizontal :listing="$listing"/>

    @endforeach

</div>

<div class="mt-6 p-4">{{$listings->links()}}</div>

</x-layout>