@extends('admin.layouts.layout')

@section('title', 'Category')

@section('page-title', 'Category')

@section('content')
<section class="section webinar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal mt-5" role="form" method="POST"
                        action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif
  
                        <div class="row mb-3">
                            <label for="category_name" class="form-label col-md-2">Category Name</label>
                            <div class="col-md-4">
                                <input type="text" id="category_name" class="form-control" name="category_name"
                                    placeholder="Category Name"
                                    value="{{ isset($category) ? $category->category_name : old('category_name') }}">
                            </div>
  
                            <label for="category_image" class="form-label col-md-2">Category Image</label>
                            <div class="col-md-4">
                                <input type="file" id="category_image" class="form-control" name="category_image">
                                @if(isset($category) && $category->category_image)
                                    <img src="{{ asset('upload/category/' . $category->category_image) }}"
                                        alt="Image" width="60" class="mt-2">
                                @endif
                            </div>
                        </div>
  
                        <div class="row mb-3">
                            <label for="status" class="form-label col-md-2">Status</label>
                            <div class="col-md-3">
                                <select name="status" id="status" class="form-control">
                                    <option value="active" {{ (isset($category) && $category->status == 'active') ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ (isset($category) && $category->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
  
                        <div class="row mb-3">
                            <div class="col-md-9 offset-md-3 text-center">
                                <button class="btn btn-primary" type="submit">
                                    {{ isset($category) ? 'Update' : 'Submit' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>
  


<!-- jQuery (Latest Version) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



@endsection