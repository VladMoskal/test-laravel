@extends('layouts.app')

@section('content')
    <form action="{{ route('tenants.store') }}" method="POST" enctype="multipart/form-data">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" required>

        <label for="">Address</label>
        <input type="text" class="form-control" name="address" required>

        <label for="">Image</label>
        <input type="file" class="form-control" name="image" required>

        <label for="">Tenancy (name of property)</label>
        <select class="form-control" name="tenancy_id">
            @foreach($tenancies as $tenancy)
                <option value="{{$tenancy->id}}">{{$tenancy->property->name}}</option>
            @endforeach
        </select>

        {{csrf_field()}}

        <hr/>

        <input class="btn btn-primary" type="submit" value="Сохранить">
    </form>
@endsection