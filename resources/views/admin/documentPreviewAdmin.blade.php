@extends('admin.layout.auth')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <h3 class="box-title">Document content</h3>
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <p><strong>Status&nbsp</strong><span class="label label-warning">Pending</span></p>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <center><img src="{{asset('assets/img/defenders.jpg')}}"></center>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-block btn-success">Accept</button>
                        <button type="button" class="btn btn-block btn-danger">Deny</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection