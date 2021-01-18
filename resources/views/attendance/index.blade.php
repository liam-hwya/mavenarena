@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('message'))

        <span class="text-primary">{{ session('message') }}</span>

    @endif

    @if(session('error'))

        <span class="text-danger">{{ session('error') }}</span>

    @endif

    <h3>Attendance Record Information</h3>

    <div class="row justify-content-center">

        <div class="col-md-7">

            <form action="{{ route('attendance-store') }}" method="POST" id="attendance-form">

                @csrf

                <div class="form-group">

                    <label for="name">Name</label>

                    <select name="user_id" id="name" class="form-control">

                        <option value="" selected disabled>Choose Name</option>

                        @foreach ($users as $key=>$user)

                            <option 
                            
                                value="{{ $user->id }}" 
                                
                                @if (old('user_id') == (++$key))
                                    selected
                                @endif
                                
                            >{{ $user->name }}</option>
                            
                        @endforeach

                    </select>

                </div>

                @error('user_id')

                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                
                @enderror

                <div class="form-group">

                    <label for="attend_date">Date</label>

                    <input type="text" name="attend_date" class="form-control" id="attend_date" value="{{ date('Y-m-d') }}" readonly>

                </div>

                @error('attend_date')

                    <span class="text-danger">{{ $errors->first('attend_date') }}</span>
                                
                @enderror

                <div class="row">

                    <div class="col">

                        <div class="form-group">

                            <label for="in_time">In Time</label>

                            <input type="time" name="in_time" id="in_time" class="form-control" value="{{ date('H:i') }}">

                        </div>

                        @error('in_time')

                            <span class="text-danger">{{ $errors->first('in_time') }}</span>
                                
                        @enderror

                    </div>

                    <div class="col">

                        <div class="form-group">

                            <label for="out_time">Out Time</label>

                            <input type="time" name="out_time" id="out_time" class="form-control" value="{{ date('H:i') }}">

                        </div>

                        @error('out_time')

                            <span class="text-danger">{{ $errors->first('out_time') }}</span>
                                
                        @enderror

                    </div>

                </div>

                <div class="form-group">

                    <label for="remark">Remark</label>

                    <textarea name="remark" id="remark" cols="30" rows="3" class="form-control"></textarea>

                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-primary" form="attendance-form">Add Record</button>

                </div>

            </form>

        </div>

        <div class="col-md-4">

            <div class="accordion" id="accordionExample">
                @foreach ($users as $user)

                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$user->name}}" aria-expanded="true" aria-controls="collapseOne">
                        {{ $user->name }}
                      </button>
                    </h2>
                  </div>
  
                  <div id="{{ $user->name }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>In Time</th>
                                <th>Out Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->lastWeekAttendance() as $record)
                                <tr>
                                    <td>{{ $record->attend_date }}</td>
                                    <td>{{ $record->in_time }}</td>
                                    <td>{{ $record->out_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                    
                @endforeach
            </div>

        </div>

    </div>

</div>
    
@endsection