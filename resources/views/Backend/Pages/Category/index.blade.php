@extends('Backend.Layouts.master')
@section('title', 'Admin | Category')
@section('master-content')
    <section>
        <div class="card">
            <div class="card-header">
                <h1>Category</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button class="btn btn-primary btn-xs">Show</button>
                            <button class="btn btn-primary btn-xs">Edit</button>
                            <button class="btn btn-primary btn-xs">Dlete</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
