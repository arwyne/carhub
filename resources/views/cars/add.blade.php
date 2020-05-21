@extends('layouts.template')

@section('title', 'CarHub')

@section('body')

<div class="container-fluid bg-add-cars">
    <div class="col-lg-5 col-md-6 offset-lg-1">

            <div class="cars-add-container">
                <div class="row cars-add-header">
                    <h3>Add Cars</h3>
                </div>
                
                <form action="/cars/add/save" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row cars-add-body">
        
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
                            
                        <div class="col add-form">

                            <div class="form-group">
                                <label for="">Car Model:</label>
                                <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" required>
                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Car Description:</label>
                                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                            <div class="form-group">
                                <label for="">Rates/Day:</label>
                                <input type="number" name="rates" class="form-control @error('rates') is-invalid @enderror" step="0.01" required>
                                @error('rates')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Quantity:</label>
                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Category:</label>
                                <select name="category" id="" class="form-control" required>
                                    <option value="" disabled selected>Select your option</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Transmission:</label>
                                <select name="transmission" id="" class="form-control" required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Automatic Transmission">Automatic Transmission</option>
                                    <option value="Manual Transmission">Manual Transmission</option>
                                </select>
                            </div>
                        </div>
            
                    </div>

                    <div class="row">
                        <div class="col">
                            <button class="btn-block type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

    </div>
</div>


@endsection

 {{-- <label for="">Upload Image:</label>
                        <input type="file" name="image" class="form-control" required> --}}
                        

                        