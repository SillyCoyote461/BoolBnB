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
        {{-- apartments--}}
        <section class="container d-flex row mt-4">
            {{-- title --}}
            <h3 class="col-12">Le mie inserzioni</h3>

            <div class="container mt-2">
                {{-- loop --}}
                @foreach ($my_apartments as $item)
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">An item</li>
                      <li class="list-group-item">A second item</li>
                      <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                  </div>
                @endforeach
                {{-- loop end--}}
            </div>

        </section>

    </div>
@endsection
