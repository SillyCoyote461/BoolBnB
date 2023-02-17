@extends('layouts.app')
@section('content')

<div class="container my-5">
    <h1>Modifica inserzione</h1>

    <form class="container my-4" action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- name --}}
        <div>
            <label class="form-label" for="name">Titolo</label>
            <input class="form-control" type="text" id="name" name="name" value="{{$apartment->name}}">
        </div>
        {{-- description --}}
        <div class="form-floating my-3">
            <textarea class="form-control" id="description">{{$apartment->description}}</textarea>
            <label for="description">Descrizione</label>
        </div>
        {{-- section apartment --}}
        <section class="container px-0 d-flex gap-5">
            {{-- rooms --}}
            <span>
                <label class="form-label" for="rooms">Stanze</label>
                <input value="1" min="1" step="1" type="number" id="rooms" class="form-control" name="rooms" value="{{$apartment->rooms}}" style="width: 100px;"/>
            </span>
            {{-- beds --}}
            <span>
                <label class="form-label" for="beds">Posti letto</label>
                <input value="1" min="1" step="1" type="number" id="beds" class="form-control" name="beds" value="{{$apartment->beds}}" style="width: 100px;"/>
            </span>
            {{-- baths --}}
            <span>
                <label class="form-label" for="baths">Bagni</label>
                <input value="1" min="1" step="1" type="number" id="baths" class="form-control" name="baths" value="{{$apartment->baths}}" style="width: 100px;"/>
            </span>
            {{-- meters --}}
            <span>
                <label class="form-label" for="meters">Metri quadri</label>
                <input value="1" min="1" step="1" type="number" id="meters" class="form-control" name="meters" value="{{$apartment->meters}}" style="width: 100px;"/>
            </span>
        </section>
        {{-- section address --}}
        <section class="container px-0 mt-3 row">
            {{-- address --}}
            <div class="col-5">
                <label class="form-label" for="">Indirizzo</label>
                <input class="form-control" type="text" name="address" value="{{$apartment->address}}">
            </div>
            {{-- lat --}}
            <div class="col-1">
                <label class="form-label" for="">Latitudine</label>
                <input class="form-control" type="text" name="lat" value="{{$apartment->lat}}">
            </div>
            {{-- lon --}}
            <div class="col-1">
                <label class="form-label" for="">Longitudine</label>
                <input class="form-control" type="text" name="lon" value="{{$apartment->lon}}">
            </div>
        </section>
        {{-- services --}}
        <div class="mt-3">
            <label>Servizi: </label>

            @foreach ($services as $service)
                <label class="mx-2" for="service{{$service->id}}">
                    <input type="checkbox" id="service{{$service->id}}" name="services[]" value="{{ $service->id }}" {{$apartment->services->contains($service) ? 'checked' : ''}}>
                    {{ $service->name }}
                </label>
            @endforeach

        </div>

        {{-- cover --}}
        <div class="my-3 ">
            <label for="cover" class="form-label">Aggiungi Cover</label>
            <input class="form-control" type="file" id="cover" name="cover">
        </div>

        {{-- visibility --}}
        <div class="form-check form-switch mb-5">
            <input name="visibility" class="form-check-input" type="checkbox" role="switch" id="visibility" {{$apartment->visibility ? 'checked' : ''}}>
            <label class="form-check-label" for="visibility">Visibilitá</label>
        </div>

        {{-- submit --}}
        <button class="btn btn-success">Aggiorna inserzione</button>
    </form>
</div>

