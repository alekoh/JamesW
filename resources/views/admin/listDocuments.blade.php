@extends('admin.layout.auth')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Documents</h3>

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
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            @foreach($documents as $document)
                                <tr>
                                    <td>{{$document->id}}</td>
                                    <td>{{\App\Http\Controllers\AdminController::getName($document->company_id)}}</td>
                                    <td>{{$document->created_at}}</td>
                                    @if ($document->status === 0)
                                        <td><span class="label label-warning">Pending</span></td>
                                    @elseif ($document->status === 1)
                                        <td><span class="label label-success">Accepted</span></td>
                                    @elseif($document->status === -1)
                                        <td><span class="label label-danger">Denied</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    @endsection