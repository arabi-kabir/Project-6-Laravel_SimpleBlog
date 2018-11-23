@extends('layouts.app')

@section('user.profile')
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
            Edit your profile
        </div>
        <div class="card-body">
            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Username</label>
                    <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="featured">Email</label>
                    <input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="featured">New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="featured">Upload new avatar</label>
                    <input type="file" value="" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Facebook profile</label>
                    <input type="text" value="{{$user->profile->facebook}}" name="facebook" class="form-control" placeholder="Facebook profile">
                </div>
                <div class="form-group">
                    <label for="title">Youtube profile</label>
                    <input type="text" value="{{$user->profile->youtube}}" name="youtube" class="form-control" placeholder="Youtube profile">
                </div>

                <div class="form-group">
                    <label for="title">About you</label>
                    <textarea name="about" rows="6" cols="6" class="form-control">{{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Update profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection
