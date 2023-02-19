@extends('layouts.app')
@section('content')
    <div class="container pb-5">

        <div>
            <img src=" {{ asset("storage/$apartment->cover") }} " alt="" class="img-show">
        </div>
        <div class="left-description p-5 mt-5">
            <div class="titolo-show">
                {{ $apartment->name }}
            </div>
            <ul>
                <li>
                    <span class="title-lista">Rooms:</span>
                    <div class="riga ps-3 text-light fw-bold">
                        {{ $apartment->rooms }}
                    </div>
                </li>
                <li>
                    <span class="title-lista">Beds:</span>
                    <div class="riga ps-3 text-light fw-bold">
                        {{ $apartment->beds }}
                    </div>
                </li>
                <li>
                    <span class="title-lista">Baths:</span>
                    <div class="riga ps-3 text-light fw-bold">
                        {{ $apartment->baths }}
                    </div>
                </li>
                <li>
                    <span class="title-lista">Meters:</span>
                    <div class="riga ps-3 text-light fw-bold">
                        {{ $apartment->meters }}
                    </div>
                </li>
                <li>
                    <span class="title-lista">Price:</span>
                    <div class="riga ps-3 text-light fw-bold">
                        {{ $apartment->price }} &euro;
                    </div>
                </li>
                <li>
                    <span class="title-lista">Address</span>
                    <div class="riga ps-3 text-light fw-bold">
                        {{ $apartment->address }}
                    </div>
                </li>
                <li>
                    <span class="title-lista">Description:</span>
                    <div class="riga ps-3 text-light fw-bold">
                        {{ $apartment->description }}
                    </div>
                </li>
            </ul>

        </div>




    </div>
@endsection
