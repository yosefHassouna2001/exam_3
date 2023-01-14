
@extends('cms.parent')

@section('title', 'Create Permission')
@section('main-title', 'Create Permission')
@section('sub-title', 'Create Permission')

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
                    <h3 class="card-title">Create Permission</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name_permission">name permission</label>
                                <input type="text" class="form-control" id="name_permission" name="name_permission" placeholder="Enter name permission">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="status">name user</label>
                                <select name="status" class="form-control" id="status"
                                aria-label=".form-select-sm example">
                                    <option value="">Chose</option>
                                    <option value="active">active</option>
                                    <option value="reject">reject</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button onclick="preformStore()" type="button" class="btn btn-primary">Store</button>
                        <a href="{{ route('permissions.index') }}" type="submit" class="btn btn-info">Go back</a>
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
    function preformStore(){
        let formData = new FormData();
        formData.append('name_permission' , document.getElementById('name_permission').value);
        formData.append('status' , document.getElementById('status').value);
        store('/cms/admin/permissions' , formData);
    }
</script>

@endsection
