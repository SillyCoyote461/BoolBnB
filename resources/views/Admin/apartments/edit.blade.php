@extends('layouts.app')
@section('content')


<div class="container">
    <h1>edit</h1>

    <form class="container" action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- name --}}
        <div>
            <label class="form-label" for="">Nome</label>
            <input class="form-control" type="text" name="name" value="{{$apartment->name}}">
        </div>
        {{-- rooms --}}
        <div>
            <label class="form-label" for="">Stanze</label>
            <input class="form-control" type="number" name="rooms" value="{{$apartment->rooms}}">
        </div>
        {{-- beds --}}
         <div>
            <label class="form-label" for="">Posti letto</label>
            <input class="form-control" type="number" name="beds" value="{{$apartment->beds}}">
        </div>
        {{-- baths --}}
        <div>
            <label class="form-label" for="">Bagni</label>
            <input class="form-control" type="number" name="baths" value="{{$apartment->baths}}">
        </div>
        {{-- meters --}}
        <div>
            <label class="form-label" for="">Metri quadri</label>
            <input class="form-control" type="number" name="meters" value="{{$apartment->meters}}">
        </div>
        {{-- address --}}
        <div>
            <label class="form-label" for="">Indirizzo</label>
            <input class="form-control" type="text" name="address" value="{{$apartment->address}}">
        </div>
        {{-- visibility --}}
        <div class="form-check form-switch">
            <input name="visibility" class="form-check-input" {{$apartment->visibility ? 'checked' : ''}} type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Visibilitá</label>
        </div>
        {{-- description --}}
        <div class="form-floating">
            <textarea class="form-control" id="floatingTextarea">{{$apartment->description}}</textarea>
            <label for="floatingTextarea">Descrizione</label>
        </div>
        {{-- lat --}}
        <div>
            <label class="form-label" for="">Latitudine</label>
            <input class="form-control" type="text" name="lat" value="{{$apartment->lat}}">
        </div>
        {{-- lon --}}
        <div>
            <label class="form-label" for="">Longitudine</label>
            <input class="form-control" type="text" name="lon" value="{{$apartment->lon}}">
        </div>
        {{-- services --}}
        <div class="my-3">
            <label>Servizi</label>

            @foreach ($services as $service)
                <label>
                    <input type="checkbox {{$apartment->services->contains($service) ? 'checked' : ''}}" name="services[]" value="{{ $service->id }}">
                    {{ $service->name }}
                </label>
            @endforeach

        </div>
        {{-- cover --}}
        <div class="my-3">
            <label for="">Cambia Cover</label>
            <input type="file" name="cover" class="form-control-file">
        </div>
        {{-- submit --}}
        <button class="btn btn-success">Aggiorna inserzione</button>
    </form>
</div>
