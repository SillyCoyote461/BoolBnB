@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="py-3">{{ Auth::user()->name }}'s Dashboard</h1>

        <section>
            <div class="d-flex justify-content-evenly w-100 py-3">
                {{-- profile image --}}
                <div class="infobox-img">
                    {{-- <img src="../../public/img/user.png" alt=""> --}}
                    img
                </div>

                {{-- separator --}}
                <div class="separator">
                </div>

                {{-- info --}}
                <div class="infobox-info p-3">
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
        <section class="container d-flex row mt-4 mx-auto">
            {{-- title --}}
            <h3 class="col-12">Le mie inserzioni</h3>

            <div class="container pb-5 mt-5 d-flex flex-wrap justify-content-evenly ">
                {{-- loop --}}
                @foreach ($apartments as $item)
                {{-- card --}}
                <div class="card" style="width: 18rem;">
                    {{-- cover --}}
                    <img src="{{asset("storage/$item->cover")}}" class="card-img-top" alt="...">
                    {{-- title description --}}
                    <div class="card-body">
                      <h5 class="card-title">{{$item->name}}</h5>
                      <p class="card-text">{{$item->description}}</p>
                    </div>
                    {{-- price beds --}}
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Prezzo per notte: {{$item->price}}</li>
                      <li class="list-group-item">Posti letto: {{$item->beds}}</li>
                      {{-- services loop --}}
                      @if (property_exists('services', $item))
                      <li class="list-group-item">
                          Servizi:
                          @foreach ( $item->services as $item)
                          <a href="">#{{$item['name']}}</a>
                          @endforeach
                        </li>
                        @endif
                    </ul>
                    <div class="card-body d-flex justify-content-between">
                      <a href="{{route('admin.apartments.show', $item->id)}}" class="card-link"><button class="butt-1"><i class="fa-solid fa-info"></i></button></a>
                      <a href="{{route('admin.apartments.edit', $item->id)}}" class="card-link"><button class="butt-2"><i class="fa-solid fa-pen-to-square"></i></button></a>
                    </div>
                  </div>
                @endforeach
                {{-- loop end--}}
            </div>

        </section>

    </div>
@endsection
