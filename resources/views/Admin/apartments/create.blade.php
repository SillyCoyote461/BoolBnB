@extends('layouts.app')
@section('content')


<div class="container">
    <h1>CREATE</h1>

    <form class="container" action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="form-label" for="">Nome</label>
            <input class="form-control" type="text" name="name">
        </div>

        <div>
            <label class="form-label" for="">rooms</label>
            <input class="form-control" type="text" name="rooms">
        </div>

        {{-- <div>
            <label class="form-label" for="">beds</label>
            <input class="form-control" type="text" name="beds">
        </div>

        <div>
            <label class="form-label" for="">baths</label>
            <input class="form-control" type="text" name="baths">
        </div>

        <div>
            <label class="form-label" for="">meters</label>
            <input class="form-control" type="text" name="meters">
        </div>

        <div>
            <label class="form-label" for="">address</label>
            <input class="form-control" type="text" name="address">
        </div>

        <div>
            <label class="form-label" for="">visibility</label>
            <input class="form-control" type="text" name="visibility">
        </div>

        <div>
            <label class="form-label" for="">description</label>
            <input class="form-control" type="text" name="description">
        </div>

        <div>
            <label class="form-label" for="">cover</label>
            <input class="form-control" type="text" name="cover">
        </div>

        <div>
            <label class="form-label" for="">lat</label>
            <input class="form-control" type="text" name="lat">
        </div>

        <div>
            <label class="form-label" for="">lon</label>
            <input class="form-control" type="text" name="lon">
        </div> --}}


        {{-- <div class="my-3">
            <label for="">Socials</label>
            <select name="category_id" id="">
                <option value="">Seleziona il tuo social preferito</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div> --}}

        {{-- <div class="my-3">
            <label for="">Tipo di cibo</label>

            @foreach ($tags as $tag)
                <label for="">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    {{ $tag->name }}
                </label>
            @endforeach

        </div> --}}

        {{-- <div class="my-3">
            <label for="">Aggiungi Cover</label>
            <input type="file" name="image" class="form-control-file">
        </div> --}}

        <button class="btn btn-success">Crea post</button>
    </form>
</div>


@endsection
