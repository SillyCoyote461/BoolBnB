@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="py-3">{{ Auth::user()->name }}'s Dashboard</h1>

        <section>
            <div class="d-flex justify-content-evenly w-100 py-3">
                <div class="infobox-img">
                    img
                </div>

                <div class="separator">

                </div>

                <div class="infobox-info">
                    informazioni
                </div>
            </div>

            <div>
                <a class="btn btn-newapartment" href="{{ route('admin.apartments.create') }}">
                    Inserisci nuovo appartamento
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>


        </section>









    </div>
@endsection
