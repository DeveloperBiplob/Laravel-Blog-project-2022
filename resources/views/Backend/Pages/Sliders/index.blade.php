@extends('Backend.Layouts.master')
@section('title', 'Admin | Sliders')
@section('master-content')
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 id="manage_catetory">Manage Sliders</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            <tbody id="tagTable">
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td width="50px">{{ $loop-> index + 1 }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td><img width="100px" src="{{ asset($slider->image) }}" alt=""></td>
                                    <td width="150px">
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal-{{ $slider->id }}"><i class="fa fa-pen"></i></button>
                                        <form action="{{ route('admin.slider.destroy', $slider->id) }} " method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-info">Add Slider</h2>
                    </div>
                    <div class="card-body">
                        <form id="addTagForm" action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Slider Name</label>
                                <input type="text" name="title" class="form-control" id="name" placeholder="Enter Slider Name">
                                <span class="text-danger" id="nameError"></span>
                            </div>
                            @error('title')
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
                              <span class="text-danger" id="imageError"></span>
                              @error('image')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Add New Slider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Modal -->
@foreach ($sliders as $slider)
<div class="modal fade" id="editModal-{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.slider.update', $slider->id) }}" id="eidtForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Slider Name</label>
                    <input type="text" name="title" class="form-control" id="name" value="{{ $slider->title }}">
                    <span class="text-danger" id="nameError"></span>
                </div>
                @error('title')
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
                    <img width="50px" src="{{ asset($slider->image) }}" alt="">
                  </div>
                  <span class="text-danger" id="imageError"></span>
                  @error('image')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Update Slider</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection

@push('script')
    <script>
        // const base_url = window.location.origin;

        // let tagTable = document.querySelector('#tagTable');
        // let addTagForm = document.querySelector('#addTagForm');

        // addTagForm.addEventListener('submit', function(e){
        //     e.preventDefault()

        //     let name = document.querySelector('#name');
        //     let image = document.querySelector('#image');
        //     let nameError = document.querySelector('#nameError');
        //     let imageError = document.querySelector('#imageError');
        //     let url = `${base_url}/admin/slider`;

        //     if(name.value === ''){
        //         nameError.innerHTML = 'Name Fild is Required';
        //         return false;
        //     }
        //     if(image.value === ''){
        //         imageError.innerHTML = 'Image Fild is Required';
        //         return false;
        //     }

        //     axios.post(url, {
        //         'title' : name.value,
        //         'image' : image.value,
        //     })
        //     .then((res)=> {
        //         console.log('ok')
        //     })
        //     .catch((err)=> {
        //         console.log('no')
        //     })
        // })
    </script>
@endpush
