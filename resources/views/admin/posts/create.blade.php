@extends('layouts.admin')

@section('app')

    <h2>Create a new Post</h2>

    <form action="{{route('admin.posts.store')}}" method="post">
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" placeholder="Title">
          <small id="helpTitle" class="form-text text-muted">Insert title max:1510 characters</small>
        </div>
        <div class="mb-3">
          <label for="cover_image" class="form-label">Cover Image</label>
          <input type="text" class="form-control" name="cover_image" id="cover_image" aria-describedby="helpcover_image" placeholder="cover_image">
          <small id="helpcover_image" class="form-text text-muted">Insert Cover Image max:1510 characters</small>
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea class="form-control" name="content" id="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create new Post</button>
    </form>

@endsection
