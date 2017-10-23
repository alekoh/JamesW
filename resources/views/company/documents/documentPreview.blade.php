@extends('company.layout.layout-company')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <h3 class="box-title"></h3>
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            {{--@if($document->status == 1)
                            <p><strong>Status&nbsp</strong><span class="label label-warning">Pending</span></p>
                                @elseif($document->status ==-1)
                                <p><strong>Status&nbsp</strong><span class="label label-danger">Denied</span></p>
                                @elseif($document->status == 0)
                                <p><strong>Status&nbsp</strong><span class="label label-success">Accepted</span></p>
                            @endif--}}
                            {{--<p><strong>Status&nbsp</strong><span class="label label-warning">Pending</span></p>--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img src="{{ Storage::disk('s3')->url($document->value) }}">
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
                </div>
            </div>
        </div>
    </section>
    @endsection