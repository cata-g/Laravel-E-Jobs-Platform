@props(['tagsCSV'])

@php 
    $tags = explode(',', $tagsCSV);
@endphp

<ul class="flex ml-1">
    @foreach($tags as $tag)
        <li class="flex items-center justify-center
        text-white rounded-xl py-1 px-3 mr-2 text-xs mt-2 mb-2"
        style="background-color: #17153A">
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>