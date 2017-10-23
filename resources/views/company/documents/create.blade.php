@extends('company.layout.layout-company')

@section('content')

    <section class="content">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload document</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data" action="{{url('/company/documents/create')}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="document_name">Document name </label>
                            <input class="form-control" type="text" placeholder="Document name" id="document_name" name="document_name">
                        </div>
                        <div class="form-group">
                            <label for="document_value">Document</label>
                            <input type="file" id="document_value" name="document_value">

                        </div>
                        <div class="form-group">
                            <label for="document_comment">Message</label>
                            <textarea row="11" cols="5" class="form-control" name="document_value" id="document_comment"></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
    </section>
@endsection