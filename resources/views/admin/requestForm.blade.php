@extends('admin.layout.auth')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create request</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action="{{ url('/admin/createRequest') }}">
                        {{ csrf_field() }}
                            <!-- text input -->
                            <div class="form-group">
                                <label for="admin_id" class="control-label">Admin</label>
                                <input id="admin_id" type="text" class="form-control" name="admin_id" value="{{ old('admin_id') }}" autofocus>
                            </div>
                            @foreach($companies as $company)
                                <div class="form-group">
                                    <label>Choose Company</label>
                                    @foreach($companies as $company)
                                        <input type="hidden" name="company_id" value="{{$company->id}}">
                                        <select class="form-control" data-toggle="dropdown" type="button">
                                            <option>{{$company->name}}</option>
                                        </select>
                                    @endforeach
                                    </div>
                                @endforeach
                            <!-- textarea -->
                            {{--<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="exampleTextarea" rows="4" cols="7" name="value"></textarea>
                            </div>--}}
                         <div class="form-group">
                             <div class="box">
                                 <div class="box-header">
                                     <h3 class="box-title">Description of the request
                                         <small>Simple and fast</small>
                                     </h3>
                                     <!-- tools box -->
                                     <div class="pull-right box-tools">
                                         <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                             <i class="fa fa-minus"></i></button>
                                         <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                             <i class="fa fa-times"></i></button>
                                     </div>
                                     <!-- /. tools -->
                                 </div>
                                 <!-- /.box-header -->
                                 <div class="box-body pad">
                                     <form>
                                         <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                     </form>
                                 </div>
                             </div>
                         </div>
                        <!-- select -->
                            <div class="box-footer">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    @endsection