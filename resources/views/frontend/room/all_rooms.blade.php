@extends('frontend.main_master')
@section('main')

<!-- Room Area -->
<div class="room-area pt-50 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color" style="font-weight: 700">ROOMS</span>
            <h2 style="font-weight: 700">All Rooms</h2>
        </div>
        <div class="row pt-45">
           
           @foreach ($rooms as $item)
            <div class="col-lg-4 col-md-6">
                <div class="room-card">
                    <a href="{{ url('room/details/'.$item->id) }}">
                        <img src="{{ asset( 'upload/roomimg/'.$item->image ) }}" alt="Images" style="width: 550px; height:300px;">
                    </a>
                    <div class="content">
                        <h6><a href="{{ url('room/details/'.$item->id) }}" style="color: #1B2132">{{ $item['type']['name'] }}</a></h6>
                        <ul>
                            <li class="text-color">₱{{ $item->price }}</li>
                            <li class="text-color">night</li>
                        </ul>
                        <ul>
                            <li>Capacity: {{ $item->total_adult + $item->total_child }} Person(s)</li>
                        </ul>
                    </div>
                </div>
            </div> 
           @endforeach

        
        </div>
    </div>
</div>
<!-- Room Area End -->






@endsection