@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('message'))

        <span class="text-primary">{{ session('message') }}</span>

    @endif

    @if(session('error'))

        <span class="text-danger">{{ session('error') }}</span>

    @endif

    <h3>Salary Record Information</h3>
    <div class="row justify-content-center">
        <div class="col-md-7">

            <form action="{{ route('salary-record-store') }}" method="POST" id="salaryRecordForm" class="mt-5">

                @csrf

                {{-- Salary Record Name Field --}}

                <div class="form-group">

                    <label for="name">Name</label>

                    <select name="user_id" id="name" class="form-control">

                        <option value="" selected disabled>Choose Name</option>

                        @foreach ($users as $user)

                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            
                        @endforeach

                    </select>

                </div>

                @error('user_id')

                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                
                @enderror

                {{-- Salary Record Month Form --}}

                <div class="form-group">

                    <label for="name">Month</label>

                    <input type="text" name="month" class="form-control" value="{{ date('F') }}" readonly>

                </div>

                @error('month')

                    <span class="text-danger">{{ $errors->first('month') }}</span>
                                
                @enderror

                {{-- Salary Record Remark Form --}}

                <div class="form-group">

                    <label for="remark">Remark</label>

                    <textarea name="remark" id="remark" cols="30" rows="3" class="form-control"></textarea>

                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-primary" form="salaryRecordForm">Paid</button>

                </div>

            </form>

            
            <div class="card">

                <div class="card-header"><b>Salary Record</b></div>

                <div class="card-body">
                   
                    <table class="table table-striped">

                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Month</th>
                                <th>Status</th>
                                <th></th>
                            </tr>

                            @foreach($salaryCurrentMonthRecords as $salaryCurrentMonthRecord)

                                <tr>

                                    <td>{{ $salaryCurrentMonthRecord->user->name }}</td>
                                    <td>{{ $salaryCurrentMonthRecord->month }}</td>
                                    <td>

                                        @if ($salaryCurrentMonthRecord->paid)
                                            Paid
                                        @else
                                            Pending
                                        @endif
                                    </td>
                                    {{-- <td><a href="{{ route('salary-show',$salary->id) }}">Edit</a></td> --}}

                                </tr>

                            @endforeach

                        </thead>

                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                  Previous Month {{ date('F',strtotime('last month'))}}
                </div>
                <div class="card-body">
                  <table class="table table-borderless">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Status</th>
                          </tr>
                          @foreach ($users as $user)
                              <tr>
                                  <td>{{ $user->name }}</td>
                                  <td>
                                        @if ($user->isPaid()!=null)
                                            Paid
                                        @else
                                                Unpaid
                                        @endif
                                  </td>
                              </tr>
                          @endforeach
                      </thead>
                  </table>
                </div>
              </div>
        </div>
        </div>
    </div>
</div>
@endsection
