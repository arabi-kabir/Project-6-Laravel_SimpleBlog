@extends('layouts.app')

@section('posts.trashed')
    active
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th class="text-center">Featured</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Restore</th>
                    <th class="text-center">Delete</th>
                </thead>
                <tbody>
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td class="text-center"> <img class="img-thumbnail" src="{{asset($post->featured)}}" alt="{{$post->title}}" width="100px" height="50px"> </td>
                                <td class="text-center">{{$post->title}}</td>
                                <td class="text-center"> <a class="btn btn-info" href=""> <i class="fa fa-wrench" aria-hidden="true"></i> </a> </td>
                                <td class="text-center"> <a class="btn btn-success" href="{{route('post.restore', ['id' => $post->id])}}"> <i class="fa fa-reply-all" aria-hidden="true"></i> </a> </td>
                                <td class="text-center"> <a class="btn btn-danger" href="{{route('post.kill', ['id' => $post->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th class="text-center" colspan="5">No trashed post</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
