@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card1 w-100">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right text-light fw-bold">{{ __('Name') }} *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control form-control1 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right text-light fw-bold">{{ __('Surname') }} *</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control form-control1 @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right text-light fw-bold">{{ __('date of birth') }} *</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control form-control1 @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate">

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-light fw-bold">{{ __('E-Mail Address') }} *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label  text-md-right text-light fw-bold">{{ __('Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control1 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-light fw-bold">{{ __('Confirm Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-control1" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bottonefigo">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf
            <p class="purple">Register</p>
            <div class="group">
                {{-- <input required="true" class="main-input" type="text"> --}}
                <input id="name" type="text" class="main-input form-control1 @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="highlight-span"></span>
                <label class="lebal-email">Nome</label>
            </div>


            <div class="group mt-4">
                {{-- <input required="true" class="main-input" type="text"> --}}
                <input id="surname" type="text" class="main-input form-control1 @error('surname') is-invalid @enderror"
                    name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="highlight-span"></span>
                <label class="lebal-email">Cognome</label>
            </div>

            <div class="group mt-4">
                {{-- <input required="true" class="main-input" type="text"> --}}
                <label class="purple">Data di Nascita</label>
                <input id="birthdate" type="date"
                    class="form-control form-control1 @error('birthdate') is-invalid @enderror" name="birthdate"
                    value="{{ old('birthdate') }}" required autocomplete="birthdate">

                @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="highlight-span"></span>
                <label class="lebal-email"></label>
            </div>

            <div class="group mt-4">
                {{-- <input required="true" class="main-input" type="text"> --}}
                <input id="email" type="email" class="main-input form-control1 @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="highlight-span"></span>
                <label class="lebal-email">Email</label>
            </div>

            <div class="group mt-4">
                {{-- <input required="true" class="main-input" type="text"> --}}
                <input id="password" type="password"
                    class="main-input form-control1 @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="highlight-span"></span>
                <label class="lebal-email">Password</label>
            </div>

            <div class="group mt-4">
                {{-- <input required="true" class="main-input" type="text"> --}}
                <input id="password-confirm" type="password" class="main-input form-control1" name="password_confirmation" required autocomplete="new-password">
                <span class="highlight-span"></span>
                <label class="lebal-email">Confirm Password</label>
            </div>




            
            <button class="bottonefigo mt-3">Registrati</button>
        </form>
    </div>
@endsection
