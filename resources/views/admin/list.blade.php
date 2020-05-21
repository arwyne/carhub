@extends('layouts.template')

@section('title', 'CarHub')

@section('body')


<div class="container-fluid bg-prof-list">
    <div class="col-lg-8 offset-lg-2">
    
        <div class="prof-list-container">
            <div class="row prof-list-header">
                <h3>List of Assets</h3>
            </div>

            <div class="row search-container">
                <div class="col">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                </div>
            </div>

        
            <div class="row prof-list-body">      
                
                    <div class="col table-container">

        
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <div class="sort-container">
                                                    <a href="/assets"><i class="fas fa-caret-square-up"></i></a>
                                                </div>
                                                <div class="sort-container">
                                                    <a href="/assets/?sort=asc"><i class="fas fa-caret-square-down"></i></a>
                                                </div>
                                            </div>
                                            <div>Date Added:</div>
                                        </div>
                                    </th>
                                    <th>Car Model</th>
                                    <th>Car Description</th>
                                    <th>Transmission</th>
                                    <th>Category</th>
                                    <th>Rates</th>
                                    <th>Available</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                <tr>
                                    <td>
                                        {{ Carbon\Carbon::parse($car->created_at)->isoFormat('M/D/YY HH:mm a') }}
                                    </td>
                                    <td>
                                        {{ $car->model }}
                                    </td>
                                    <td>
                                        {{ $car->description }}
                                    </td>
                                    <td>
                                        {{ $car->transmission }}
                                    </td>
                                    <td>
                                        {{ $car->category()->get()->first()->category_name}}
                                    </td>
                                    <td>
                                        &#8369;{{ number_format($car->rates) }}
                                    </td>
                                    <td>
                                        {{ $car->quantity }}
                                    </td>
                                    <td>
                                        <a href="/assets/{{$car->id}}/delete"><i class="fas fa-times text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    
                        </table>
        
                    </div>
            </div>


        </div>
    </div>
</div>





@endsection

<script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>






