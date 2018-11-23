@extends('layouts.app')

@section('user.create')
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
            Create a new user
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="featured">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Add User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
