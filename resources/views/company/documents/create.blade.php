@extends('admin.layout.auth')

@section('content')

    <div class="container">

        <form method="post" action="{{url('/company/documents/create')}}">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="document_name">Document name </label>
                <input class="form-control" placeholder="Document name" id="document_name" name="document_name">
            </div>

            <div class="form-group">
                <label for="document_value">Document </label>
                <input type="file" class="form-control" placeholder="Document" name="document_value" id="document_value">
            </div>

            <div class="form-group">
                <label for="document_comment">Custom message</label>
                <textarea row="10" cols="5" class="form-control" name="document_comment" id="document_comment"></textarea>
            </div>
        </form>
    </div>
@endsection