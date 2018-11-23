@extends('layouts.app')

@section('content')

    @include('admin.includes.error')

    <div class="card">
        <div class="card-header">
            Update category : {{$category->name}}
        </div>
        <div class="card-body">
            <form action="{{route('category.update', ['id' => $category->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
