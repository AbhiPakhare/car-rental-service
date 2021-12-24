@extends('layouts.app')
@section('content')
    <div class="row d-flex justify-content-center align-content-center">
        <div class="card w-50">
            <div class="card-body">
                <h3 class="card-title">
                    Book Cab
                </h3>
                <hr>
                <form action="{{route('customer.book_cab',['id'=> $car->id ])}}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Car Model</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$car->vehicle_model}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Car Number</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$car->vehicle_number}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Rent Per Day</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$car->rent_per_day}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Rent For Days</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$car->rent_for_days}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Total Rent</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" value="{{$car->total_rent_of_one_ride}}">
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
