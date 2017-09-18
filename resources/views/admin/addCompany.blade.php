@extends('admin.layout.auth')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add new company</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action="{{ url('/admin/addCompany') }}">
                        {{ csrf_field() }}
                        <!-- text input -->
                            <div class="form-group">
                                <label for="company_name" class="control-label">Company name</label>
                                <input type="hidden" name="company_id" value="id">
                                <input id="company_name" type="text" class="form-control" name="company_name" value="{!! csrf_token() !!}" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input id="email" type="text" class="form-control" name="company_name" value="{{ ('email') }}" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="text" class="form-control" name="company_name" value="{{ ('password') }}" autofocus>
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