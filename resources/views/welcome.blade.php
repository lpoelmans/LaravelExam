@extends('layouts.theme')
    @section('content')
    
    <div class="container mt-5 ">
        <div class="bg-secondary text-white p-3 rounded">
            <h1>Welcome to our movie search engine</h1>
        </div>
    </div>
    <div class="container mt-5">
        <div class="rounded p-3 shadow">
            <h5 class="mb-3">If you wish to save your favorite movies please <button class="btn btn-secondary"><a class="text-white text-decoration-none" href="register">Register</a></button> and/or <button class="btn btn-secondary"><a href="login" class="text-white text-decoration-none">Log In</a></button></h5>
            <h4 class="mb-3"> OR </h4>
            <h5>If you just want to browse <button class="btn btn-secondary"><a href="search" class="text-white text-decoration-none">Go ahead </a></button></h5>
        </div>
    </div>


