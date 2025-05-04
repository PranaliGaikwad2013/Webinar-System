@extends('admin.layouts.layout')

@section('title', 'Category')

@section('page-title', 'Category')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <form class="d-flex me-2" method="GET" action="{{route('category.list')}}">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary" title="Search">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>

                        <a href="{{route('category.create')}}" class="btn btn-primary">+</a>
                    </div>
                </div>

                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Status</th>
                            <th class="no-wrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $data)
                        <tr>
                            <td>{{ $categories->firstItem() + $loop->index }}</td>
                            <td>{{ $data->category_name }}</td>
                            <td>
                                @if($data->category_image)
                                    <img src="{{ asset('upload/category/' . $data->category_image) }}" alt="Category Image" width="60" height="60">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            
                            <td>{{ $data->status }}</td>
                            <td class="text-center text-nowrap">
                              <a href="{{route('category.edit', $data->id)}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                              <form action="{{ route('category.delete', $data->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>                            
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                  </table>
                  <div class="d-flex justify-content-center">
                    {{ $categories->appends(['search' => request()->search])->links() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection