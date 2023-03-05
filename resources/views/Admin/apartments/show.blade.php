@extends('layouts.app')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-6 mb-5">
                <img src=" {{ asset("storage/$apartment->cover") }} " alt="" class="img-show">
            </div>

            <div class="left-description col-md-6">
                <div class="titolo-show text-center">
                    {{ $apartment->name }}
                </div>
                <ul class="pl-0 p-3">
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
