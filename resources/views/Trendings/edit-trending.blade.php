@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="col-md-8">
                <form role="form" method="post" enctype="multipart/form-data" id="tray-icon-form" action='{{url('trending')}}/{{$tray_icons['id']}}'>
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="form-group">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" id="logo" name="logo" onchange="readURL(this)"><br/>
                                <img id="team1_logo_upload" src="{{Storage::url('trending/').$tray_icons['filename']}}"
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
