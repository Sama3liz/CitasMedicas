@extends('layouts.form')

@section('content')
<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="{{ asset('vendors/images/register-page-img.png') }}" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="register-box bg-white box-shadow border-radius-10">
                    <div class="card">
                        <!-- <form id="userForm" method="POST" action="{{ route('register') }}" class="tab-wizard2 wizard-circle wizard">
                            @csrf
                            {{-- Step 1 --}}
                            <h5>Basic Account Credentials</h5>
                            <section data-step="1">
                                <div class="form-wrap max-width-600 mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Full Name*</label>
                                        <div class="col-sm-8">
                                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Email Address*</label>
                                        <div class="col-sm-8">
                                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Identification*</label>
                                        <div class="col-sm-8">
                                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Password*</label>
                                        <div class="col-sm-8">
                                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Confirm Password*</label>
                                        <div class="col-sm-8">
                                            <input id="password-confirm" name="password-confirm" type="password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            // Step 2 
                            <h5>Overview Information</h5>
                            <section data-step="3">
                                <div class="form-wrap max-width-600 mx-auto">
                                    <ul class="register-info">
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">Email Address</div>
                                                <div class="col-sm-8">Email</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">Name</div>
                                                <div class="col-sm-8">Example</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-4 weight-600">Password</div>
                                                <div class="col-sm-8">.....000</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="custom-control custom-checkbox mt-4">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">I have read and agreed to the terms of services and privacy policy</label>
                                    </div>
                                </div>
                            </section>
                        </form> -->
                        <form method="POST" action="{{ route('register') }}" class="m-3">
                            @csrf
                            <div class="form-group">
                                <div class="col mb-3">
                                    <label for="name" class="col-md-12 col-form-label text-md-end">{{ __('Full Name') }}</label>
                                    <br>
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="identification" class="col-md-12 col-form-label text-md-end">{{ __('Identification') }}</label>
                                    <div class="col-md-12">
                                        <input id="identification" type="text" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ old('identification') }}" required autocomplete="1234567890">
                                        @error('identification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="email" class="col-md-12 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="password" class="col-md-12 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="password-confirm" class="col-md-12 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <br>
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
