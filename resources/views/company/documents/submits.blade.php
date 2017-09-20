@extends('company.layout.layout-company')

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
                            <th>Document ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Document</th>
                        </tr>
                        @foreach($myDocuments as $document)
                            <tr>
                                <td>{{$document->id}}</td>
                                <td>{{$document->name}}</td>
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
                                {{--<td>
                                    <div class="example-modal">
                                        <div class="modal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Default Modal</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>One fine body&hellip;</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                </td>--}}
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