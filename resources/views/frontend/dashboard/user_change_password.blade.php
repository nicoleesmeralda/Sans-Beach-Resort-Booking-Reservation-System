@extends('frontend.main_master')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



<!-- Service Details Area -->
<div class="service-details-area pt-50 pb-70">
    <div class="container">
        <div class="row">
             <div class="col-lg-3">

                @include('frontend.dashboard.user_menu')

            </div>


            <div class="col-lg-9">
                <div class="service-article">
                    

    <section class="checkout-area pb-70">
    <div class="container">
        <form action="{{ route('password.change.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="billing-details">
                        <h3 class="title">User Change Password  </h3>

                        <div class="row">
                           
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label> Old Password <span class="required">*</span></label>
                <input type="password" name="old_password"  class="form-control @error('old_password') is-invalid @enderror" id="old_password" >
                @error('old_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label> New Password <span class="required">*</span></label>
                <input type="password" name="new_password"  class="form-control @error('new_password') is-invalid @enderror" id="new_password" >
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>


        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label> Confirm New Password <span class="required">*</span></label>
                <input type="password" name="new_password_confirmation"  class="form-control" id="new_password_confirmation" >
                
            </div>
        </div>
 

<button type="submit" class="btn btn-danger">Save Changes </button>
</div>
</div>
</div>
</div>
</form>      
        
    </div>
</section>
                    
                </div>
            </div>

           
        </div>
    </div>
</div>
<!-- Service Details Area End -->

 


@endsection