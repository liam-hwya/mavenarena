@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ $user->name }}</b></div>

                <div class="card-body">

                    @if($user->profile == null)

                        <p>There is no user profile information <a href="{{ route('profile-add',$user->id) }}">add now</a></p>

                    @else

                        <form action="{{ route('profile-update',$user->profile->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            @method('PUT')

                            @if ($user->file->avatar)

                                <img src="{{ $user->file->avatar }}" alt="" width="200" height="200">
                                
                            @else

                                <div class="form-group">

                                    <label for="avatar">Profile Picture</label>

                                    <input type="file" id="avatar" name="avatar" class="form-control-file">

                                </div>
                                
                            @endif
                    
                            <div class="form-group">

                                <label for="phone">Phone</label>

                                <input 
                                
                                    type="text" 
                                    id="phone" 
                                    name="phone" 
                                    class="form-control" 
                                    
                                    value="{{ $user->profile->phone }}">

                                @error('phone')

                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="address">Address</label>

                                <textarea 
                                
                                    name="address" 
                                    id="address" 
                                    cols="30" 
                                    rows="10" 
                                    class="form-control">
                                    
                                    {{ $user->profile->address }}
                                
                                </textarea>

                                @error('address')

                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    
                                @enderror

                            </div>

                            <div class="form-group">

                                <button class="btn btn-primary" type="submit">Update</button>

                            </div>

                        </form>

                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
