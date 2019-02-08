@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="cold-md-6">
                <table id="category_datatable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category['id']}}</td>
                            <td>{{$category['title']}}</td>
                            <td>{{$category['publisher']}}</td>
                            <td><a href="{{Route('edit-category',['id' => $category['id']])}}"
                                   class="btn btn-info col-md-2" style="margin-right: 16px">Edit</a>
                                <form role="form" method="post" action='{{url('category').'/'.$category['id']}}'>
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    {{ method_field('DELETE') }}&nbsp;&nbsp;
                                    <input type="submit" class="btn btn-danger col-md-2" value="Delete"></input>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script>
        $(function () {
            $('#category_datatable').DataTable();
        });

        $(document).ready(function () {
            $("#sportForm").validate({
                rules: {
                    'name': {required: true}
                },
            });
        });

        setTimeout(function () {
            $("#notification-modal").fadeOut("slow","linear");
        }, 1000);
    </script>
@endsection
