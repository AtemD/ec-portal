@extends('layouts.app')

@section('app-content-header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">{{ $client->name }}</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Clients
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid"> <!--begin::Row-->
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <div class="mb-3"> 
                        <label for="name" class="form-label">Name</label> 
                        <input type="email" class="form-control" id="name" aria-describedby="client_name">
                        <div id="client_name" class="form-text text-danger">
                            We'll never share your email with anyone else.
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-warning">Sign in</button>  -->
                    <button type="submit" class="btn btn-secondary float-end">Edit</button>
                </div>

            </div> <!-- /.card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Condensed Full Width Table</h3>
                </div> <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Task</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge text-bg-danger">55%</span></td>
                            </tr>
                            <tr class="align-middle">
                                <td>2.</td>
                                <td>Clean database</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar text-bg-warning" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-warning">70%</span> </td>
                            </tr>
                            <tr class="align-middle">
                                <td>3.</td>
                                <td>Cron job running</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar text-bg-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-primary">30%</span> </td>
                            </tr>
                            <tr class="align-middle">
                                <td>4.</td>
                                <td>Fix and squish bugs</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar text-bg-success" style="width: 90%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-success">90%</span> </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Simple Full Width Table</h3>
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-end">
                            <li class="page-item"> <a class="page-link" href="#">«</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">»</a> </li>
                        </ul>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Task</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge text-bg-danger">55%</span></td>
                            </tr>
                            <tr class="align-middle">
                                <td>2.</td>
                                <td>Clean database</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar text-bg-warning" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-warning">70%</span> </td>
                            </tr>
                            <tr class="align-middle">
                                <td>3.</td>
                                <td>Cron job running</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar text-bg-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-primary">30%</span> </td>
                            </tr>
                            <tr class="align-middle">
                                <td>4.</td>
                                <td>Fix and squish bugs</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar text-bg-success" style="width: 90%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-success">90%</span> </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Striped Full Width Table</h3>
                </div> <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Task</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge text-bg-danger">55%</span></td>
                            </tr>
                            <tr class="align-middle">
                                <td>2.</td>
                                <td>Clean database</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar text-bg-warning" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-warning">70%</span> </td>
                            </tr>
                            <tr class="align-middle">
                                <td>3.</td>
                                <td>Cron job running</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar text-bg-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-primary">30%</span> </td>
                            </tr>
                            <tr class="align-middle">
                                <td>4.</td>
                                <td>Fix and squish bugs</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar text-bg-success" style="width: 90%"></div>
                                    </div>
                                </td>
                                <td> <span class="badge text-bg-success">90%</span> </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
    </div> <!--end::Row-->
</div>
@endsection