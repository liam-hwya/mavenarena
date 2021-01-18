@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card mt-1" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Total Staffs</h5>
                      <p class="card-text">{{ $staffs->count() }}</p>
                    </div>
                </div>

            </div>

        </div>

        <hr>

        @if(session('message'))

            <span class="text-primary">{{ session('message') }}</span>

        @endif

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="row">

                    @foreach ($staffs as $staff)

                    <div class="col-md-6">
                        <div class="card mt-3" style="width: 18rem;">
                            <div class="card-body">
                            <h5 class="card-title">{{ $staff->name }}</h5>
                            <p class="card-text">{{ $staff->email }}</p>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach

                </div>

            </div>

            <div class="col-md-6">

                @if(session('message'))

                    <span class="text-primary">{{ session('message') }}</span>

                @endif

                <form method="POST" action="{{ route('staff-store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Staff') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection