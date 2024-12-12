@extends('frontend.main_master')
@section('main')


<!-- Room Details Area End -->
<div class="room-details-area pt-50 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="room-details-side">
                    
                    

                  
                </div>
            </div>

            <div class="col-lg-12">
                <div class="room-details-article">
                    
                    <div class="room-details-slider owl-carousel owl-theme">
                        @foreach ($multiImage as $image) 
                        <div class="room-details-item">
                            <img src="{{ asset('upload/roomimg/multi_img/'.$image->multi_img) }}" alt="Images">
                        </div>
                        @endforeach
                       
                    </div>





                    <div class="room-details-title">
                        <h2>{{ $roomdetails->type->name }}</h2>
                        <ul>
                            
                            <li>
                               <b>Price: ₱{{ $roomdetails->price }} per night</b>
                            </li> 
                         
                        </ul>
                    </div>

                    <div class="room-details-content">
                        <p>
                            {!! $roomdetails->description !!}
                        </p>




                        <div class="services-bar-widget">
                            <h3 class="title">Room Amenities</h3>
                            <div class="side-bar-list">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="facility-list">
                                            @foreach ($facility as $fac) 
                                            <li style="padding-top: 1px; padding-bottom: 1px"><a>{{ $fac->facility_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>







                        <div class="row">
                            <div class="col-lg-12">
                                <div class="services-bar-widget">
                                    <h3 class="title">Room Details</h3>
                                    <div class="side-bar-list">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a><b>Capacity:</b> {{ $roomdetails->total_adult + $roomdetails->total_child }} Person(s) </a>
                                                    </li>
                                                    <li>
                                                        <a><b>Size:</b> {{ $roomdetails->size }}ft<sup>2</sup></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a><b>View:</b> {{ $roomdetails->view }}</a>
                                                    </li>
                                                    <li>
                                                        <a><b>Bed Style:</b> {{ $roomdetails->bed_style }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>      
            </div>
        </div>
    </div>
</div>
<!-- Room Details Area End -->

<!-- Room Details Other -->
<div class="room-details-other pb-70">
    <div class="container">
        <div class="room-details-text">
            <h2>Other Rooms </h2>
        </div>

        <div class="row ">
           
           @foreach ($otherRooms as $item)
            <div class="col-lg-6">
                <div class="room-card-two">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-4 p-0">
                            <div class="room-card-img">
                                <a href="{{ url('room/details/'.$item->id) }}">
                                    <img src="{{ asset( 'upload/roomimg/'.$item->image ) }}" alt="Images">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-8 p-0">
                            <div class="room-card-content">
                                 <h3>
             <a href="{{ url('room/details/'.$item->id) }}">{{ $item['type']['name'] }}</a>
                                </h3>
                                <span>₱{{ $item->price }} per night </span>
                                
                                <p>{{ $item->short_desc }}</p>
                                <ul>
                   <li><i class='bx bx-user'></i> {{ $item->total_adult + $item->total_child }} Person(s)</li>
                   <li><i class='bx bx-expand'></i> {{ $item->size }}ft<sup>2</sup></li>
                                </ul>

                                <ul>
        <li><i class='bx bx-show-alt'></i>{{ $item->view }}</li>
        <li><i class='bx bxs-hotel'></i> {{ $item->bed_style }}</li>
                                </ul>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
            @endforeach
           


        </div>
    </div>
</div>
<!-- Room Details Other End -->




@endsection