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
                        <h3 class="title">Booking History  </h3>

    

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Bkg No</th>
            <th scope="col">Bkg Date</th>
            <th scope="col">Customer</th>
            <th scope="col">Room</th>
            <th scope="col">Check In/Out</th>
            <th scope="col">Total Room</th>
            <th scope="col">Status</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($allData as $item) 
            <tr>
            <td> {{ $item->code }}</td>
            <td>{{ $item->created_at->format('Y/m/d') }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item['room']['type']['name'] }}</td>
            <td> <span class="badge bg-primary">{{ $item->check_in }}</span> - <span class="badge bg-warning text-dark">{{ $item->check_out }}</span> </td>
            <td>{{ $item->number_of_rooms }}</td>
            <td> 
                @if ($item->status == 1)
                <span class="badge bg-success">Booked</span>
                   @else
                   <span class="badge bg-info text-dark">Pending</span>
                @endif

            </td>
            </tr>
            @endforeach
            
        </tbody>
        </table>



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