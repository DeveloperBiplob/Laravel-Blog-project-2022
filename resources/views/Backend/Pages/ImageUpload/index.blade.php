@extends('Backend.Layouts.master')
@section('title', 'Image Upload With Ajax')
@section('master-content')
    <div class="card">
        <div class="card-body">
            <form id="imageForm">
                <div class="form-group">
                    <input type="file" name="" class="form-control" id="image">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function(){
            $.ajaxSetup({
                headers: {'X-CSRF-Token' : '{{csrf_token()}}'}
            });

            // $('#image').change(function(){
            //     // alert('hello')
            //     var image = $(this)[0].files[0];
            //     var formData = new FormData();
            //     formData.append('image', image);

            //     $.ajax({
            //         ulr: 'image/upload/ajax',
            //         type: 'POST',
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function(data) {
            //             console.log(data);
            //         }
            //     })
            // })

            $('#imageForm').submit(function(event){
                event.preventDefault();
                var image = $('#image')[0].files[0];
                var formData = new FormData();
                formData.append('image', image);

                $.ajax({
                    ulr: 'image/upload/ajax',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: 'Data Save Successfully'
                })
            })


        })
    </script>
@endpush
