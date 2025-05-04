@extends('frontend.layouts.layout')

@section('title', 'OWS')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2 class="text-white">{{$webinar->webinar_title}}</h2>
                    <div class="bt-option">
                        <a href="{{route('index')}}">Home</a>
                        <span>{{$webinar->webinar_title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- About Section Begin -->
 <section class="about-section spad mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Something About Our Webinar</h2>
                    <p class="f-para">{{$webinar->webinar_description}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="about-pic">
                    <img src="{{ asset('upload/webinar/' . $webinar->speaker_image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-text">
                    <h3>{{ $webinar->speaker_name }}</h3>
                    <p>{{ $webinar->about_speaker }}</p>
                    <ul>
                        <li><span class="icon_check"></span> {{ \Carbon\Carbon::parse($webinar->webinar_start_date)->format('d F Y') }} - {{ \Carbon\Carbon::parse($webinar->webinar_start_time)->format('h:i A') }}</li>
                        <li><span class="icon_check"></span> {{ \Carbon\Carbon::parse($webinar->webinar_end_date)->format('d F Y') }} - {{ \Carbon\Carbon::parse($webinar->webinar_end_time)->format('h:i A') }}</li>
                        <li><span class="icon_check"></span> {{ ucfirst($webinar->webinar_type) }} @if(!empty($webinar->webinar_price))<span>{{ $webinar->webinar_price }}</span>@endif</li>
                        <li><span class="icon_check"></span> {{ $webinar->webinar_address }}</li>
                    </ul>
                </div>
                <div class="mt-2">
                    <button class="primary-btn" data-toggle="modal" data-target="#registerModal">Register</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Webinars</h2>
                    <p>Our customers are our biggest supporters. What do they think of us?</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="testimonial-slider owl-carousel">
                        @foreach($relatedWebinars as $relatedWebinar)
                        <div class="col-lg-6">
                            <div class="testimonial-item">
                                <div class="ti-author">
                                    <div class="quote-pic">
                                        <img src="img/quote.png" alt="">
                                    </div>
                                    <div class="ta-pic">
                                        <img src="{{ asset('upload/webinar/' . $relatedWebinar->speaker_image) }}" alt="">
                                    </div>
                                    <div class="ta-text">
                                        <h5>{{ $relatedWebinar->speaker_name }}</h5>
                                        <span>{{ $relatedWebinar->webinar_title }}</span>
                                    </div>
                                </div>
                                <p>{{ $relatedWebinar->webinar_description }}</p>
                                <a href="{{ route('webinar.details', $relatedWebinar->id) }}" class="primary-btn">View Details</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register for {{ $webinar->webinar_title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('webinar.register', $webinar->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <input type="hidden" name="webinar_title" value="{{ $webinar->webinar_title }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->
@endsection