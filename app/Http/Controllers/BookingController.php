<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Booking::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b = new Booking([
            'user_id' => $request.user_id,
            'bike_id' => $request.bike_id,
            'start_position' => $request.position,
        ]);

        try {
            $b->save();
        }
        catch (\Throwable $exception){
            report($exception);
            return response('Booking could not be created', 500);
        }

        return response('Booking created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Booking $booking)
    {
        return response()->json($booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        try {
            $booking->end_position = $request.position;
            $booking->completed = true;
        }
        catch (\Throwable $exception){
            report($exception);
            return response('Booking could not be updated', 500);
        }

        return response('Booking has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
        }
        catch (\Throwable $exception)
        {
            report($exception);
            return response('Booking could not be deleted', 500);
        }

        return response('Booking has been deleted');
    }
}
