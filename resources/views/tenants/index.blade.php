@extends('layouts.app')

@section('content')
    <div class="btn-group">
        <a class="btn btn-primary" href="{{ route('tenants.create') }}">Create tenant</a>
    </div>
    <br/>
    <br/>
    <div class="row">
        @foreach($tenants as $tenant)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <p class="card-text">
                            {{$tenant->name}}
                        </p>
                        <hr/>
                    </div>
                    <img src="{{asset('img/tenants/'.$tenant->image)}}" alt="{{$tenant->id}} img" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                            Address: {{$tenant->address}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection