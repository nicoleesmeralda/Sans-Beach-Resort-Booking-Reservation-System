@extends('frontend.main_master')
@section('main')


    <!-- Sign In Area -->
    <div class="sign-in-area pt-50 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color" style="font-weight: 700">SIGN IN</span>
                                <h2 style="font-weight: 700">Sign in to your account</h2>
                            </div>
                           
                           
                 <form method="POST" action="{{ route('login') }}">
                 @csrf

        <div class="row">
            <div class="col-lg-12 ">
                <div class="form-group">
                    <input type="text" name="login" id="login" class="form-control @error('login') is-invalid @enderror" required data-error="Please enter your username or email" placeholder="Email / Username / Phone">
                    @error('login')
                    <span class="text-danger" style="font-size: 15px"> {{ $message }} </span>  
                  @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                    
                </div>
            </div>

                                    
        
        <div class="col-lg-12 col-sm-12">
            <a class="forget" href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
    
                                    <div class="col-lg-12 col-md-12 text-center">
          <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                            SIGN IN
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <p class="account-desc">
                                            Not a member?
                                            <a href="{{ route('register') }}">Register here</a>
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
    <!-- Sign In Area End -->

@endsection