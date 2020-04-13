<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Booking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availableBikes = Bike::where('available', true)->get();
        return response($availableBikes->toJson());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bike $bike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        //
    }

    public function getNearest()
    {
        // return bike with smallest distance to user
    }

    public function book(Bike $bike, User $user)
    {
        $bike->available = false;
        $bike->save();

        $booking = new Booking([
            'bike_id' => $bike->id,
            'user_id' => $user->id,
            //TODO Change start_position
            'start_position' => 'user position'
        ]);
        $booking->save();
    }

    public function unBook(Bike $bike)
    {
        $bike->available = true;
        $bike->save();

        $booking = Booking::where('bike_id', $bike->id)->first();
        $booking->completed = true;
        $booking->save();
    }
}
