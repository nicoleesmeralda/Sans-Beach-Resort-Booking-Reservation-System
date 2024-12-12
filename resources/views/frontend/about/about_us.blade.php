@extends('frontend.main_master')
@section('main')

        <!-- About Area -->
        <div class="about-area pt-45 pb-70">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{asset('frontend/assets/img/about/about-img3.jpg')}}" alt="Images">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <h2 style="font-weight: 700">About Us</h2>
                                <p style="color: black">
                                    Nestled in the serene coastal town of San Diego, Lian, Batangas, 
                                    San's Beach Resort is your perfect getaway for relaxation and tranquility. 
                                    We offer a variety of six distinct room types, each designed to cater to different needs and preferences. 
                                    Whether you're here for a family vacation, a romantic escape, or a solo retreat, 
                                    our 24 well-appointed rooms provide a comfortable and refreshing stay. 
                                    Escape the hustle and bustle, and experience the beauty of Batangas with us at San's Beach Resort.
                                </p>
                            </div>

  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->

        <!-- Choose Area -->
        <div class="choose-area pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <h2 style="font-weight: 700">Why Choose Us</h2>
                </div>
                <div class="row pt-45">
                    <div class="col-lg-4 col-md-6">
                        <div class="choose-card">
                            <i class="flaticon-restaurant"></i>
                            <h3>Comfortable Accommodations</h3>
                            <p style="color: black">Experience the charm of San's Beach Resort with six distinct room types tailored for your needs.
                                 Our 24 well-appointed rooms offer a relaxing and cozy stay.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="choose-card">
                            <i class="flaticon-wifi-signal-1"></i>
                            <h3>Seamless Connectivity</h3>
                            <p style="color: black">Stay connected with complimentary high-speed Wi-Fi available throughout the resort, 
                                ensuring you can share your memorable moments or stay in touch with loved ones.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                        <div class="choose-card">
                            <i class="flaticon-fireworks"></i>
                            <h3>Exceptional Guest Satisfaction</h3>
                            <p style="color: black">Our commitment to excellence is reflected in our 5-star ratings from delighted guests. 
                                Discover unparalleled service and create unforgettable memories at San's Beach Resort.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Choose Area End -->

        <!-- Ability Area -->
        <div class="ability-area section-bg pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="ability-content">
                            <div class="section-title">
                                <h2 style="font-weight: 700">Vision and Values</h2>
                                <p style="color: black;">
                                    San’s Beach Resort envisions being the premier destination in San Diego, Lian, Batangas, 
                                    offering guests an exceptional escape in a serene coastal setting. We are committed to providing personalized service, 
                                    prioritizing guest satisfaction, and maintaining sustainability in all our operations. Our values are rooted in creating 
                                    lasting memories, ensuring comfort, and fostering a peaceful environment where all guests can relax and rejuvenate.
                                </p>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="ability-img-2">
                            <img src="{{asset('frontend/assets/img/ability-img2.jpg')}}" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ability Area  End -->

        <!-- Specialty Area Two -->
        <div class="specialty-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="specialty-img-3">
                            <img src="{{asset('frontend/assets/img/specialty/specialty-img3.jpg')}}" alt="Images">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="specialty-list">
                            <div class="section-title">
                                <h2 style="font-weight: 700">What Sets Us Apart</h2>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="specialty-list-card">
                                        <i class="text-color flaticon-decoration"></i>
                                        <h3>Exquisite Interiors</h3>
                                        <p style="color: black">Relax in beautifully designed rooms that blend comfort and style for a serene getaway.</p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="specialty-list-card">
                                        <i class="text-color flaticon-champagne-glass"></i>
                                        <h3>Exclusive Bar Experience</h3>
                                        <p style="color: black">Enjoy complimentary access to our luxury bar, offering premium drinks in a refined setting.</p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="specialty-list-card">
                                        <i class="text-color flaticon-fireworks"></i>
                                        <h3>Top-Rated Excellence</h3>
                                        <p style="color: black">Experience 5-star hospitality at San's Beach Resort, where guest satisfaction comes first.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Specialty Area Two End -->

@endsection