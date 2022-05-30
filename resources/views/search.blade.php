@extends('layouts.theme')
    @section('content')
    <div class="container mt-5">
        <h1 class="mb-5">Movie Searcher</h1>

        <div class="row">
            <form action="search" method="post">
            @csrf
                <div class="col-md-6">
                    <label class="form-label">Search your favorite movies</label>
                    <input type="text" class="form-control" name="movie">
                </div>
                <div class="col-md-6">
                <button type="submit" class="btn btn-secondary mt-3">Search</button>
                </div>
            </form>
        </div>
        @auth
        <p class="mt-3 mb-3"><a href="register" class="text-black"> Go to Dashboard </a></p>
        @endauth
{{--         <form action="/surprise" method="post">
            @csrf
                <div class="col-md-3">
                <button type="submit" class="btn btn-primary mt-3">Surprise</button>
                </div>
        </form>  --}}
        @isset ($response)
        <h1 class="mt-5">Results</h1>
        <div class="row mt-5">
            @foreach ($response->Search as $item )
                    <div class="card" style="width:33%"> 
                    <h2 class="mt-3">{{$item->Title}}</h2>
                    <p>{{$item->Type}} from {{$item->Year}}</p>
                    <img src="{{$item->Poster}}" class="card-img-top">
                    @auth
                    <button class="btn btn-secondary m-3" href="/myfav/{{$item->imdbID}}">Save</button>
                    @endauth
                </div>
            @endforeach 
        </div>
        @endif    
    @endsection