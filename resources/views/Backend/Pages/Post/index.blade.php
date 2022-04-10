@extends('Backend.Layouts.master')
@section('title', 'Backend | Post')
@section('master-content')
    <section>
        <div class="card">
            <div class="card-header">
                <h1 class="float-left">Manage Post</h1>
                <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-primary float-right">Add New Post</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>category</th>
                            <th>Sub Category</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </tbody>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop-> index + 1 }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->subCategory->name }}</td>
                            <td>{{ $post->view }}</td>
                            <td>
                                <a href="" class="btn btn-xs btn-primary">View</a>
                                <a href="" class="btn btn-xs btn-primary">Edit</a>
                                <a href="" class="btn btn-xs btn-primary">delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
