@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page_headin d-flex justify-content-between py-5">
        <h1>All Categories</h1>
    </div>
    @include('partials.message')


    <div class="row">
        <div class="col">
            <form action="{{route('admin.categories.store')}}" method="post" class="d-flex align-items-center">
                @csrf
                <div class="mr-3">
                    <label for="name" class="form-label mb-0">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" aria-describedby="helpIdName">
                    <small id="helpIdName" class="text-muted">Insert Name of Category</small>
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
                    @forelse($categories as $category)
                    <tr>
                        <td scope="row">{{$category->id}}</td>
                        <td>
                            <form id="form-action-{{$category->id}}" action="{{route('admin.categories.update',$category->slug)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="text" class="border-0 bg-transparent" name="name" id="name" aria-describedby="helpIdname" placeholder="" value="{{$category->name}}">
                            </form>
                        </td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <div class="badge bg-info text-white p-2">{{count($category->posts)}}</div>
                        </td>
                        <td>
                            <button form="form-action-{{$category->id}}" class="btn btn-primary" type="submit">Update</button>
                            <form action="{{route('admin.categories.destroy',$category->slug)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td scope="row">No category</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>


</div>
@endsection
