<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <u><a href="search">Search your favorite movies</a></u>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <u><a href="myfav">Your saved movies</a></u>
        </h2>
    </x-slot>
    @isset ($savedmovies)
        <div class="row mt-3">
            @foreach ($savedmovies->savedmovie as $item )
                @php
                    $favs = Http::get('http://www.omdbapi.com/?apikey=ad34cbc1&i='.$item->imdbID);
                    $favs = json_decode($favs);
                @endphp
                    <div class="container">
                        <div class="card" style="width:25%"> 
                            <h2 class="mt-3">{{$favs->Title}}</h2>
                            <p>{{$favs->Type}} from {{$favs->Year}}</p>
                            <img src="{{$favs->Poster}}" class="card-img-top rounded">
                        </div>
                    </div>
            @endforeach  
        </div>
    @endif 
</x-app-layout>