@extends('layouts.admin')

@section('content')

    <h2>Create a new Post</h2>

@include('partials.errors')
    <form action="{{route('admin.posts.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Insert Title" aria-describedby="helpTitle" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="cover_image" class="form-label">Cover Image</label>
          <input type="text" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image" aria-describedby="helpcover_image" placeholder="cover_image" value="{{old('cover_image')}}">
          <small id="helpcover_image" class="form-text text-muted">Insert Cover Image max:1510 characters</small>
          @error('cover_image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="category_id" class="form-label">Categories</label>
          <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" >
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
          </select>
          @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="tag_id" class="form-label">Tags</label>
          <select multiple class="form-select" name="tags[]" id="tag_id" aria-label="Tag">
            <option value="" disabled>Select a Tags</option>
            @forelse($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @empty
            <option>No Tags</option>
            @endforelse
          </select>
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3">{{old('content')}}</textarea>
          @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create new Post</button>
    </form>

@endsection
