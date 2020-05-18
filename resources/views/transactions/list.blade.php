@extends('layouts.template')

@section('title', 'CarHub')

@section('body')

<div class="container">
    @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col">
            
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>
                            <div class="d-flex align-items-center">
                                <div>
                                    <div>
                                        <a href="/transactions"><i class="fas fa-caret-square-up"></i></a>
                                    </div>
                                    <div>
                                        <a href="/transactions?sort=asc"><i class="fas fa-caret-square-down"></i></a>
                                    </div>
                                </div>
                                <div>Reservation Created</div>
                            </div>
                        </th>
                        <th>Reference No.</th>
                        <th>Customer Name</th>
                        <th>Category</th>
                        <th>Car Model</th>
                        <th>Pickup Time</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>
                            {{ Carbon\Carbon::parse($reservation->reservation_created)->isoFormat('M/D/YY HH:mm a') }}
                        </td>
                        <td>
                            <a href="/transactions/{{$reservation->id}}">{{ $reservation->reference_no }}</a>
                        </td>
                        <td>
                            <a href="#">{{ $reservation->user()->first()->firstname . " " . $reservation->user()->first()->lastname }}</a>
                        </td>
                        <td>
                            {{ $reservation->car()->first()->category()->first()->category_name }}
                        </td>
                        <td>
                            <a href="/cars/{{$reservation->car()->first()->id}}">{{ $reservation->car()->first()->model }}</a>
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
                            {{ $reservation->status()->first()->status_name }}
                        </td>

                        @if($reservation->status_id == 1)
                        <td>
                            {{-- <a href="transactions/{{ $reservation->id }}/deploy"><i class="fas fa-check text-info"></i></a> --}}
                            <a href="/transactions/{{ $reservation->id }}/deploy"><i class="fas fa-car text-info"></i></a>
                        </td>
                        <td>
                            <a href="/transactions/{{ $reservation->id }}/delete"><i class="fas fa-times text-danger"></i></a>
                        </td>

                        @elseif($reservation->status_id == 2)
                        <td>
                            <a href="/transactions/{{ $reservation->id }}/return"><i class="fas fa-check text-success"></i></a>
                        </td>
                        <td>
                            <a href="/transactions/{{ $reservation->id }}/delete"><i class="fas fa-times text-danger"></i></a>
                        </td>

                        @else
                        <td></td>
                        <td>
                            <a href="/transactions/{{ $reservation->id }}/delete"><i class="fas fa-times text-danger"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection