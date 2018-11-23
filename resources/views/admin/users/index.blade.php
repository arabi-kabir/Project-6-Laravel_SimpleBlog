@extends('layouts.app')

@section('users')
    active
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Users List
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th class="text-center">Image</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Permissions</th>
                    <th class="text-center">Delete</th>
                </thead>
                <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center"> <img class="img-thumbnail" src="{{asset($user->profile->avatar)}}" alt="Profile Photo" width="100px" height="60px"> </td>
                                <td class="text-center"> {{$user->name}} </td>
                                <td class="text-center">
                                    @if($user->admin)
                                        <a href="{{route('user.not.admin', ['id' => $user->id ])}}" class="btn btn-sm btn-danger">Remove Permissions</a>
                                    @else
                                        <a href="{{route('user.admin', ['id' => $user->id ])}}" class="btn btn-sm btn-success">Make Admin</a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(Auth::id() != $user->id)
                                        <a href="{{route('user.delete', ['id' => $user->id ])}}" class="btn btn-sm btn-danger">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th class="text-center" colspan="5">No users.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
