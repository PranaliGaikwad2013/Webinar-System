@extends('admin.layouts.layout')

@section('title', 'User Mangement')

@section('page-title', 'User Management')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Users</h4>
                    <div class="text-end mb-2">
                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userModal">+</a>
                    </div>

                </div>
                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped userList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
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
<div class="modal fade {{ isset($editUser) ? 'show d-block' : '' }}" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="{{ isset($editUser) ? 'false' : 'true' }}" style="{{ isset($editUser) ? 'background-color: rgba(0,0,0,0.5);' : '' }}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userModalLabel">{{ isset($editUser) ? 'Edit User' : 'Create New User' }}</h5>
           <a href="{{ route('users.list') }}" class="btn-close" aria-label="Close"></a>
        </div>
        <div class="modal-body">
         <form action="{{ isset($editUser) ? route('user.update', $editUser->id) : route('user.store') }}" method="POST">
    @csrf
    @if(isset($editUser))
        @method('PUT')
    @endif
            <div class="row mb-3">
              <div class="col">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ isset($editUser) ? $editUser->name : old('name') }}">
              </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ isset($editUser) ? $editUser->email : old('email') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="password">Password</label>
                <input type="password" name="password" class="form-control" value="{{ isset($editUser) ? $editUser->password : old('password') }}">
                </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="roles" class="form-label">Roles</label>
                <select name="roles[]" id="roles" class="form-select" multiple>
                  <option value="" disabled selected>-- Select --</option>
                  @foreach($roles as $role)
                    <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected' : '' }}>{{ $role }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="mb-3 text-center">
             <button type="submit" class="btn btn-success">
                  {{ isset($editUser) ? 'Update' : 'Save' }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection
<script>
    const userUrl = "{{ route('users.list') }}";
</script>
