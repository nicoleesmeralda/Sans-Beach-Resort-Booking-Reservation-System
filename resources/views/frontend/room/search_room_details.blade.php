@extends('frontend.main_master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



<!-- Room Details Area End -->
<div class="room-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="room-details-side">
                    <div class="side-bar-form">
                        <h3>Booking Sheet </h3>

<form action="{{ route('user_booking_store',$roomdetails->id) }}" method="post" id="bk_form">
    @csrf
    
    <input type="hidden" name="room_id" value="{{ $roomdetails->id }}">


    <div class="row align-items-center">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Check-in Date</label>
                <div class="input-group">
    <input autocomplete="off"  type="text" required name="check_in" id="check_in" class="form-control" value="{{ old('check_in') ? date('Y-m-d', strtotime(old('check_in'))) : '' }}" readonly>
                    <span class="input-group-addon"></span>
                </div>
                
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label>Check-out Date</label>
                <div class="input-group">
   <input autocomplete="off"  type="text" required name="check_out" id="check_out" class="form-control" value="{{ old('check_out') ? date('Y-m-d', strtotime(old('check_out'))) : '' }}" readonly>
                    <span class="input-group-addon"></span>
                </div>
                
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label>Number of Guests</label>
                <select class="form-control" name="persion" id="nmbr_person">
                @for ($i = 1; $i <= 4; $i++) 
      <option {{ old('persion') == $i ? 'selected' : '' }} value="0{{ $i }}" >0{{ $i }} </option>
              @endfor
                </select>	
            </div>
            <p style="color: #1B2132; font-size: 14px;">Max Capacity: <span style="color: #198754">{{ $roomdetails->total_adult }} Adult(s), {{ $roomdetails->total_child }} Child(ren)</span></p>
        </div>

        <input type="hidden" id="total_guest" value="{{ $roomdetails->total_adult + $roomdetails->total_child }}">
        <input type="hidden" id="room_price" value="{{ $roomdetails->price }}">
        <input type="hidden" id="discount_p" value="{{ $roomdetails->discount }}">

        <div class="col-lg-12">
            <div class="form-group">
                <label>Number of Rooms</label>
                <select class="form-control number_of_rooms" name="number_of_rooms" id="select_room">
                    @for ($i = 1; $i <= 4; $i++)  
                    <option value="0{{ $i }}">0{{ $i }}</option>
                    @endfor
                    
                </select>	
            </div>
            <input type="hidden" name="available_room" id="available_room" >
            <p class="available_room" style="color: #1B2132; font-size: 15px; padding-left: 3px"></p>
        </div>
     

        <div class="col-lg-12">
            <table class="table">
                
    <tbody>
        <tr> 
        <td><p><b>Subtotal</b></p></td>
        <td style="text-align: right" ><span class="t_subtotal">0</span> </td> 
        </tr>

        <tr> 
        <td><p><b> Discount </b></p></td>
        <td style="text-align: right" ><span class="t_discount">0</span></td> 
        </tr>

        <tr> 
        <td><p><b>Total</b></p></td>
        <td style="text-align: right" ><span class="t_g_total">0</span></td> 
        </tr>
        
    </tbody>
              </table>

        </div>






        <div class="col-lg-12 col-md-12">
            <button type="submit" class="default-btn btn-bg-three border-radius-5">
                Book Now
            </button>
        </div>
    </div>
</form>
                    </div>

                  
                </div>
            </div>

            <div class="col-lg-8">
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
                                                    <a><b>Size:</b> {{ $roomdetails->size }}ft<sup>2</sup> </a>
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



<script>
    $(document).ready(function () {
       var check_in = "{{ old('check_in') }}";
       var check_out = "{{ old('check_out') }}";
       var room_id = "{{ $room_id }}";
       if (check_in != '' && check_out != ''){
          getAvaility(check_in, check_out, room_id);
       }


       $("#check_out").on('change', function () {
          var check_out = $(this).val();
          var check_in = $("#check_in").val();

          if(check_in != '' && check_out != ''){
             getAvaility(check_in, check_out, room_id);
          }
       });

       $(".number_of_rooms").on('change', function () {
          var check_out = $("#check_out").val();
          var check_in = $("#check_in").val();

          if(check_in != '' && check_out != ''){
             getAvaility(check_in, check_out, room_id);
          }
       });


    });



    function getAvaility(check_in, check_out, room_id) {
       $.ajax({
          url: "{{ route('check_room_availability') }}",
          data: {room_id:room_id, check_in:check_in, check_out:check_out},
          success: function(data){
             $(".available_room").html('Availability : <span class="text-success">'+data['available_room']+' Rooms</span>');
             $("#available_room").val(data['available_room']);
             price_calculate(data['total_nights']);
          }
       });
    }

    function price_calculate(total_nights){
       var room_price = $("#room_price").val();
       var discount_p = $("#discount_p").val();
       var select_room = $("#select_room").val();

       var sub_total = room_price * total_nights * parseInt(select_room);
       var discount_price = (parseInt(discount_p)/100)*sub_total;
       var grand_total = sub_total - discount_price;

       $(".t_subtotal").text("₱" + sub_total);
       $(".t_discount").text("₱" + discount_price);
       $(".t_g_total").text("₱" + grand_total);

    }

    $("#bk_form").on('submit', function () {
       var av_room = $("#available_room").val();
       var select_room = $("#select_room").val();
       if (parseInt(select_room) >  av_room){
          alert('The number of rooms exceeds availability.');
          return false;
       }
       var nmbr_person = $("#nmbr_person").val();
       var total_guest = $("#total_guest").val();
       if(parseInt(nmbr_person) > parseInt(total_guest)){
          alert('The number of guests exceeds the room capacity.');
          return false;
       }

    })
 </script>


@endsection