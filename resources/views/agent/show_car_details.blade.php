@extends('layouts.agent_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">
                Car Details
            </h2>
            <hr>
            <div class="my-2">
                <a href="{{route('agent.cars.index')}}" class="btn btn-primary me-md-2 btn-lg">Home</a>
            </div>
            <div class="mb-3">
                <label for="Vehicle Model" class="form-label">Model</label>
                <input type="text" disabled class="form-control" id="vehicle_model" name="vehicle_model" value="{{$car->vehicle_model}}">

            </div>
            <div class="mb-3">
                <label for="Vehicle number" class="form-label">Vehicle number</label>
                <input type="text" disabled class="form-control" id="vehicle_number" name="vehicle_number" value="{{$car->vehicle_number}}">
            </div>
            <div class="mb-3">
                <label for="Seating Capacity" class="form-label">Seating Capacity</label>
                <input type="number" disabled class="form-control" id="seating_capacity" name="seating_capacity" value="{{$car->seating_capacity}}">
            </div>
            @if($car->rent_for_days)
            <div class="mb-3">
                <label for="rent_for_days" class="form-label">Rented for days</label>
                <input type="text" disabled class="form-control" id="rent_for_days" name="rent_for_days" value="{{$car->rent_for_days}}">
            </div>
            @endif
            <label for="Rent Per Day" class="form-label">Rent Per Day</label>
            <div class="mb-3 input-group">
                <span class="input-group-text" id="rent_per_day">₹</span>
                <input type="number" disabled class="form-control" id="rent_per_day" name="rent_per_day" value="{{$car->rent_per_day}}">
            </div>
            @if($car->start_date)
            <div class="mb-3">
                <label for="Rent for days" class="form-label">Start date</label>
                <input type="text" class="form-control" id="start_date" name="start_date" disabled value="{{$car->start_date}}">
            </div>
            @endif
            @if($car->total_rent_of_one_ride)
            <div class="mb-3">
                <label for="Rent for days" class="form-label">Total Rent</label>
                <input type="text" class="form-control" id="total_rent" name="total_rent_of_ride" disabled value="{{$car->total_rent_of_one_ride}}">
            </div>
            @endif
            <a href="{{route('agent.cars.edit',[$car])}}" class="btn btn-warning text-white btn-lg">Edit</a>
        </div>
    </div>
@endsection
