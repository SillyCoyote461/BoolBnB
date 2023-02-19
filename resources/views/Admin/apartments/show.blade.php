@extends('layouts.app')
@section('content')
    <div class="container pb-5">

        <div>
            <img src=" {{ asset("storage/$apartment->cover") }} " alt="" class="w-100">
        </div>
        <div>
            <div class="fs-1 fw-bold mt-3">
                {{ $apartment->name }}
            </div>
            <ul>
                <li>
                    <span class="fw-bold fs-4">Rooms:</span> {{ $apartment->rooms }}
                </li>
                <li>
                    <span class="fw-bold fs-4">Beds:</span> {{ $apartment->beds }}
                </li>
                <li>
                    <span class="fw-bold fs-4">Baths:</span> {{ $apartment->baths }}
                </li>
                <li>
                    <span class="fw-bold fs-4">Meters:</span> {{ $apartment->meters }}
                </li>
                <li>
                    <span class="fw-bold  fs-4">Price:</span> <span class="fw-bold text-danger">{{ $apartment->price }}</span>
                </li>
                <li>
                    <span class="fw-bold fs-4">Address</span> <br> {{ $apartment->address }}
                </li>
                <li>
                    <span class="fw-bold fs-4">Description:</span> <br> {{ $apartment->description }}
                </li>
            </ul>

        </div>




    </div>
@endsection
