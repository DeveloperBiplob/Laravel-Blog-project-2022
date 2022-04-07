@extends('Backend.Layouts.master')
@section('title', 'Admin | Category')
@section('master-content')
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 id="manage_catetory">Manage Category</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            <tbody id="catTbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-info">Add Category</h2>
                    </div>
                    <div class="card-body">
                        <form id="addCategoryForm">
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Category Name">
                                <span class="text-danger" id="catError"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block">Add New Category</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
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
        function getAllcategory(){
            axios.get("{{ route('admin.face-category') }}")
            .then((res)=> {
                table_data_row(res.data)
            })
        }
        getAllcategory();

        function table_data_row(data) {
            var	rows = '';
            var i = 0;
            $.each( data, function( key, value ) {
                rows += '<tr>';
                rows += '<td>'+ ++i +'</td>';
                rows += '<td>'+value.name+'</td>';
                rows += '<td data-id="'+value.id+'" class="text-center">';
                rows += '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.slug+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.slug+'" >Delete</a> ';
                rows += '</td>';
                rows += '</tr>';
            });
            $('#catTbody').html(rows)
        }

        //Store
        // $('body').on('submit', '#addCategoryForm', function(e){
        //     e.preventDefault();
        //     console.log('ok');
        // });

        let addCategoryForm = document.querySelector('#addCategoryForm');
        let name = document.querySelector('#name');
        let catError = document.querySelector('#catError');
        addCategoryForm.addEventListener('submit', function(e){
            e.preventDefault()

            catError.innerHTML = '';
            if(name.value === ''){
                catError.innerHTML = 'Fild Must Not be Empty!'
                return null;
            }
            axios.post("{{ route('admin.category.store') }}", {
                name: name.value
            })
            .then((res)=> {
                getAllcategory();
                name.value = '';

                notification();
            })
            .catch((err)=>{
                if(err.response.data.errors.name){
                    catError.innerHTML = err.response.data.errors.name[0]
                }
            })
        });

        // Delete

        // let deleteRow = document.querySelector('#deleteRow');
        // deleteRow.addEventListener('click', function(){
        //     alert('Hello!');
        // });

        $('body').on('click', '#deleteRow', function (){

            let slug = $(this).attr('data-id');
            let base_url = window.location.origin;
            let url = base_url + '/admin/category/' + slug;

            axios.delete(url)
            .then( (res) => {
                getAllcategory();
                notification('Category Delete Successfully!');
            })
        });


        //Edit

        $('body').on('click', '#editRow', function(){
            let slug = $(this).attr('data-id');
            let url = window.location.origin + '/admin/category/' + slug;
            let edit_name = document.querySelector('#edit_name');
            let edit_slug = document.querySelector('#edit_slug');

            axios.get(url)
            .then((res) => {
                let {data} = res
                edit_name.value = data.name;
                edit_slug.value = data.slug;
            })
        })

        // Updata

        $('body').on('submit', '#eidtForm', function(e){
            e.preventDefault();

            // let edit_slug = document.querySelector('#edit_slug');
            let slug = edit_slug.value;
            let url = window.location.origin + '/admin/category/' + slug;
            let catEditError = document.querySelector('#catEditError');

            axios.put(url, {
                name: edit_name.value
            })
            .then((res) => {
                $('#editModal').modal('toggle')
                getAllcategory();
                notification('Category Updated Successfully!');
            })
            .catch((err)=>{
                if(err.response.data.errors.name){
                    catEditError.innerHTML = err.response.data.errors.name[0]
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
