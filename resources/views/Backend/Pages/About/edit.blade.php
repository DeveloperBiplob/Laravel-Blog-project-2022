@extends('Backend.Layouts.master')
@section('title', 'Backend | About')
@push('css')
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
@endpush
@section('master-content')
    <section>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="text-info">Edit About</h3>
                    <a href="{{ route('admin.about.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.about.update', $about->id) }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea id="about_description" name="description">{!! $about->description !!}</textarea>
                            <span class="text-danger" id="nameError"></span>
                        </div>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" id="image" name="image" class="custom-file-input">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                          <div class="d-block mb-2">
                          </div>
                          <span class="text-danger" id="imageError"></span>
                          @error('image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Update About</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <script>
        $('#about_description').summernote({
            placeholder: 'Enter a descripton in your About Section..',
            tabsize: 2,
            height: 400
      });

    </script>
@endpush
