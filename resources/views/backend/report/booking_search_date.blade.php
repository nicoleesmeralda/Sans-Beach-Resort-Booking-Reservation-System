@extends('admin.admin_dashboard')
@section('admin') 

<div class="page-content"> 
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item" style="font-size: 20px; font-weight: 500"><a href="{{ route('booking.report') }}">Booking Report</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" style="padding-right: 10px; font-size: 20px; font-weight: 500">All bookings from</li>

    

    <li class=" active" aria-current="page" style="font-size: 20px"> <span class="badge bg-primary">{{ date('d-m-Y', strtotime($startDate)) }}</span> <span style="font-weight: 500">to</span> <span class="badge bg-warning text-dark">{{ date('d-m-Y', strtotime($endDate)) }}</span>  </li>


                </ol>
            </nav>
        </div>
        
    </div>
    <!--end breadcrumb-->


    
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Bkg No</th>
                            <th>Name</th>
                            <th>In / Out Date</th>
                            <th>Payment Method </th>
                            <th>Total Amount </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($bookings as $key=> $item ) 
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><a href="{{ route('edit_booking',$item->id) }}"> {{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td> <span class="badge bg-primary">{{ date('d-m-Y', strtotime($item->check_in)) }}</span> -<br> <span class="badge bg-warning text-dark">{{ date('d-m-Y', strtotime($item->check_out)) }}</span> </td>
                            <td>{{ $item->payment_method }}</td>
                            <td>P{{ $item->total_price }}</td>
                            <td>
    <a href="{{ route('download.invoice',$item->id) }}" class="btn btn-warning px-3 radius-10"><i class="lni lni-download"></i> Download Invoice</a>

                            </td>
                        </tr>
                        @endforeach 
                      
                    </tbody>
                 
                </table>
            </div>
        </div>
    </div>
     
    <hr/>
     
</div>




@endsection