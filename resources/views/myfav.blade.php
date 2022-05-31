@extends('layouts.theme')
    @section('content')
    <div class="container mt-5">
        <div class="container">
            <h1 class="mb-5">Your Favorite Movies</h1>
        </div>
        <div class="container">
            <p class="mt-3 mb-3"><a href="register" class="text-black"> Go to Dashboard </a></p>
            @isset ($savedmovies)
            <div class="row mt-3">
                @foreach ($savedmovies->savedmovie as $item )
                    @php
                        $favs = Http::get('http://www.omdbapi.com/?apikey=ad34cbc1&i='.$item->imdbID);
                        $favs = json_decode($favs);
                    @endphp
                    <div class="card" style="width:25%"> 
                        <h2 class="mt-3">{{$favs->Title}}</h2>
                        <p>{{$favs->Type}} from {{$favs->Year}}</p>
                        <img src="{{$favs->Poster}}" class="card-img-top rounded">
                    </div>
                @endforeach  
            </div>
            @endif  
        </div>
    @endsection

