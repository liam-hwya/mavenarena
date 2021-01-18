@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add {{ $user->name }} Profile</div>

                <div class="card-body">

                    <form action="{{ route('profile-store',$user->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">

                            <label for="avatar">Profile Picture</label>

                            <input type="file" id="avatar" name="avatar" class="form-control-file">

                        </div>
                   
                        <div class="form-group">

                            <label for="phone">Phone</label>

                            <input 
                            
                                type="text" 
                                id="phone" 
                                name="phone" 
                                class="form-control" 
                                
                                value="{{ old('phone') }}">

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
                                
                                {{ old('address') }}
                            
                            </textarea>

                            @error('address')

                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                
                            @enderror

                        </div>

                        <div class="form-group">

                            <button class="btn btn-primary" type="submit">Add</button>

                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
