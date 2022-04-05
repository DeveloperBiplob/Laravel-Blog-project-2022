@extends('Backend.Layouts.master')
@section('title', 'Admin | Category')
@section('master-content')
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Manage Category</h1>
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
// 

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
