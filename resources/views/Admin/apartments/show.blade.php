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
                    <span class="title-lista">Beds:</span> {{ $apartment->beds }}
                </li>
                <li>
                    <span class="title-lista">Baths:</span> {{ $apartment->baths }}
                </li>
                <li>
                    <span class="title-lista">Meters:</span> {{ $apartment->meters }}
                </li>
                <li>
                    <span class="title-lista">Price:</span> <span class="fw-bold text-danger">{{ $apartment->price }}</span>
                </li>
                <li>
                    <span class="title-lista">Address</span> <br> {{ $apartment->address }}
                </li>
                <li>
                    <span class="title-lista">Description:</span> <br> {{ $apartment->description }}
                </li>
            </ul>

        </div>




    </div>
@endsection
