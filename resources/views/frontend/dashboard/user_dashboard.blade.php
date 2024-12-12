@extends('frontend.main_master')
@section('main')

<!-- Service Details Area -->
<div class="service-details-area pt-50 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.dashboard.user_menu')
            </div>

            <div class="col-lg-9 d-flex justify-content-center align-items-center" style="min-height: 300px;">
                <div class="text-center">
                    <h2>Welcome to <span style="color: #B56952">San's Beach Resort</span>! Find your perfect room and start your unforgettable experience with us!</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Details Area End -->

@endsection
