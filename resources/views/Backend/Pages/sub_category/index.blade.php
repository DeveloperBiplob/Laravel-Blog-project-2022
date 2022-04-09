@extends('Backend.Layouts.master')
@section('title', 'Admin | Sub Category')
@section('master-content')
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 id="manage_catetory">Manage Sub Category</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Action</th>
                            </tr>
                            <tbody id="subCatTbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-info">Add Sub Category</h2>
                    </div>
                    <div class="card-body">
                        <form id="addSubCategoryForm">
                            <div class="form-group">
                                <label for="">Select Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a Cateogry</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="subCatIdError"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Sub Category Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter a Sub Category Name">
                                <span class="text-danger" id="subCatNameError"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block">Add New Sub Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Sub Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="eidtForm">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="hidden" class="form-control" id="edit_slug">
                    <input type="text" class="form-control" id="edit_name">
                    <span class="text-danger" id="catEditError"></span>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Category" class="btn btn-success btn-block">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('script')
    <script>
        const base_url = window.location.origin;

        //Fatch data

        function getAllSubCategory(){
            let url = base_url + '/admin/fatch-sub-category';
            axios.get(url)
            .then((res) => {
                table_data_row(res.data)
            })

        }

        getAllSubCategory();

        function table_data_row(data) {
            var	rows = '';
            var i = 0;
            $.each( data, function( key, value ) {
                rows += '<tr>';
                rows += '<td>'+ ++i +'</td>';
                rows += '<td>'+value.category.name+'</td>';
                rows += '<td>'+value.name+'</td>';
                rows += '<td data-id="'+value.id+'" class="text-center">';
                rows += '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.slug+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.slug+'" >Delete</a> ';
                rows += '</td>';
                rows += '</tr>';
            });
            $('#subCatTbody').html(rows)
        }

        //Store data

        let addSubCategoryForm = document.querySelector('#addSubCategoryForm');
        addSubCategoryForm.addEventListener('submit', function(e){
            e.preventDefault();
            let subCatNameError = document.querySelector('#subCatNameError');
            let subCatIdError = document.querySelector('#subCatIdError');
            let category = document.querySelector('#category');
            let name = document.querySelector('#name');
            let url = base_url + '/admin/sub-category';

            subCatNameError.innerHTML = '';
            if(name.value === ''){
                subCatNameError.innerHTML = 'Field Must Be Not Empty!';
                return null;
            }
            subCatIdError.innerHTML = '';
            if(category.value === ''){
                subCatIdError.innerHTML = 'Field Must Be Not Empty!';
                return null;
            }


            axios.post("{{ route('admin.sub-category.store') }}", {
                category_id : category.value,
                name : name.value,
            })
            .then((res) => {
                category.value = '';
                name.value = '';
                getAllSubCategory();
                notification('Sub Category Added Successfully')
            })
            .catch((err) => {
                if(err.response.data.errors.name){
                    subCatNameError.innerHTML = err.response.data.errors.name[0]
                }
            })
        })


        function notification(message = 'Data Save Successfully!'){
            return Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 2500
                });
        }
    </script>
@endpush
