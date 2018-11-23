@extends('layouts.app')

@section('tags')
    active
@endsection

@section('content')
    <!-- Create Tag -->
    <div class="card mb-4">
        <div class="card-header">
            Create Tag
        </div>
        <div class="card-body">
            <form action="{{route('tag.store')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-2 text-center pt-1" for="name">Name</label>
                    <input type="text" name="tag" class="form-control col-6 mr-2" placeholder="Name">
                    <button type="submit" class="btn btn-success col-3" name="button">Create Tag</button>
                </div>
                <div class="form-group">

                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th class="text-center">#</th>
                    <th>Tag Name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </thead>
                <tbody>
                    @if($tags->count() > 0)
                        @foreach($tags as $key => $tag)
                            <tr>
                                <th scope="row" class="text-center">{{++$key}}</th>
                                <td>{{$tag->tag}}</td>
                                <td class="text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$key}}">
                                      Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Tag : {{$tag->tag}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                              <form method="POST" action="{{route('tag.update', ['id' => $tag->id])}}">
                                                  @csrf
                                                  <div class="form-group">
                                                      <label class="text-center pt-1" for="tag">Name</label>
                                                      <input type="text" name="tag" value="{{$tag->tag}}" class="form-control mr-2" placeholder="Name">
                                                  </div>
                                                  <input type="submit" class="btn btn-success" value="Update Tag">
                                              </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </td>

                                <td class="text-center"> <a class="btn btn-danger btn-sm" href="{{route('tag.delete', ['id' => $tag->id ])}}"> Delete </a> </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th class="text-center" colspan="5">No tags yet.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
