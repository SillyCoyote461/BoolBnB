@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>DASHBOARD</h1>

        <section>
            <div class="d-flex justify-content-evenly w-100">
                <div>
                    img
                </div>

                <div>
                    informazioni
                </div>
            </div>

            <div>
                <a href="{{ route('admin.apartments.create') }}">
                    Crea un nuovo post
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>


        </section>









    </div>
@endsection
