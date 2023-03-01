<?php

namespace App\Http\Controllers\Api;

use App\Models\apartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Apartment::query();

        // Applica i filtri se sono stati forniti nella richiesta
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('price')) {
            $query->where('price', '<=', $request->input('price'));
        }

        if ($request->has('rooms')) {
            $query->where('rooms', '>=',$request->input('rooms'));
        }

        if ($request->has('baths')) {
            $query->where('baths', '>=',$request->input('baths'));
        }

        if ($request->has('beds')) {
            $query->where('beds', '>=',$request->input('beds'));
        }

        if ($request->has('meters')) {
            $query->where('meters', '<=', $request->input('meters'));
        }

        if ($request->has('address')) {
            $query->where('address', 'like', '%' . $request->input('address') . '%');
        }

        if ($request->has('services')) {
            $services = $request->input('services');
            foreach ($services as $service) {
                $query->whereHas('services', function ($q) use ($service) {
                    $q->where('name', $service);
                });
            }
        }
        // range
            // longitudine
            // $range_x = 0.012 * $range;
            // $range_x_max = $request->input('lon') + $range_x;
            // $range_x_min = $request->input('lon') - $range_x;
            //     // latitudine
            // $range_y = 0.009 * $range;
            // $range_y_max = $request->input('lat') + $range_y;
            // $range_y_min = $request->input('lat') - $range_y;
            // lon query
            // $query->where([
                //     ['lon', '<=', $range_x_max],
                //     ['lon', '>=', $range_x_max]
                // ]);
                // // lat query
                // $query->where([
                    //     ['lat', '<=', $range_y_max],
                    //     ['lat', '>=', $range_y_max]

                    // ]);
        if($request->has('range')){

            $range = $request->input('range');
            $lat = $request->input('lat');
            $lon = $request->input('lon');

            $query->whereBetween('lat', [$lat - ($range / 111), $lat + ($range / 111)])
            ->whereBetween('lon', [$lon - ($range / (111 * cos(deg2rad($lat)))), $lon + ($range / (111 * cos(deg2rad($lat))))]);
        }

        $query->where('visibility', '=', true);

        // Esegui la query e restituisci i risultati come JSON
        $apartments = $query->get();

        return response()->json($apartments);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
