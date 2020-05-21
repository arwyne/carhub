@extends('layouts.template')

@section('title', 'CarHub')

@section('body')

<div class="container-fluid bg-car-edit">
    <div class="col-lg-5 col-md-6 offset-lg-1 offset-md-1">
        

        <div class="car-edit-container">
            <div class="row car-edit-header">
                <h3>Update Car's Information</h3>
            </div>

            
            <form action="/cars/{{ $car->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row car-edit-body">
    
                    <div class="col add-image">
                        
                        <div class="col add-image">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 250px; height: 175px;"></div>
                                <div>
                                    <span class="btn btn-dark btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    </span>
                                    <a href="#" class="btn btn-dark fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                        
                    <div class="col add-form">

                        <div class="form-group">
                            <label for="">Car Model:</label>
                            <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ $car->model }}" required>
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">Car Description:</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $car->description }}"required>
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">Rates/day:</label>
                            <input type="number" name="rates" class="form-control @error('rates') is-invalid @enderror" step="0.01" value="{{ $car->rates }}" required>
                            @error('rates')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">Quantity:</label>
                            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ $car->quantity }}" required>
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">Category:</label>
                            <select name="category" id="" class="form-control" value="{{ $car->category_id }}" required>
                                <option value="" disabled>Select your option</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="">Transmission:</label>
                            <select name="transmission" id="" class="form-control" value="{{ $car->transmission }}" required>
                                <option value="" disabled>Select your option</option>
                                <option value="Automatic Transmission">Automatic Transmission</option>
                                <option value="Manual Transmission">Manual Transmission</option>
                            </select>
                        </div>
    
                        
                    </div>
        
                </div>

                <div class="row">
                    <div class="col">
                        <button class="btn-block type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    
</div>


@endsection



