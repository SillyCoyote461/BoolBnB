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
        // dd($data);
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
        if(array_key_exists('visibility', $data)) {
            $new_apartment->visibility = true;
        }
        else{
            $new_apartment->visibility = false;
        }

        // address map info
        $new_apartment->address = $data['address'];
        $new_apartment->lat = $data['lat'];
        $new_apartment->lon = $data['lon'];

        // get user id
        $new_apartment->user_id = Auth::id();

        // cover storage
        $cover_url= Storage::put('apartment_cover', $data['cover']);
        $data['cover'] = $cover_url;
        $new_apartment->cover = $data['cover'];

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
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        // dd($apartment);
        return route('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::find($id);
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
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $apartment = Apartment::findOrFail($id);
        // delete old cover
        if(array_key_exists('cover', $data)){
            // delete old img
            Storage::delete($apartment->cover);
            // update new img
            $cover_url= Storage::put('apartment_cover', $data['cover']);
            $data['cover'] = $cover_url;
        }

        $apartment->save();
        return redirect()->route('admin.apartments.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(apartment $id)
    {
        $apartment = Apartment::findOrFail($id);
        // delete cover from storage
        Storage::delete($apartment->cover);
        // delete services
        $apartment->services()->sync();
        // delete apartment
        $apartment->delete();
        return redirect()->route('admin.apartments.index');
    }
}
