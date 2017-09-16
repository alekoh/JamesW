@extends('company.layout.layout-company')

@section('content')
    <section class="content">
        <div class="row">
            {{--<div class="col-md-12 col-xs-12">
                <div class="callout callout-warning" style="height: 50px;">
                   <div class="col-md-3"><h4>You have 3 new requests</h4></div>
                    <div class="col-md-6"> <a href="{{route('myRequests')}}" style="text-decoration: none"> <p>Review them</p>
                        </a></div>
                </div>
            </div>--}}
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{route('pending')}}"><span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span></a>

                    <div class="info-box-content">
                        <span class="info-box-text">Pending submissions</span>

                                <span class="info-box-number">2</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Accepted submissions</span>

                                <span class="info-box-number">0</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{route('denied')}}"><span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span></a>

                    <div class="info-box-content">
                        <span class="info-box-text">Denied submissions</span>
                                <span class="info-box-number">1</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            {{--Documents--}}
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{url('company/documents/listMyDocuments')}}">Documents</a></h3>

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
                                    <th>Document ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Document</th>
                                </tr>
                                @foreach($documents as $document)
                                    <tr>
                                        <td>{{$document->id}}</td>
                                        <td>{{$document->created_at}}</td>
                                        @if ($document->status === 0)
                                            <td><span class="label label-warning">Pending</span></td>
                                        @elseif ($document->status === 1)
                                            <td><span class="label label-success">Accepted</span></td>
                                        @elseif($document->status === -1)
                                            <td><span class="label label-danger">Denied</span></td>
                                        @endif
                                        <td>
                                            <a href="{{route('documentPreview')}}" type="button" class="btn btn-primary btn-sm">Preview</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            {{--Requests--}}
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{route('myRequests')}}">Requests</a></h3>

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
                                    <th>From</th>
                                    <th>Type of request</th>
                                    <th>Date</th>
                                </tr>
                                @foreach($demands as $demand)
                                    <tr>
                                        <td>
                                            {{\App\Http\Controllers\Controller::getAdminName($demand->admin_id)}}
                                        </td>
                                        <td>{{$demand->value}}</td>
                                        <td>{{$demand->created_at}}</td>
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
    </section>
@endsection
