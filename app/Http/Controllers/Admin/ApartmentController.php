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

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'rooms' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'beds' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'meters' => 'required|integer|min:1',
            'address' => 'required',
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'services' => 'array',
            'services.*' => 'integer|exists:services,id',
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


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
        // apartment class
        $apartment = Apartment::find($id);
        // logged user id
        $auth_id = Auth::user()->id;
        // authorization
        if ($auth_id != $apartment->user_id){
            return abort(403, 'Unauthorized action');
        }
        // dd($apartment);
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // apartment class
        $apartment = Apartment::find($id);
        // logged user id
        $auth_id = Auth::user()->id;
        // authorization
        if ($auth_id != $apartment->user_id){
            return abort(403, 'Unauthorized action');
        }
        // services class
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
        // dd($data);
        $apartment = Apartment::findOrFail($id);
        // delete old cover
        if(array_key_exists('cover', $data)){
            // delete old img
            Storage::delete($apartment->cover);
            // update new img
            $cover_url= Storage::put('apartment_cover', $data['cover']);
            $data['cover'] = $cover_url;
        }
        // visibility
        if(array_key_exists('visibility', $data)) {
            $data['visibility'] = true;
        }
        else{
            $data['visibility'] = false;
        }

        $apartment->update($data);
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Apartment::findOrFail($id);
        $data->services()->sync([]);
        $data->delete();
        return redirect()->route('admin.apartments.index');
        // apartment class
        // $apartment = Apartment::find($id);

        // // logged user id
        // $auth_id = Auth::user()->id;

        // // authorization
        // if ($auth_id != $apartment->user_id){
        //     return abort(403, 'Unauthorized action');
        // }

        // // delete cover from storage
        // Storage::delete($apartment->cover);

        // // delete services
        // foreach($apartment->services as $item) {
        //     $apartment->services()->detach($item->id);
        // }

        // // delete apartment
        // $apartment->delete();
        // return redirect()->route('admin.apartments.index');
    }
}
