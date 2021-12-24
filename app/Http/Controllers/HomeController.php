<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(Request $request)
    {
        $cars = Car::whereNull('customer_id')->inRandomOrder();
        if (!empty($request->rent_for_days)) {
            $cars = $cars->where('rent_for_days', $request->rent_for_days);
        }
        if (!empty($request->start_date)) {
            $cars = $cars->where('start_date', $request->start_date);
        }
        $cars = $cars->paginate(6);
        return view('home', compact('cars'));
    }

    public function createBooking(Request $request)
    {
        $car = Car::findOrFail($request->id);
        return view('customer.create_booking', compact('car'));
    }

    public function bookCab(Request $request)
    {
        $car = Car::findOrFail($request->id);
        $car->customer_id = auth()->user()->id;
        $car->save();
        return redirect()->route('main')->with('success', 'You have successfully booked your cab');

    }
}
