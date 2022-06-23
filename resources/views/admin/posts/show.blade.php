@extends('layouts.admin')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="post d-flex py-4">
        <img class="img-fluid" src="{{$post->cover_image}}" alt="">
        <div class="post_data p-4">
            <h1>{{$post->title}}</h1>
            <div class="metadata">
                Category: {{$post->category ? $post->category->name : 'No Category'}}
            </div>
            <div class="content">
                <p>{{$post->content}}</p>
            </div>
        </div>
    </div>

</div>
@endsection
