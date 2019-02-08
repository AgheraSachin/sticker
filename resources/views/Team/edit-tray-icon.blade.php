@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="col-md-8">
                <form role="form" method="post" enctype="multipart/form-data" id="tray-icon-form" action='{{url('tray_icon')}}/{{$tray_icons['id']}}'>
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pack*</label>
                            <select class="form-control" name="category" id="category" required>
                                @foreach($categories as $key=>$val)
                                    @if($val['id']==$tray_icons['category_id'])
                                        <option value="{{$val['id']}}" selected>{{$val['title']}}</option>
                                    @else
                                        <option value="{{$val['id']}}">{{$val['title']}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" id="logo" name="logo" onchange="readURL(this)"><br/>
                                <img id="team1_logo_upload" src="{{Storage::url('tray_icon/1x/').$tray_icons['icon_name']}}"
                                     name="logo" height="100px" width="100px"/><br/>
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
            $("#tray-icon-form").validate({
                rules: {
                    'category': {required: true},
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
