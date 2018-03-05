@extends("main")
@section("title", "Add User")
@section("stylesheets")
    <link rel="stylesheet" href="/css/pages/master/user.css" />
@endsection
@section("content")

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master
            <small>Add User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="/"><i class="fa fa-cog fa-fw"></i>Master</a></li>
            <li class="active">Add User</li>
        </ol>
        <hr/>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="#" data-izimodal-open="#user-modal" class="btn btn-success">Add New User</a>
                <div class="panel panel-primary">
                    <div class="panel-heading" data-toggle="collapse" href="#body-user-list">User List</div>
    
                    <div class="panel-body panel-collapse collapse in" id="body-user-list">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered datable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-center">{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa">&#xf044;</i></button>
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('auth.create');
        @include('auth.edit');
    </section>
@endsection

@section("javascripts")
    <script src="/js/pages/master/user.js"></script>
@endsection