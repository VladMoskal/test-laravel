@extends('layouts.app')

@section('content')

    <form action="{{ route('tenancies.store') }}" method="POST">
        <label for="">Start date</label>
        <input type="date" class="form-control" name="start_date" required>

        <label for="">End date</label>
        <input type="date" class="form-control" name="end_date" required>

        <label for="">Monthly rent</label>
        <input type="text" class="form-control" name="monthly_rent" required>

        <label for="">Property</label>
        <select class="form-control" name="property_id">
            @foreach($properties as $property)
                <option value="{{$property->id}}">{{$property->name}}</option>
            @endforeach
        </select>

        {{csrf_field()}}

        <hr/>

        <input class="btn btn-primary" type="submit" value="Сохранить">
    </form>
@endsection