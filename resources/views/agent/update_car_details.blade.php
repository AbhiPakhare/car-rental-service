@extends('layouts.agent_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">
                Update Car details
            </h2>
            <hr>
            <h3>
                Model : {{$car->vehicle_model}}
            </h3>
            <form action="{{route('agent.cars.update',[$car])}}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="Vehicle Model" class="form-label">Model</label>
                    <input type="text" class="form-control @error('vehicle_model') is-invalid @enderror" id="vehicle_model" name="vehicle_model" value="{{$car->vehicle_model}}">
                    @error('vehicle_model')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Vehicle number" class="form-label">Vehicle number</label>
                    <input type="text" class="form-control @error('vehicle_model') is-invalid @enderror" id="vehicle_number" name="vehicle_number" value="{{$car->vehicle_number}}">
                    @error('vehicle_number')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Seating Capacity" class="form-label">Seating Capacity</label>
                    <input type="number" class="form-control @error('seating_capacity') is-invalid @enderror" id="seating_capacity" name="seating_capacity" value="{{$car->seating_capacity}}">
                    @error('seating_capacity')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <label for="Rent Per Day" class="form-label">Rent Per Day</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="rent_per_day">₹</span>
                    <input type="number" class="form-control @error('rent_per_day') is-invalid @enderror" id="rent_per_day" name="rent_per_day" value="{{$car->rent_per_day}}">
                    @error('rent_per_day')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
