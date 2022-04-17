@php
    $website = App\Models\Website::firstOrFail();
@endphp
@extends('Backend.Layouts.master')
@section('title', 'Backend | Website Details')
@section('master-content')
    <section>
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Mange Website</h3>
                    <a class="btn btn-sm btn-success" href="{{ route('admin.website.edit', $website->slug) }}">Update</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{ $website->title ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td><img width="100px" src="{{ asset($website->logo) }}" alt=""></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $website->address ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $website->email ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $website->phone ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Facebook</th>
                            <td>{{ $website->facebook ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Instagram</th>
                            <td>{{ $website->instagram ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Twitter</th>
                            <td>{{ $website->twitter ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Behance</th>
                            <td>{{ $website->behance ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Footer</th>
                            <td>{{ $website->footer ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
