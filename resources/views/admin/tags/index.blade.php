@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page_headin d-flex justify-content-between py-5">
        <h1>All Tags</h1>
    </div>
    @include('partials.message')


    <div class="row">
        <div class="col">
            <form action="{{route('admin.tags.store')}}" method="post" class="d-flex align-items-center">
                @csrf
                <div class="mr-3">
                    <label for="name" class="form-label mb-0">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" aria-describedby="helpIdName">
                    <small id="helpIdName" class="text-muted">Insert Name of tag</small>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Post Count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tags as $tag)
                    <tr>
                        <td scope="row">{{$tag->id}}</td>
                        <td>
                            <form id="form-action-{{$tag->id}}" action="{{route('admin.tags.update',$tag->slug)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="text" class="border-0 bg-transparent" name="name" id="name" aria-describedby="helpIdname" placeholder="" value="{{$tag->name}}">
                            </form>
                        </td>
                        <td>{{$tag->slug}}</td>
                        <td>
                            <div class="badge bg-info text-white p-2">{{count($tag->posts)}}</div>
                        </td>
                        <td>
                            <button form="form-action-{{$tag->id}}" class="btn btn-primary" type="submit">Update</button>
                            <form action="{{route('admin.tags.destroy',$tag->slug)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td scope="row">No tag</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>


</div>
@endsection
