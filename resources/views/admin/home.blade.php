@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as Admin!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @foreach($documents as $document)
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Documents</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Company name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Date of creation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        {{$document->id}}&nbsp;
                                    </td>
                                    <td>
                                        {{\App\Http\Controllers\AdminController::getName($document->company_id)}}&nbsp;
                                    </td>
                                    <td>
                                        {{$document->value}}&nbsp;
                                    </td>
                                    <td>
                                        {{$document->status}}&nbsp;
                                    </td>
                                    <td>
                                        {{$document->created_at}}
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4">
            @foreach($companies as $company)
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Companies</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company name</th>
                                    <th>Company email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        {{$company->id}}
                                    </td>
                                    <td>
                                        {{$company->name}}
                                    </td>
                                    <td>
                                        {{$company->email}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
