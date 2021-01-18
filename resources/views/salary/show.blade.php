@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ $salary->user->name }}</b></div>

                <div class="card-body">

                        <form action="{{ route('salary-update',$salary->id) }}" method="POST" id="salaryForm" >
                        
                            @csrf

                            @method('PUT')

                            <div class="form-group">

                                <label for="position">Position</label>

                                <input type="text" id="position" name="position" class="form-control" value="{{ $salary->position }}">

                            </div>

                            @error('position')

                                <span class="text-danger">{{ $errors->first('position') }}</span>
                                    
                            @enderror

                            <div class="form-group">

                                <label for="amount">Amount</label>

                                <input type="text" id="amount" name="amount" class="form-control" value="{{ $salary->amount }}">

                            </div>

                            @error('amount')

                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                    
                            @enderror

                            <div class="form-group">

                                <button class="btn btn-primary" type="submit" form="salaryForm" >Update</button>

                            </div>

                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
