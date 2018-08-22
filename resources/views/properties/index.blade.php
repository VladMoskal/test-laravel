@extends('layouts.app')

@section('content')
    <div class="btn-group">
        <a class="btn btn-primary" href="{{ route('properties.create') }}">Create property</a>
    </div>
    <br/>
    <br/>
    <div class="row">
        @foreach($properties as $property)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow" onclick="location.href = '{{route('tenancies.index', ['id' => $property->id])}}';">
                    <div class="card-body">
                        <p class="card-text">
                            {{$property->name}}
                        </p>
                        <hr/>
                    </div>
                    <img src="{{asset('img/properties/'.$property->image)}}" alt="{{$property->id}} img" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                            Address: {{$property->address}}
                        </p>
                        <p class="card-text">
                            Value: {{$property->value}}
                        </p>
                        <p class="card-text">
                            Mortgage: @if ($property->mortgage == true) Yes @else No @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection