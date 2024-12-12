@extends('frontend.main_master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<!-- Checkout Area -->
<section class="checkout-area pt-50 pb-70">
    <div class="container">
        
        <form method="post" role="form" action="{{ route('checkout.store') }}" class="require-validation">
            @csrf

            <div class="row">
                <div class="col-lg-8">
                    <div class="billing-details" style="padding-bottom: 86px;">
                        <h3 class="title">Billing Details</h3>

                        <div class="row">

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>  Name <span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ \Auth::user()->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ \Auth::user()->email }}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ \Auth::user()->phone }}">
                                    @if ($errors->has('phone'))
                                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Country <span class="required">*</span></label>
                                    <input type="text" name="country" class="form-control">
                                    @if ($errors->has('country'))
                                        <div class="text-danger">{{ $errors->first('country') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="address" class="form-control" value="{{ \Auth::user()->address }}">
                                    @if ($errors->has('address'))
                                        <div class="text-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>City <span class="required">*</span></label>
                                    <input type="text" name="city" class="form-control">
                                    @if ($errors->has('city'))
                                        <div class="text-danger">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>ZIP Code <span class="required">*</span></label>
                                    <input type="text" name="zip_code" class="form-control">
                                    @if ($errors->has('zip_code'))
                                        <div class="text-danger">{{ $errors->first('zip_code') }}</div>
                                    @endif
                                </div>
                            </div>
                    
                    
                            {{-- <p>Session Value : {{ json_encode(session('book_date')) }}</p>   --}}  
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-4" >
                    <section class="checkout-area" >
                        <div class="card-body" >
                              <div class="billing-details" >
                                    <h3 class="title" >Booking Summary</h3>
                                    <hr>
      
    <div style="display: flex">
            <img style="height:100px; width:120px;object-fit: cover" src="{{ (!empty($room->image))? url('upload/roomimg/'.$room->image):url('upload/no_image.jpg') }}" alt="Images" alt="Images">
            <div style="padding-left: 10px;">
                <a href=" " style="font-size: 20px; color: #595959;font-weight: bold">{{ @$room->type->name }}</a>
                <p><b>₱{{ $room->price }} per night</b></p>
            </div>

    </div>
      
                                    <br>
      
    <table class="table" style="width: 100%">
        @php
      $subtotal = $room->price * $nights * $book_data['number_of_rooms']; 
      $discount =($room->discount/100)*$subtotal;  
        @endphp
            
            <tr>
                <td><p>Total Night <br> <b> ( {{ $book_data['check_in'] }} - {{ $book_data['check_out'] }})</b></p></td>
                <td style="text-align: right"><p> {{ $nights }} Nights</p></td>
            </tr>
            <tr>
                <td><p>Total Room</p></td>
                <td style="text-align: right"><p>{{ $book_data['number_of_rooms'] }}</p></td>
            </tr>
            <tr>
                <td><p>Subtotal</p></td>
                <td style="text-align: right"><p>₱{{ $subtotal }}</p></td>
            </tr>
            <tr>
                <td><p>Discount</p></td>
                <td style="text-align:right"> <p>₱{{ $discount }}</p></td>
            </tr>
            <tr>
                <td><p>Total</p></td>
                <td style="text-align:right"> <p>₱{{ $subtotal-$discount }}</p></td>
            </tr>
    </table>

                              </div>
                        </div>
                  </section>

                </div>


                <div class="col-lg-8 col-md-8">
                    <div class="payment-box">
                        <label style="margin-bottom: 10px">Please note that our payment method is <b>CASH ONLY</b>.</label>
                        <div class="payment-method">
                            <p>
                                <input type="radio" id="cash" name="payment_method" value="Cash">
                                <label for="cash">Cash</label>
                            </p>
                        </div>

                        <button type="submit" class="order-btn">Submit Booking</button>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout Area End --> 

<style>
    .hide{display:none}
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $(".pay_method").on('click', function () {
            var payment_method = $(this).val();
            if (payment_method == 'Cash') {
                $("#cod_pay").removeClass('d-none');
            }
        });
    });
    
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var pay_method = $('input[name="payment_method"]:checked').val();
            if (pay_method == undefined) {
                alert('Please select a payment method');
                return false;
            } else if (pay_method == 'Cash') {
                document.getElementById('myButton').disabled = true;
            }
        });
    });
    </script> 

@endsection