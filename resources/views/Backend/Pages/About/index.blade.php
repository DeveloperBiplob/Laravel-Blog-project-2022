@extends('Backend.Layouts.master')
@section('title', 'Backend | About')
@push('css')
    <style>
        #about-img{
            max-width: 100%;
            border: 2px solid rgb(255, 81, 0);
            padding: 10px;
            margin: 20px;
            margin: auto

        }
    </style>
@endpush
@section('master-content')
    <section>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="text-info">Manage About Section</h3>
                    <a href="{{ route('admin.about.edit', 1) }}" class="btn btn-sm btn-success">Edit</a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" style="border: 2px solid rgb(233, 227, 224); padding:20px">
                            @php
                                $post = App\Models\Post::find(1);
                            @endphp
                            <div style="box-sizing: border-box">
                                <img id="about-img" src="{{ asset($about->image) }}" alt="">
                            </div>
                            <div class="text-justify">
                                {!! $about->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
