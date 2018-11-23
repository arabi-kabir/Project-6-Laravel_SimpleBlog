@extends('layouts.app')

@section('category.create')
    active
@endsection

@section('content')

    @include('admin.includes.error')

    <div class="card">
        <div class="card-header">
            Create a new category
        </div>
        <div class="card-body">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Create Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
