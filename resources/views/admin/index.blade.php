@extends('admin.admin_dashboard')
@section('admin') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@php
  $bookings = App\Models\Booking::latest()->get();
  $pending = App\Models\Booking::where('status','0')->get();
  $complete = App\Models\Booking::where('status','1')->get();
  $totalPrice = App\Models\Booking::sum(DB::raw('total_night * number_of_rooms * actual_price - discount'));

  $today = Carbon\Carbon::now()->toDateString();
  $todayprice = App\Models\Booking::whereDate('created_at',$today)->sum('total_price');

  $allData = App\Models\Booking::orderBy('id','desc')->limit(10)->get();

@endphp

<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
       <div class="col">
         <div class="card radius-10 border-start border-0 border-4 border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Booking</p>
                        <h4 class="my-1 text-info" style="padding-bottom: 18px">{{ count($bookings) }}</h4>
                        
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bx-book'></i>
                    </div>
                </div>
            </div>
         </div>
       </div>
       <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-danger">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <p class="mb-0 text-secondary">Pending Booking</p>
                       <h4 class="my-1 text-danger" style="padding-bottom: 18px">{{ count($pending) }}</h4>
                       
                   </div>
                   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bx-book-bookmark'></i>
                   </div>
               </div>
           </div>
        </div>
      </div>
      <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-success">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <p class="mb-0 text-secondary">Complete Booking</p>
                       <h4 class="my-1 text-success" style="padding-bottom: 18px">{{ count($complete) }}</h4>
                       
                   </div>
                   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bx-check-square'></i>
                   </div>
               </div>
           </div>
        </div>
      </div>
      <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-warning">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <p class="mb-0 text-secondary">Total Sales</p>
                       <h4 class="my-1 text-warning">P{{ $totalPrice  }}</h4>
                       <p class="mb-0 font-13">Today's Sales:  ₱{{ $todayprice }}</p>
                      
                   </div>
                   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bx-wallet'></i>
                   </div>
               </div>
           </div>
        </div>
      </div> 
    </div><!--end row-->

    <div class="row">
       <div class="col-12 col-lg-12 d-flex">
          <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Sales Overview</h6>
                    </div>
                     
                </div>
            </div>
            
              <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
                 
               <canvas id="bookingChart"></canvas>
               
              </div>
          </div>
       </div>
       



    </div><!--end row-->

     <div class="card radius-10">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Recent Booking</h6>
                </div>
                
            </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>Sl</th>
                          <th>Bkg No</th>
                          <th>Bkg Date</th>
                          <th>Customer</th>
                          <th>Room Type</th>
                          <th>In/Out Date</th>
                          <th>Total Rooms</th>
                          <th>Total Guests</th> 
                      </tr>
                  </thead>
                  <tbody>
                     @foreach ($allData as $key=> $item ) 
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td> <a href="{{ route('edit_booking',$item->id) }}"> {{ $item->code }} </a></td>
                          <td> {{ $item->created_at->format('d/m/Y') }} </td>
                          <td> {{ $item['user']['name'] }} </td>
                          <td> {{ $item['room']['type']['name'] }} </td>
                          <td> <span class="badge bg-primary">{{ $item->check_in }}</span> - <span class="badge bg-warning text-dark">{{ $item->check_out }}</span> </td>
                          <td> {{ $item->number_of_rooms }} </td>
                          <td> {{ $item->persion }} </td>
                    
                           
                      </tr>
                      @endforeach 
                    
                  </tbody>
               
              </table>
          </div>
      </div>


        </div>
 
         
</div>


<script>
  var ctx = document.getElementById('bookingChart').getContext('2d');
  var bookings = @json($bookings);

  // Extract the required data from the bookings
  var labels = bookings.map(function(booking) {
      return booking.check_in; 
  });

  var data = bookings.map(function(booking) {
      return (booking.total_night * booking.number_of_rooms * booking.actual_price) - booking.discount;
  });

  var bookingChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: labels,
          datasets: [{
              label: 'Total Sales',
              data: data,
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>

@endsection