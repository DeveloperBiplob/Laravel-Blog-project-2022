@extends('Backend.Layouts.master')
@section('title', 'Backend | Update Website Details')
@section('master-content')
    <section>
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Update Website</h3>
                    <a class="btn btn-sm btn-success" href="{{ route('admin.website.index') }}">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.website.update', $website->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $website->title }}">
                            </div>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-gorup">
                            <label for="">Logo</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Update</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" id="image" name="logo" class="custom-file-input">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Address</label>
                                <textarea type="text" class="form-control" name="address" rows="2">{{ $website->address }}</textarea>
                            </div>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $website->email }}">
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $website->phone }}">
                            </div>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{ $website->facebook }}">
                            </div>
                            @error('facebook')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{ $website->instagram }}">
                            </div>
                            @error('instagram')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="{{ $website->twitter }}">
                            </div>
                            @error('twitter')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Behance</label>
                                <input type="text" class="form-control" name="behance" value="{{ $website->behance }}">
                            </div>
                            @error('behance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Footer</label>
                                <textarea type="text" class="form-control" name="footer" rows="2">{{ $website->footer }}</textarea>
                            </div>
                            @error('footer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block">Update Website Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
