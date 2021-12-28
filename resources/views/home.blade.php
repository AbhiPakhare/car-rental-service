@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
    </svg>

    @if(! auth()->check())
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <div>
                Ready for you next big ride. <a href="{{route('customer.register')}}" class="alert-link">register</a> with us and rent it
            </div>
        </div>
    @endif
    @if(auth()->check())
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Filters
                </h3>
                <form action="{{route('main')}}" method="get">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">For how many days you want ?</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="rent_for_days">
                                <option selected disabled>-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Start date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="start_date">
                        </div>
                    </div>

                    <a href="{{route('main')}}" class="btn btn-danger">clear filter</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endif
    <div class="my-5">
        {{ $cars->links() }}
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($cars as $car)
            <div class="col">
                <div class="card h-100">
                    <img src="https://picsum.photos/id/111/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$car->vehicle_model}}</h5>
                        <dl class="row">
                            <dt class="col-sm-5">Model</dt>
                            <dd class="col-sm-6">{{$car->vehicle_model}}</dd>

                            <dt class="col-sm-5">Vehicle Number</dt>
                            <dd class="col-sm-6">{{$car->vehicle_number}}</dd>

                            <dt class="col-sm-5">Seating Capacity</dt>
                            <dd class="col-sm-6">{{$car->seating_capacity}}</dd>

                            <dt class="col-sm-5">Agent Name</dt>
                            <dd class="col-sm-6">{{$car->agent->name}}</dd>

                            <dt class="col-sm-5">Rent Per day</dt>
                            <dd class="col-sm-6">{{$car->rent_per_day}}</dd>
                            <dt class="col-sm-5">Registered on</dt>
                            <dd class="col-sm-6">{{\Carbon\Carbon::parse($car->created_at)->format('d-M-Y') }}</dd>
                        </dl>
                        @can('customer')
                            <div class="d-grid">
                                <a href="{{route('customer.create_booking',['id' => $car->id])}}" class="btn btn-warning text-white">Book Now</a>
                            </div>

                        @endcan
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated {{\Carbon\Carbon::parse($car->created_at)->format('d-M-Y H:i a') }} ago</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-5">
        {{ $cars->links() }}
    </div>
@endsection
