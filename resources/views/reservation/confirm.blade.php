isoFormat('MMMM Do YYYY, h:mm:ss a')

@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <p> {{ $time }}</p>
            </div>

            <form action="/confirm/send" method="POST">
                @csrf
                <a href="/"><button class="btn btn-primary">Confirm</button></a>
            </form>

        </div>

    </div>

@endsection