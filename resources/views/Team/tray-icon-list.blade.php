@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="cold-md-6">
                <table id="team_datatable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Pack</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
<!--                    --><?php //echo "<pre>";print_r($icons);exit;?>
                    @foreach($icons as $key=>$val)
                        <tr>
                            <td>{{$val['id']}}</td>
                            <td><img src={{$val['icon_name']}} height="50px" width="50px"></td>
                            <td>{{$val['category']['title']}}</td>
                            <td><a href="{{Route('edit-tray-icon',['id'=>$val['id']])}}" class="btn btn-info col-md-3"
                                   style="margin-right: 16px">Edit</a>
                                <form role="form" method="post" action='{{url('tray_icon').'/'.$val['id']}}'>
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    {{ method_field('DELETE') }}&nbsp;&nbsp;
                                    <input type="submit" class="btn btn-danger col-md-4" value="Delete"></input>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script type="text/javascript">


    </script>
@endsection
