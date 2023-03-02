@extends('layouts.app')

@section('content')
<?php
dump($apartments)
?>
    <div class="container mt-5">

        <h1 class="py-3">{{ Auth::user()->name }}'s Dashboard</h1>

        <section>
            <div class="d-flex justify-content-center w-100 py-3">
                {{-- profile image --}}
                <div class="infobox-img">

                    <img src="{{ asset('img/user.png') }}" alt="img user" width="180" height="180" class="user">
                </div>



                {{-- info --}}
                <div class=" p-3">
                    <div class="fw-bold fs-2 ">
                        {{ Auth::user()->name }} {{ Auth::user()->surname }}
                    </div>
                    <p class="">
                        {{ Auth::user()->email }}
                    </p>
                    <p class="">
                        {{ Auth::user()->birthdate }}
                    </p>
                </div>
            </div>

            {{-- add new post --}}
            <div>
                <a class="btn btn-newapartment" href="{{ route('admin.apartments.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Inserisci Appartamento

                </a>
            </div>
        </section>
        {{-- apartments --}}
        <section class="container d-flex row mt-4 mx-auto">
            {{-- title --}}
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="col-12">Le mie inserzioni</h3>
                </div>
                <div>
                    {{-- <button type="button" class="notifica modal-dialog modal-dialog-scrollable" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zm-2 0v-7a6 6 0 1 0-12 0v7h12zm-9 4h6v2H9v-2z"
                                fill="currentColor"></path>
                        </svg>
                    </button> --}}
                    <button type="button" class="notifica " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zm-2 0v-7a6 6 0 1 0-12 0v7h12zm-9 4h6v2H9v-2z"
                                fill="currentColor"></path>
                        </svg>
                    </button>

                    {{-- modale --}}
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Messaggi</h1>
                            </div>
                            <div class="modal-body">
                              @foreach ($apartments as $apartment)
                                @foreach($apartment->messages as $item)

                                <div class="messaggio">
                                    <div class="fw-bold">
                                        {{$item->name}} {{ $item->surname }} é interessato a {{$apartment->name}}
                                    </div>
                                    <div>
                                        {{$item->email}} | {{ $item->date }}
                                    </div>
                                    <div>
                                        {{ $item->message }}
                                    </div>
                                </div>
                                @endforeach
                              @endforeach
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                          </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="container pb-5 mt-5 d-flex flex-wrap justify-content-evenly">
                {{-- loop --}}
                @foreach ($apartments as $item)
                    {{-- card --}}
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset("storage/$item->cover") }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-info">
                            <p class="text-title">{{ $item->name }} </p>
                            <p class="text-body">Posti letto: {{ $item->beds }}</p>
                        </div>
                        <div class="card-footer">
                            <span class="text-title bold-violet">&euro;{{ $item->price }}</span>
                            <div class="d-flex align-items-center justify-content-evenly mt-3">
                                <div>
                                    <a href="{{ route('admin.apartments.show', $item->id) }}" class="card-link"><button
                                            class="butt-2"><i class="fa-solid fa-info"></i></button></a>
                                </div>

                                <div>
                                    <a href="{{ route('admin.apartments.edit', $item->id) }}" class="card-link"><button
                                            class="butt-2"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                </div>

                                <div>
                                    <button type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#{{ $item->id }}">
                                        cancella
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>

                                                </div>
                                                <div class="modal-body">
                                                    sei sicuro di voler cancellaere <span
                                                        class="fw-bold">{{ $item->name }}</span> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class=""
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form method="POST" id="delete-form"
                                                        action="{{ route('admin.apartments.destroy', $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="">Cancella</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div>
                                    <form method="POST" id="delete-form" action="{{ route('admin.apartments.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="">Cancella</button>
                                    </form>

                                </div> --}}

                                <!-- Modale di conferma -->
                                {{-- <div class="modal" id="confirmDeleteModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger">Conferma cancellazione</h5>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler cancellare l'appartamento <span class="fw-bold">{{$item->name}}</span>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="" data-dismiss="modal">Annulla</button>
                                                <form method="POST" action="{{ route('admin.apartments.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="">Cancella</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>

                        </div>
                    </div>
                @endforeach
                {{-- loop end --}}

            </div>




    </div>
@endsection
