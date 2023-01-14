
@extends('cms.parent')

@section('title', 'Edit Role')
@section('main-title', 'Edit Role')
@section('sub-title', 'Edit Role')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Role</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                    <div class="card-body">
                        <div class="form-group">
                        <label for="job_name">Job name</label>
                        <input type="text" class="form-control" id="job_name" name="job_name"
                        value="{{ $roles->job_name }}" placeholder="Enter Job name">
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name_user">name user</label>
                                <select name="name_user" class="form-control" id="name_user"
                                aria-label=".form-select-sm example">
                                    <option value="">Chose</option>
                                    <option value="admin">admin</option>
                                    <option value="account">account</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>permission Name</label>
                                <select class="form-control select2" id="permission_id" name="permission_id" style="width: 100%;">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name_permission }}</option>
                                        <option 
                                                @if($permission->id == $roles->permission_id)
                                                    selected
                                                @endif 
                                                value="{{ $permission->id }}">{{ $permission->permission_name }}
                                            </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button onclick="preformUpdate({{ $roles->id }})" type="button" class="btn btn-primary">Store</button>
                        <a href="{{ route('roles.index') }}" type="submit" class="btn btn-info">Go back</a>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  </section>

@endsection

@section('scripts')
<script>
    function preformUpdate(id){
        let formData = new FormData();
        formData.append('job_name' , document.getElementById('job_name').value);
        formData.append('name_user' , document.getElementById('name_user').value);
        formData.append('permission_id' , document.getElementById('permission_id').value);
        storeRoute('/cms/admin/roles-update/'  + id , formData);
    }
</script>

@endsection
