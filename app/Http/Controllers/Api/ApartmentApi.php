<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\apartment;
use App\Models\service;

class ApartmentApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $apartments = Apartment::all();
        // return response()->json($apartments);


        $query = Apartment::query();
        $query->where('visibility', '=', true);
        $data['apartments'] = $query->get();
        $data['services'] = Service::all();
        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return response()->json($apartment);

    }
}
