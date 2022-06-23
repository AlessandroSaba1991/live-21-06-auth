@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page_headin d-flex justify-content-between py-5">
        <h1>All Post</h1>
        <div class="button">
            <a class="btn btn-primary" href="{{route('admin.posts.create')}}" role="button">Create New Post</a>
        </div>
    </div>
    @include('partials.message')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Cover Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td scope="row">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>
                    <img width="150" src="{{$post->cover_image}}" alt="">
                </td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.posts.show',$post->slug)}}">Views</a>
                    <a class="btn btn-secondary" href="{{route('admin.posts.edit',$post->slug)}}">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-post-{{$post->id}}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="delete-post-{{$post->id}}" tabindex="-1" aria-labelledby="modelTitle-{{$post->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete post "<span class="text-primary">{{$post->title}}</span>"</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <form action="{{route('admin.posts.destroy',$post->slug)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td scope="row">Nothing</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
