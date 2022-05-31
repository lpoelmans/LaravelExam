@extends('layouts.theme')
    @section('content')
    <div class="container mt-5">
        <div class="container">
            <h1 class="mb-5">Movie Searcher</h1>
        </div>
        <div class="container">
            <form action="search" method="post">
            @csrf
                <div class="bg-secondary p-4 rounded">
                    <label class="form-label text-white">Search your favorite movies</label>
                    <input type="text" class="form-control" name="movie">
                    <button type="submit" class="btn btn-light mt-3">Search</button>
                </div>
            </form>
        </div>
        <div class="container">
            <form action="surprise" method="post">
            @csrf
                <div class="mt-3 bg-secondary rounded p-4">
                    <div class="text-white mb-2">Find the common denominator and win a surprise!</div>
                    <button type="submit" class="btn btn-light"> Double U Surprise</button>
                </div>
            </form>
        </div>
        <div class="container">
            <p class="mt-3 mb-3"><a href="register" class="text-black"> Go to Dashboard </a></p>
            @isset ($response)
            <h1 class="mt-5">Results</h1>
            <div class="row mt-5">
                @foreach ($response->Search as $item )
                        <div class="card" style="width:25%"> 
                        <h2 class="mt-3">{{$item->Title}}</h2>
                        <p>{{$item->Type}} from {{$item->Year}}</p>
                        <img src="{{$item->Poster}}" class="card-img-top">
                        @auth
                        <button class="btn btn-secondary m-3"><a href="/search/{{$item->imdbID}}" class="text-white">Save</a></button>
                        @endauth
                    </div>
                @endforeach
            </div> 
        </div>
        @endif    
    @endsection