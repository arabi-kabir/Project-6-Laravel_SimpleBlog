@extends('layouts.app')

@section('categories')
    active
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Category Name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </thead>
                <tbody>
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td class="text-center"> <a class="btn btn-info btn-sm" href="{{route('category.edit', ['id' => $category->id ])}}"> <i class="fa fa-wrench" aria-hidden="true"></i> </a> </td>
                                <td class="text-center"> <a class="btn btn-danger btn-sm" href="{{route('category.delete', ['id' => $category->id ])}}"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th class="text-center" colspan="5">No categories yet.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
