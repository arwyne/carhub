@extends('layouts.template')

@section('title', 'CarHub')

@section('body')

<div class="container-fluid bg-dashboard">
    <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-1">

        <div class="dashboard-container">
            <div class="row">
                <h3>Dashboard</h3>
            </div>

            <div class="row">
                <div class="col registered board">
                    <h4><span><i class="fas fa-users"></i></span> Registered Users</h4>
                    <p>{{ $registered }}</p>
                </div>

                <div class="col pending board">
                    <h4><span><i class="far fa-thumbs-up"></i></span> Pending Reservations</h4>
                    <p>{{ $pending }}</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col deployed board">
                    <h4><span><i class="fas fa-car-side"></i></span> Deployed Cars</h4>
                    <p>{{ $deployed }}</p>
                </div>
                
                <div class="col profit board">
                    <h4><span><i class="far fa-money-bill-alt"></i></span> Total Profit</h4>
                    <p>&#8369;{{ $profit }}</p>
                </div>
            </div>


        </div>


    </div>
</div>


@endsection