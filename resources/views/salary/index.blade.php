@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('message'))

                <span class="text-primary">{{ session('message') }}</span>

            @endif
            
            <div class="card">

                <div class="card-header"><b>Salary</b></div>

                <div class="card-body">
                   
                    <table class="table table-striped">

                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>

                            @foreach($salaries as $salary)

                                <tr>

                                    <td>{{ $salary->user->name }}</td>
                                    <td>{{ $salary->position }}</td>
                                    <td>{{ $salary->amount }}</td>
                                    <td><a href="{{ route('salary-show',$salary->id) }}">Edit</a></td>

                                </tr>

                            @endforeach

                        </thead>

                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
