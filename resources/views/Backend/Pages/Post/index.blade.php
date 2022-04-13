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
                <table class="table table-bordered text-center">
                    <tbody>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>category</th>
                            <th>Sub Category</th>
                            <th>View</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tbody>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop-> index + 1 }}</td>
                            <td>{{ $post->name }}</td>
                            <td><img src="{{ asset($post->image) }}" alt="" width="100px"></td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->subCategory->name ?? '' }}</td>
                            <td>{{ $post->view }}</td>
                            <td>
                                <span class="badge badge-{{ $post->status == 'Active' ? 'success': 'danger' }} p-2">{{ $post->status == 'Active' ? 'Active': 'Inactive' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.post-status', $post->slug) }}" id="postStatus" data-status="{{ $post->status }}" class="btn btn-sm btn-{{ $post->status == 'Active' ? 'success': 'danger' }} "><i class="fa fa-arrow-{{ $post->status == 'Active' ? 'up': 'down' }}"></i></a>

                                <a href="" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.post.edit', $post->slug) }}" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('admin.post.destroy', $post->slug) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        const base_url = window.location.origin;


    </script>
@endpush
