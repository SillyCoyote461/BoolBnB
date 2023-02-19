@extends('layouts.app')
@section('content')
    <div class="container pb-5">

        <div>
            <img src=" {{ asset("storage/$apartment->cover") }} " alt="" class="w-100">
        </div>
        <div>
            <div class="fs-2 fw-bold mt-3">
                {{ $apartment->name }}
            </div>
            <ul>
                <li>
                    <span class="fw-bold">Rooms:</span>  {{$apartment->rooms}}
                </li>
                <li>
                    <span class="fw-bold">Beds:</span> {{$apartment->beds}}
                </li>
                <li>
                    <span class="fw-bold">Baths:</span> {{$apartment->baths}}
                </li>
                <li>
                    <span class="fw-bold">Meters:</span> {{$apartment->meters}}
                </li>
                <li>
                    <span class="fw-bold text-danger">Price:</span> {{$apartment->price}}
                </li>
                <li>
                    <span class="fw-bold">Address</span> <br> {{$apartment->address}}
                </li>
                <li>
                    <span class="fw-bold">Description:</span> <br> {{$apartment->description}}
                </li>
            </ul>
        </div>




    </div>
@endsection
