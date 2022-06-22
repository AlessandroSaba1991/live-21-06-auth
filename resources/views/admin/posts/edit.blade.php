@extends('layouts.admin')

@section('content')

    <h2>Edit Post "{{$post->title}}"</h2>

    <form action="{{route('admin.posts.update',$post->slug)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" placeholder="Title" value="{{old('title',$post->title)}}">
          <small id="helpTitle" class="form-text text-muted">Insert title max:1510 characters</small>
        </div>
        <div class="d-flex">
            <div class="media mr-4">
                <img width="150" src="{{$post->cover_image}}" alt="">
            </div>
            <div class="mb-3">
              <label for="cover_image" class="form-label">Cover Image</label>
              <input type="text" class="form-control" name="cover_image" id="cover_image" aria-describedby="helpcover_image" placeholder="cover_image" value="{{old('cover_image',$post->cover_image)}}">
              <small id="helpcover_image" class="form-text text-muted">Insert Cover Image max:1510 characters</small>
            </div>
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea class="form-control" name="content" id="content" rows="3">{{old('content',$post->content)}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>

@endsection