@extends('layouts.template')

@section('title', 'CarHub')

@section('body')


<div class="container-fluid bg-prof-list">
    <div class="col-lg-8 offset-lg-2">
    
        <div class="prof-list-container">
            <div class="row prof-list-header">
                <h3>Transaction History</h3>
            </div>

            {{-- <div class="row search-container">
                <div class="col">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                </div>
            </div> --}}

        
            <div class="row prof-list-body">      
                
                    <div class="col table-container">

        
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <div class="sort-container">
                                                    <a href="/profile/transactions"><i class="fas fa-caret-square-up"></i></a>
                                                </div>
                                                <div class="sort-container">
                                                    <a href="/profile/transactions?sort=asc"><i class="fas fa-caret-square-down"></i></a>
                                                </div>
                                            </div>
                                            <div>Reservation Created</div>
                                        </div>
                                    </th>
                                    <th>Reference No.</th>
                                    <th>Category</th>
                                    <th>Car Model</th>
                                    <th>Pickup Time</th>
                                    <th>Pickup Date</th>
                                    <th>Return Date</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                <tr>
                                    <td>
                                        {{ Carbon\Carbon::parse($reservation->reservation_created)->isoFormat('M/D/YY HH:mm a') }}
                                    </td>
                                    <td>
                                        {{ $reservation->reference_no }}
                                    </td>
                                    <td>
                                        {{ $reservation->car()->first()->category()->first()->category_name }}
                                    </td>
                                    <td>
                                        {{ $reservation->car()->first()->model }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($reservation->pickup_time)->isoFormat('h:mm a') }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($reservation->pickup_date)->isoFormat('M/D/YY')}}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($reservation->return_date)->isoFormat('M/D/YY')}}
                                    </td>
                                    <td>
                                        &#8369;{{ number_format($reservation->total_price) }}
                                    </td>
                                    <td>
                                        {{ $reservation->status()->get()->first()->status_name }}
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

{{-- <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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



 --}}




