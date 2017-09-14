@extends('admin.layout.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add request</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/requestForm') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="admin_id" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="admin_id" type="text" class="form-control" name="admin_id" value="{{ old('admin_id') }}" autofocus>

                                    {{--@if ($errors->has('admin_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('admin_id') }}</strong>
                                    </span>
                                    @endif--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Choose company</label>
                                <div class="col-md-6">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-header">Company</li>
                                            <li><a href="">{{\App\Http\Controllers\AdminController::getName($demand->company_id)}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <textarea cols="4" rows="4" about="value" type="text" name="">

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection