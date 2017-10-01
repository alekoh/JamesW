@extends('company.layout.layout-company')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6 col-xs-12">

                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Name and surname: </label>
                                {{ $name }}
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                {{ $email }}
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-light"> Update info </button>
                                <button type="button" class="btn btn-outline-light">Reset password</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection