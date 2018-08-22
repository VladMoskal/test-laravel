@extends('layouts.app')

@section('content')

    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" required>

        <label for="">Address</label>
        <input type="text" class="form-control" name="address" required>

        <label for="">Image</label>
        <input type="file" class="form-control" name="image" required>

        <label for="">Value</label>
        <input type="text" class="form-control" name="value" required>

        <label for="">Mortgage</label>
        <input type="checkbox" class="form-control" name="mortgage">

        {{csrf_field()}}

        <hr/>

        <input class="btn btn-primary" type="submit" value="Сохранить">
    </form>
@endsection