@extends('Backend.Layouts.master')
@section('title', 'Backend | Update Post')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('master-content')
    <section>
        <div class="card">
            <div class="card-header">
                <h1 class="float-left">Update Post</h1>
                <a href="{{ route('admin.post.index') }}" class="btn btn-sm btn-primary float-right">Back Dashboard</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.post.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Name</label>
                                <textarea id="name_field" name="name" class="form-control" rows="1" >{{ $post->name }}</textarea>
                                <span id="NameError"></span>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected': '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <select class="form-control" name="sub_category_id" id="sub_category_id">
                                    <option value="">Select a Sub Category</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}" {{ $post->sub_cat_id == $subCategory->id ? 'selected': '' }}>{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('sub_category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea id="description" name="description">{!! $post->description !!}</textarea>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label for="">Image</label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>
                              @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="mb-2">
                                    <label for="">Tags :</label>
                                </div>
                                @foreach ($tags as $tag)
                                {{-- <span>{{ $tag->name }}</span>
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"> | --}}

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="{{ $tag->slug }}" name="tags[]" value="{{ $tag->id }}" @if (in_array($tag->id, $postTags)) checked @endif >
                                    <label class="form-check-label" for="{{ $tag->slug }}">{{ $tag->name }}</label>
                                  </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Update Post</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Enter a descripton in your psot',
            tabsize: 2,
            height: 400
      });

    </script>
@endpush
