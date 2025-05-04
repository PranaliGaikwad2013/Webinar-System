@extends('admin.layouts.layout')

@section('title', 'Webinar')

@section('page-title', 'Webinar')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="{{route('webinar.create')}}" class="btn btn-primary">+</a>
                    </div>
                </div>

                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped webinarList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Webinar Title</th>
                            <th>Speaker Name</th>
                            <th>Webinar Start Date</th>
                            <th>Webinar End Date</th>
                            <th>Status</th>
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

<script>
    const webinarUrl = "{{ route('webinar.list') }}"
</script>

@endsection