@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if(session('message'))

                <span class="text-primary">{{ session('message') }}</span>

            @endif

            @foreach($users as $user)

            <div class="card mt-5">
                <div class="card-header">
                  {{ $user->salary != null ? $user->salary->position : 'Staff'}}
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ ucwords($user->name) }}</h5>
                  <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae, reiciendis?</p>
                  <a href="{{ route('profile-show',$user->id)}}" class="btn btn-primary">See More</a>
                </div>
              </div>

            @endforeach

        
        </div>
        <div class="col-md-6"></div>
    </div>
</div>
@endsection
