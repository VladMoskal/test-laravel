@extends('layouts.app')

@section('content')
    <div class="btn-group">
        <a class="btn btn-primary" href="{{ route('tenancies.create') }}">Create tenancy</a>
    </div>
    <br/>
    <br/>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Property name</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
                <th scope="col">Monthly rent</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tenancies as $tenancy)
                <tr class="tr-highlighted" onclick="location.href = '{{route('tenants.index', ['id' => $tenancy->id])}}';">
                    <th scope="row">{{$tenancy->property->name}}</th>
                    <td>{{$tenancy->start_date}}</td>
                    <td>{{$tenancy->end_date}}</td>
                    <td>{{$tenancy->monthly_rent}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection