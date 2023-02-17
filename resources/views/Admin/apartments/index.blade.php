@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="py-3">{{ Auth::user()->name }}'s Dashboard</h1>

        <section>
            <div class="d-flex justify-content-evenly w-100 py-3">
                {{-- profile image --}}
                <div class="infobox-img">
                    img
                </div>

                {{-- separator --}}
                <div class="separator">
                </div>

                {{-- info --}}
                <div class="infobox-info">
                    informazioni
                </div>
            </div>

            {{-- add new post --}}
            <div>
                <a class="btn btn-newapartment" href="{{ route('admin.apartments.create') }}">
                    Inserisci inserzione
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </section>
        {{-- apartments loop --}}
        <section class="container d-flex row mt-4">
            {{-- title --}}
            <h3 class="col-5">Le mie inserzioni</h3>
            {{-- search bar --}}
            <div class="input-group input-group-sm mb-3 col-4">
                <input type="text" class="form-control col-4" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>

        </section>

    </div>
@endsection
