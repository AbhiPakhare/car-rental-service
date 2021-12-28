@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <p>
                From {{$cars->firstItem()}} - {{$cars->lastItem()}} out of {{ $cars->total() }} total car entries
            </p>
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @forelse($cars as $car)
                <div class="accordion accordion-flush" id="accordionFlushExample-{{$loop->iteration}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{$loop->iteration}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{$car->vehicle_model}} : {{$car->vehicle_number}}
                            </button>
                        </h2>
                        <div id="flush-collapseOne-{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample-{{$loop->iteration}}">
                            <div class="accordion-body">
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">Vehicle Model</th>
                                        <th scope="col">Vehicle Number</th>
                                        <th scope="col">Seating Capacity</th>
                                        <th scope="col">Rent Per Day</th>
                                        <th scope="col">Rent For Days</th>
                                        <th scope="col">Registered on Platform</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Total Rent</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$car->vehicle_model}}</td>
                                        <td>{{$car->vehicle_number}}</td>
                                        <td>{{$car->seating_capacity}}</td>
                                        <td>₹ {{$car->rent_per_day}}</td>
                                        <td>{{$car->rent_for_days}} days</td>
                                        <td>{{date_format($car->created_at,'d-M-Y')}}</td>
                                        <td>{{$car->start_date ?? "Not Allocated"}}</td>
                                        <td> {{$car->total_rent_of_one_ride ? "₹". $car->total_rent_of_one_ride : "Not Allocated"}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="alert alert-success" role="alert">
                    Welcome {{auth()->user()->name}}
                </div>
                <div class="alert alert-secondary" role="alert">
                    No Car Booked yet
                </div>
            @endforelse
            <div class="my-5">
                {{ $cars->links() }}
            </div>
        </div>
    </div>

@endsection
