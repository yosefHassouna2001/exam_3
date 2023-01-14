
@extends('cms.parent')

@section('title', 'Index Role')
@section('main-title', 'Index Role')
@section('sub-title', 'Index Role')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('countries.create') }}" type="submit" class="btn btn-info">Add New Role</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>job_name</th>
                                <th>name_user</th>
                                <th>permission_id</th>
                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->job_name ?? "" }}</td>
                                        <td>{{ $role->name_user ?? "" }}</td>
                                        <td><span class="badge bg-info"> {{ $role->permissions->name_permission ?? "" }}</span></td>

                                        <td style="width: 200px">
                                            <div class="btn group w-100">
                                                <a href="{{ route('roles.edit' , $role->id) }}" type="button" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" onclick="performDestroy({{ $role->id }} , this)" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        confirmDestroy('/cms/admin/roles/' + id , referance)
    }
</script>

@endsection