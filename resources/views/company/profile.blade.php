@extends('company.layout.layout-company')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-3 PaddingTop">
                            <div class="panel panel-default">

                                <img class="portfolio-item" src="{{asset("/uploads/avatars/$user->avatar")}}" id="avatarImg">

                                <form role="form" method="post" enctype="multipart/form-data" action="{{url('company/profile')}}">
                                    {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Update profile picture </label>
                                            <input class="form-control" type="file" name="avatar">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-md-offset-1 PaddingTop">
                            <div class="row">
                                <div class="col-md-6 fontStyle"> <label>Name and surname: </label> </div>
                                <div class="col-md-6 fontStyle">{{ $name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fontStyle"> <label>Email:</label></div>
                                <div class="col-md-6 fontStyle">{{ $email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fontStyle">
                                    <button type="button" class="btn btn-success"> Update info </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fontStyle">
                                <button type="button" class="btn btn-primary">Reset password</button>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection