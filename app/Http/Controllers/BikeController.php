<?php

namespace App\Http\Controllers;

use App\Bike;
use App\PositionUpdate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class BikeController extends Controller
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
        // $availableBikes = Bike::where('available', true)->with('position')->get();
        // return response()->json($availableBikes);
        
        $response = Http::get('localhost:80/status')->json();

        Bike::updateOrCreate(
            ['id'   => $response['bike']],
            ['name' => 'john']
        );

        PositionUpdate::create([
            'bike_id' => $response['bike'],
            'latitude' => $response['latitude'],
            'longitude' => $response['longitude'],
            'created_at' => Carbon::now()->toDateTimeString()
        ])->save();

        

        $availableBikes = Bike::where('available', true)->with('position')->get();
        return response()->json($availableBikes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b = new Bike([
            'name' => $request->name
        ]);

        try {
            $b->save();
        }
        catch (\Throwable $exception){
            report($exception);
            return response('Bike could not be created', 500);
        }

//        $p = new PositionUpdate([
//            'bike_id' => $b->id,
//            'latitude' => $request.lat,
//            'longitude' => $request.lon
//        ]);
//
//        try {
//            $p->save();
//        }
//        catch (\Throwable $exception){
//            report($exception);
//            return response('Position Update could not be created', 500);
//        }
        return response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Bike $bike)
    {
        return response()->json($bike);
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
        try {
            $bike->delete();
        }
        catch (\Throwable $exception)
        {
            report($exception);
            return response('Bike could not be deleted', 500);
        }

        return response()->setStatusCode(200);
    }
}
