<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\image;
use App\Models\apartment;
use App\Models\message;
use App\Models\service;
use App\Models\view;
use App\Models\sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// storage
use Illuminate\Support\Facades\Storage;
class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', '=', auth()->id())->get();


        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $services = Service::all();
        return view('Admin.apartments.create', compact('services'));
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

        // new model
        $new_apartment = new Apartment();

        // apartment strings
        $new_apartment->name = $data['name'];
        $new_apartment->description = $data['description'];

        // numerical data
        $new_apartment->rooms = $data['rooms'];
        $new_apartment->beds = $data['beds'];
        $new_apartment->baths = $data['baths'];
        $new_apartment->meters = $data['meters'];
        $new_apartment->price = $data['price'];

        // visibility conditions
        if($data['visibility'] == null) {
            $new_apartment->visibility = false;
        }
        else{
            $new_apartment->visibility = true;
        }

        // address map info
        $new_apartment->address = $data['address'];
        $new_apartment->lat = $data['lat'];
        $new_apartment->lon = $data['lon'];

        // get user id
        $new_apartment->user_id = Auth::id();

        // cover storage
        $new_apartment->cover = $data['cover'];
        $cover_url= Storage::put('apartment_cover', $data['cover']);
        $data['cover'] = $cover_url;

        // save record
        $new_apartment->save();

        // service sync
        if(array_key_exists('services', $data)){
            $new_apartment->services()->sync($data['services']);
        }

        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(apartment $apartment_id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(apartment $apartment_id)
    {
        $apartment = Apartment::findOrFail($apartment_id);
        $services = Service::all();

        return view('admin.apartments.edit', compact('apartment', 'services'));
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
