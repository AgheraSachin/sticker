@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-8">
            <form role="form" method="post" action='{{url('category')}}/{{$categories['id']}}'>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                {{ method_field('PATCH') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category*</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="Main Category" selected>Main Category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title*</label>
                        <input type="text" name="title" id="title" value="{{$categories['title']}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Publisher*</label>
                        <input type="text" name="publisher" id="publisher" value="{{$categories['publisher']}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Publisher Website*</label>
                        <input type="text" name="pw" id="pw" class="form-control" value="{{$categories['publisher_website']}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Privacy Policy Website*</label>
                        <input type="text" name="ppw" id="ppw" class="form-control" value="{{$categories['privacy_policy_website']}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Licence Agreement Website*</label>
                        <input type="text" name="law" id="law" class="form-control" value="{{$categories['licence_agreement_website']}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
<script>
    $(function () {
        $('#category_datatable').DataTable();
    })
</script>
@endsection
