@extends('layouts.app')

@section('settings')
    active
@endsection

@section('content')

    @if(count($errors) > 0)
        <ul class="list-group err-margin">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger"> {{$error}} </li>
            @endforeach
        </ul>
    @endif

    <div class="card">
        <div class="card-header">
            Edit Blog settings
        </div>
        <div class="card-body">
            <form action="{{route('settings.update')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Site name</label>
                    <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="featured">Address</label>
                    <input type="text" name="address" value="{{$settings->address}}" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="featured">Contact phone</label>
                    <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="featured">Contact email</label>
                    <input type="email" name="contact_email" value="{{$settings->contact_email}}" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Update site settings</button>
                </div>
            </form>
        </div>
    </div>
@endsection
