@extends('frontend.main_master')
@section('main')



    <!-- Sign Up Area -->
    <div class="sign-up-area pt-50 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color" style="font-weight: 700">SIGN UP</span>
                                <h2 style="font-weight: 700">Create an account</h2>
                            </div>

    <form method="POST" action="{{ route('register') }}">
      @csrf

        <div class="row">
            <div class="col-lg-12 ">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your Username" placeholder="Username">
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter email" placeholder="Email">
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" required data-error="Please enter email" placeholder="Password">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                </div>
            </div>

            <div class="col-lg-12 col-md-12 text-center">
                <button type="submit" class="default-btn btn-bg-three border-radius-5" style="font-weight: 700">
                    SIGN UP
                </button>
            </div>

            <div class="col-12">
                <p class="account-desc">
                    Already have an account? 
                    <a href="{{ route('login') }}">Sign in</a>
                </p>
            </div>
        </div>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up Area End -->



@endsection