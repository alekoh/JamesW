@extends('company.layout.layout-company')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                    <a class="portfolio-item img-responsive"  id="avatar_image" style=" background-image: url({{asset("/uploads/avatars/$user->avatar")}});" href="#" data-toggle="modal" data-target="#myModal">
                                        <div class="details">
                                            <span class="fontStyle">Upload or remove<br/>photo</span>
                                        </div>
                                    </a>
                                    <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('company/profile')}}">
                                                        {{ csrf_field() }}
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Update profile picture </label>
                                                                <input class="form-control" type="file" name="avatar">
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success">Save photo</button>
                                                            </div>
                                                            <div class="row">
                                                                <a type="button" class="btn btn-danger" id="delete_image">Remove photo</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </form>
                                                </div>
                                               {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>--}}
                                            </div>

                                        </div>
                                    </div>
                                    {{--end Modal--}}

                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-md-offset-1 PaddingTop">
                            <div class="row">
                                <div class="col-md-6 fontStyle"> <label>Name and surname: </label> </div>
                                <div class="col-md-6 fontStyle">{{ $user->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fontStyle"> <label>Email:</label></div>
                                <div class="col-md-6 fontStyle">{{ $user->email}}</div>
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