
@extends('cms.parent')

@section('title', 'Index Permisson')
@section('main-title', 'Index Permisson')
@section('sub-title', 'Index Permisson')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('permissions.create') }}" type="submit" class="btn btn-info">Add New Permisson</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Permisson Name</th>
                                <th>Number of City</th>
                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permisson)
                                    <tr>
                                        <td>{{ $permisson->id }}</td>
                                        <td>{{ $permisson->name_permission ?? ""  }}</td>
                                        <td>{{ $permisson->status ?? "" }}</td>
                                        
                                        <td style="width: 200px">
                                            <div class="btn group w-100">
                                                <a href="{{ route('permissions.edit' , $permisson->id) }}" type="button" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a type="button" onclick="performDestroy({{ $permisson->id }} , this)" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{ $permissions->links() }}
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
        confirmDestroy('/cms/admin/permissions/' + id , referance)
    }
</script>

@endsection