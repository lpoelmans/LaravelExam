<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <u><a href="search">Zoek uw favoriete film</a></u>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <u><a href="myfav">Uw opgeslagen films</a></u>
        </h2>
    </x-slot>
    @isset ($savedmovies)
        <div class="row mt-3">
            @foreach ($savedmovies as $savedmovie )
                <h5>{{$savedmovie->imdbID}}</h5>
            @endforeach  
        </div>
        @endif 
</x-app-layout>