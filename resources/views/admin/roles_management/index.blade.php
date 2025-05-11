@extends('admin.layouts.layout')

@section('title', 'Role Mangement')

@section('page-title', 'Role Management')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Roles</h4>
                    <div class="text-end mb-2">
                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#roleModal">+</a>
                    </div>

                </div>
                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped rolesList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>

                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User Creation Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="roleModalLabel">Create New Role</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <div class="col">
                <label for="role">Role Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
              </div>
            </div>
            <div class="mb-3 text-center">
              <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection
<script>
    const rolesUrl = "{{ route('roles.list') }}";
</script>
