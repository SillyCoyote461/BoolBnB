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
        {{-- apartments --}}
        <section class="container d-flex row mt-4 mx-auto">
            {{-- title --}}
            <h3 class="col-12">Le mie inserzioni</h3>

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
                            <p class="text-body">Posti letto: {{$item->beds}}</p>
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
                                    <form method="POST" action="{{ route('admin.apartments.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="butt-2"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
                {{-- loop end --}}

            </div>

        </section>

    </div>
@endsection
