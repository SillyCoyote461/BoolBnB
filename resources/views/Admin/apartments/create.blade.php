@extends('layouts.app')
@section('content')


<div class="container my-5">
    <h1>Crea inserzione</h1>

    <form class="container my-4" action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- name --}}
        <div>
            <label class="form-label" for="name">Titolo *</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                 required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- description --}}
        <div class="form-floating my-3">
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required ></textarea>
            <label for="description">Descrizione *</label>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- section apartment --}}
        <section class="container px-0 d-flex gap-5">
            {{-- rooms --}}
            <span>
                <label class="form-label" for="rooms">Stanze *</label>
                <input min="1" step="1" type="number" id="rooms"
                    class="form-control @error('rooms') is-invalid @enderror" name="rooms"
                     style="width: 100px;" required>
                @error('rooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </span>
            {{-- beds --}}
            <span>
                <label class="form-label" for="beds">Posti letto *</label>
                <input min="1" step="1" type="number" id="beds"
                    class="form-control @error('beds') is-invalid @enderror" name="beds"
                     style="width: 100px;" required>
                @error('beds')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </span>
            {{-- baths --}}
            <span>
                <label class="form-label" for="baths">Bagni *</label>
                <input min="1" step="1" type="number" id="baths"
                    class="form-control @error('baths') is-invalid @enderror" name="baths"
                     style="width: 100px;" required>
                @error('baths')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </span>
            {{-- price --}}
            <span>
                <label class="form-label" for="price">Prezzo *</label>
                <input min="1" step="0.01" type="number" id="price"
                    class="form-control @error('price') is-invalid @enderror" name="price"
                     style="width: 100px;" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </span>


            {{-- meters --}}
            <span>
                <label class="form-label" for="meters">Metri quadri *</label>
                <input min="1" step="1" type="number" id="meters" class="form-control" name="meters"
                     required />
                @error('meters')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </span>
        </section>
        {{-- section address --}}
        <section class="container px-0 mt-3 row">
            {{-- address --}}
            <div class="col-5">
                <label class="form-label" for="address">Indirizzo *</label>
                <input class="form-control" type="text" name="address"  required>
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- lat --}}
            {{-- id="floatingInputDisabled" --}}

            <div class="col-2">
                <label class="form-label" for="lat">Latitudine *</label>
                <input class="form-control " type="text" name="lat" required>
                @error('lat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-2">
                <label class="form-label" for="lon">Longitudine *</label>
                <input class="form-control disabled" type="text" name="lon"  required>
                @error('lon')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </section>
        {{-- services --}}
        <div class="mt-4">
            <label>Servizi: </label>

            @foreach ($services as $service)
                <label class="mx-2" for="service{{$service->id}}">
                    <input type="checkbox" id="service{{$service->id}}" name="services[]" value="{{ $service->id }}">
                    {{ $service->name }}
                </label>
            @endforeach

        </div>

     {{-- cover --}}
     <div class="my-3 ">
        <label for="cover" class="form-label">Aggiungi Cover*</label>
        <input class="form-control" type="file" id="cover" name="cover" required>
        @error('cover')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

        {{-- visibility --}}
        <div class="form-check form-switch mb-5">
            <input name="visibility" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Visibilità</label>
        </div>

        {{-- submit --}}
        <button class="" type="submit">Crea</button>
    </form>
</div>


@endsection
