<?php

namespace App\Http\Controllers\Admin;

use App\Models\image;
use App\Models\apartment;
use App\Models\message;
use App\Models\service;
use App\Models\view;
use App\Models\sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.apartments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_apartment = new Apartment();
        $new_apartment->name = $data['name'];
        $new_apartment->rooms = $data['rooms'];
        /* $new_apartment->beds = $data['beds'];
        $new_apartment->baths = $data['baths'];
        $new_apartment->meters = $data['meters'];
        $new_apartment->address = $data['address'];
        $new_apartment->visibility = $data['visibility'];
        $new_apartment->description = $data['description'];
        $new_apartment->cover = $data['cover'];
        $new_apartment->lat = $data['lat'];
        $new_apartment->lon = $data['lon']; */
        $new_apartment->save();

        return redirect()->route('apartments.index', ['id' => $new_record->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(apartment $apartment)
    {
        //
    }
}
