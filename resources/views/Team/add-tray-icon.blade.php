@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="col-md-8">
                <form role="form" method="post" enctype="multipart/form-data" id="category-form">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pack*</label>
                            <select class="form-control" name="category" id="category" required>
                                @foreach($categories as $key=>$val)
                                    <option value="{{$val['id']}}">{{$val['title']}}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" id="logo" name="logo" onchange="readURL(this)"><br/>
                                <img id="team1_logo_upload" src=" " height="100px" width="100px"/><br/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function () {
            $("#category-form").validate({
                rules: {
                    'category': {required: true},
                    'logo': {required: true},
                },
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#team1_logo_upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
