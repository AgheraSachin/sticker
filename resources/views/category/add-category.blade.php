@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-8">
            <form role="form" method="post" id="category-form">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                       <label for="exampleInputEmail1">Category*</label>
                       <select class="form-control" name="category" id="category" required>
                           <option value="Main Category">Main Category</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title*</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Publisher*</label>
                        <input type="text" name="publisher" id="publisher" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Publisher Website*</label>
                        <input type="text" name="pw" id="pw" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Privacy Policy Website*</label>
                        <input type="text" name="ppw" id="ppw" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Licence Agreement Website*</label>
                        <input type="text" name="law" id="law" class="form-control" required>
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
                'title': {required: true},
                'publisher': {required: true},
                'pw': {required: true},
                'ppw': {required: true},
                'law': {required: true},
            },
        });
    });
</script>
@endsection
