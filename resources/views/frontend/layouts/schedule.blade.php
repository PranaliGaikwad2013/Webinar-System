
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Our Schedule</h2>
                    <p>Do not miss anything topic about the event</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="schedule-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#tabs-{{ $category->id }}" role="tab">
                                <h5>{{ $category->category_name }}</h5>
                                {{-- <p>{{ $category->created_at->format('F d, Y') }}</p> --}}
                            </a>
                        </li>
                        @endforeach
                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        @foreach($categories as $category)
                        <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tabs-{{ $category->id }}" role="tabpanel">
                            <div class="webinar-slider">
                                @foreach($category->webinars as $webinar)
                                <div class="st-content position-relative">
                                    <div class="ribbon-box">
                                        <span class="ribbon {{ $webinar->webinar_type == 'paid' ? 'paid' : 'free' }}">
                                            {{ ucfirst($webinar->webinar_type) }}
                                        </span>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="sc-pic">
                                                    <img src="{{ asset('upload/webinar/' . $webinar->speaker_image) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="sc-text">
                                                    <h4>{{ $webinar->webinar_title }}</h4>
                                                    <ul>
                                                        <li><i class="fa fa-user"></i> {{ $webinar->speaker_name }}</li>
                                                        <li><i class="fa fa-envelope"></i> {{ $webinar->webinar_link }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="sc-widget">
                                                    <li><i class="fa fa-clock-o"></i> {{ $webinar->webinar_start_time }} - {{ $webinar->webinar_end_time }}</li>
                                                    @if(!empty($webinar->webinar_price))
                                                    <li><i class="fa fa-inr"></i>{{$webinar->webinar_price}}</li>
                                                    @endif
                                                    @if(!empty($webinar->webinar_address))
                                                    <li><i class="fa fa-map-marker"></i> {{ $webinar->webinar_address }}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-center align-items-center mt-3">
                                               <p>{{$webinar->webinar_description}}</p>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-center align-items-center mt-3">
                                                <a href="{{route('webinar.details', $webinar->id)}}" class="primary-btn">Details</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
