@extends('layouts.app')

@section('viewCreatePost')
    active
@endsection

@section('optional_script')
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js" defer></script>

    <script>
        $(document).ready(function() {
            $('#content1').summernote();
        });
    </script>
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
            Create a new post
        </div>
        <div class="card-body">
            <form action="{{route('postStore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{$category->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Select Tags</label>
                    @foreach($tags as $key => $tag)
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="tags[]" value="{{$tag->id}}" class="custom-control-input" id="customCheck{{$key}}">
                          <label class="custom-control-label" for="customCheck{{$key}}">{{$tag->tag}}</label>
                        </div>
                        <?php $key++ ?>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content1" rows="10" cols="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Publish Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
