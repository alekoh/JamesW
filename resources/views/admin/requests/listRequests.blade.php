@extends('admin.layout.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Requests</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Company</th>
                                <th>Type of request</th>
                                <th>Date</th>
                                <td>Action</td>
                            </tr>
                            @foreach($demands as $demand)
                                <tr>
                                    <td>
                                        {{\App\Http\Controllers\AdminController::getName($demand->company_id)}}
                                    </td>
                                    <td>{{$demand->value}}</td>
                                    <td>{{$demand->created_at}}</td>
                                    <td><a type="button" href="{{route('deleteRequest', $demand->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @endsection