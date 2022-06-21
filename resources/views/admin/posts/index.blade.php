@extends('layouts.admin')

@section('app')
<div class="container">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
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
                    <td>Edit - views - delete</td>

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
