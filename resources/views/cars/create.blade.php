@extends('layouts.template')

@section('title', 'CarHub')

@section('body')
    
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                @if(session('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                
                <form action="/cars" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="">Car Model:</label>
                    <input type="text" name="model" class="form-control" required>
                    @error('model') <p>This field is required</p> @enderror

                    <label for="">Car Description:</label>
                    <input type="text" name="description" class="form-control" required>
                    @error('model') <p>This field is required</p> @enderror
                    

                    <label for="">Rates/Day:</label>
                    <input type="number" name="rates" class="form-control" step="0.01" required>
                    @error('rates') {{ $message }} @enderror

                    <label for="">Quantity:</label>
                    <input type="number" name="quantity" class="form-control" required>
                    @error('quantity') {{ $message }} @enderror

                    <label for="">Category:</label>
                    <select name="category" id="" class="form-control" required>
                        <option value="" disabled selected>Select your option</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>

                    <label for="">Transmission:</label>
                    <select name="transmission" id="" class="form-control" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Automatic Transmission">Automatic Transmission</option>
                        <option value="Manual Transmission">Manual Transmission</option>
                    </select>

                    <label for="">Upload Image:</label>
                    <input type="file" name="image" class="form-control" required>
                    @error('image') {{ $message }} @enderror

                    <button class="btn btn-primary" type="submit">Submit</button>

                </form>
                
            </div>
        </div>

    </div>


@endsection