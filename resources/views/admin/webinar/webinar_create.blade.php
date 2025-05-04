@extends('admin.layouts.layout')

@section('title', 'Webinar')

@section('page-title', 'Webinar')

@section('content')
<section class="section webinar">
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <form class="form-horizontal mt-5" role="form" method="POST" action="{{ route('webinar.store')}}" enctype="multipart/form-data">
                      @csrf
                      
                      <div class="row mb-3">
                        <label for="title" class="form-label col-md-2">Category</label>
                        <div class="col-md-4">
                            <select name="category_id" id="" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                    </div>

                      <div class="row mb-3">
                          <label for="title" class="form-label col-md-2">Title</label>
                          <div class="col-md-10">
                              <input type="text" id="title" name="webinar_title" placeholder="Webinar Title" class="form-control">
                          </div>
                      </div>
                      
                      <div class="row mb-3">
                          <label for="start_date" class="form-label col-md-2">Start Date</label>
                          <div class="col-md-4">
                              <input type="date" id="web_start_date" class="form-control" name="webinar_start_date">
                          </div>
                          <label for="start_time" class="form-label col-md-2">Start Time</label>
                          <div class="col-md-4">
                              <input type="time" id="web_start_time" class="form-control" name="webinar_start_time">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="end_date" class="form-label col-md-2">End Date</label>
                          <div class="col-md-4">
                              <input type="date" id="web_end_date" class="form-control" name="webinar_end_date">
                          </div>
                          <label for="end_time" class="form-label col-md-2">End Time</label>
                          <div class="col-md-4">
                              <input type="time" id="web_end_time" class="form-control" name="webinar_end_time">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="name" class="form-label col-md-2">Speaker Name</label>
                          <div class="col-md-4">
                              <input type="text" id="name" name="speaker_name" placeholder="Speaker Name" class="form-control">
                          </div>

                          <label for="name" class="form-label col-md-2">Speaker Image</label>
                          <div class="col-md-4">
                              <input type="file" id="name" name="speaker_image" class="form-control">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="about" class="form-label col-md-2">About Speaker</label>
                          <div class="col-md-10">
                              <textarea class="form-control" id="about" name="about_speaker" rows="8" required></textarea>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="webinarType" class="form-label col-md-2">Webinar Type</label>
                          <div class="col-md-4">
                              <select id="web_type" class="form-control" name="webinar_type">
                                  <option value="">Select Webinar Type</option>
                                  <option value="free">Free</option>
                                  <option value="paid">Paid</option>
                              </select>
                          </div>
                          <label for="webinarMode" class="form-label col-md-2">Webinar Mode</label>
                          <div class="col-md-4">
                              <select id="webinarMode" class="form-control" name="webinar_mode">
                                  <option value="">Select Mode</option>
                                  <option value="online">Online</option>
                                  <option value="offline">Offline</option>
                              </select>
                          </div>
                      </div>

                      <!-- Price and GST Checkbox (Hidden by default) -->
                      <div class="row mb-3 align-items-center" id="price_section" style="display: none;">
                        <label for="price" class="form-label col-md-3 text-end">Webinar Price</label>
                        <div class="col-md-6">
                            <input type="text" name="webinar_price" placeholder="Price" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center" id="gst_section" style="display: none;">
                        <div class="col-md-9 offset-md-3">
                            <input class="form-check-input" type="checkbox" id="gst_checkbox">
                            <label class="form-check-label" for="gst_checkbox">Include GST</label>
                        </div>
                    </div>
                      <!-- Webinar Address (Hidden by default) -->
                      <div class="row mb-3 align-items-center" id="web_address_section" style="display: none;">
                        <label for="web_add" class="form-label col-md-3 text-end">Webinar Address</label>
                        <div class="col-md-6">
                            <input type="text" name="webinar_address" id="web_add" class="form-control">
                        </div>
                    </div>

                    <!-- Webinar Link (Hidden by default) -->
                    <div class="row mb-3 align-items-center" id="web_link_section" style="display: none;">
                        <label for="web_link" class="form-label col-md-3 text-end">Webinar Link</label>
                        <div class="col-md-6">
                            <input type="text" id="webinar_link" placeholder="Webinar Link" class="form-control" name="webinar_link">
                        </div>
                    </div>

                      <div class="row mb-3">
                          <label for="web_desc" class="form-label col-md-2">Description</label>
                          <div class="col-md-10">
                              <textarea class="form-control" id="web_desc" rows="8" name="webinar_description"></textarea>
                          </div>
                      </div>

                      <div class="row mb-3">
                        <label for="web_desc" class="form-label col-md-2">Status</label>
                        <div class="col-md-3">
                            <select name="status" id="status" class="form-control">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                      <div class="row mb-3">
                          <div class="col-md-9 offset-md-3 text-center">
                              <button class="btn btn-primary" type="submit">Register Webinar</button>
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

<script>
    $(document).ready(function () {
        // Run functions on page load to ensure correct visibility
        togglePriceFields();
        toggleModeFields();

        // Attach event listeners
        $("#web_type").change(function () {
            togglePriceFields();
        });

        $("#webinarMode").change(function () {
            toggleModeFields();
        });

        function togglePriceFields() {
            let webinarType = $("#web_type").val();
            if (webinarType === "paid") {
                $("#price_section, #gst_section").show();
            } else {
                $("#price_section, #gst_section").hide();
            }
        }

        function toggleModeFields() {
            let webinarMode = $("#webinarMode").val();
            if (webinarMode === "offline") {
                $("#web_address_section").show();
                $("#web_link_section").hide();
            } else if (webinarMode === "online") {
                $("#web_address_section").hide();
                $("#web_link_section").show();
            } else {
                $("#web_address_section, #web_link_section").hide();
            }
        }
    });
</script>

@endsection