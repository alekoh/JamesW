@extends('admin.layout.auth')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="{{route('pending')}}"><span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Pending submissions</span>

                    {{--@if($document->status === 0)--}}
                        <span class="info-box-number">{{  \App\Http\Controllers\AdminController::getSumPending()}}</span>
                    {{--@endif--}}

                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Accepted submissions</span>
                        <span class="info-box-number">{{\App\Http\Controllers\AdminController::getSumAccepted()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="{{route('denied')}}"><span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span></a>

                <div class="info-box-content">
                    <span class="info-box-text">Denied submissions</span>

                    <span class="info-box-number">{{\App\Http\Controllers\AdminController::getSumDenied()}}</span>

                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        {{--Documents--}}
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="{{route('listDocuments')}}">Documents</a></h3>

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
                                <th>Document</th>
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
                                <td>
                                    <a href="{{route('documentPreviewAdmin')}}" type="button" class="btn btn-primary btn-sm">Preview</a>
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
        {{--Companies--}}
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="{{route('listCompanies')}}">Companies</a></h3>

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
                            @foreach($companies as $company)
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                <tr>
                                    <td>{{$company->id}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="{{route('listRequests')}}">Requests</a></h3>

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
                                </tr>
                            @foreach($demands as $demand)
                                <tr>
                                    <td>
                                        {{\App\Http\Controllers\AdminController::getName($demand->company_id)}}
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
