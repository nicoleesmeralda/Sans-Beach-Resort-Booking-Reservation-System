@extends('frontend.main_master')
@section('main')


<!-- Gallery Area -->
<div class="gallery-area pt-50 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color" style="font-weight: 700">GALLERY</span>
            <h2 style="font-weight: 700">Resort Gallery</h2>
        </div>
        <div class="tab gallery-tab">
            

            <div class="tab_content current active pt-45">
                <div class="tabs_item current">
                    <div class="gallery-tab-item">
                        <div class="gallery-view">
                            <div class="row">
                                
                @foreach ($gallery as $item) 
                <div class="col-lg-4 col-sm-6">
                    <div class="single-gallery">
                        <img src="{{ asset($item->photo_name) }}" alt="Images">
                        <a href="{{ asset($item->photo_name) }}" class="gallery-icon">
                            <i class='bx bx-plus'></i>
                        </a>
                    </div>
                </div> 
                @endforeach 


                            </div>
                        </div>
                    </div>
                </div>

              


            </div>
        </div>
    </div>
</div>
<!-- Gallery Area End -->
 

@endsection