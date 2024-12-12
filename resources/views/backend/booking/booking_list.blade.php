@extends('admin.admin_dashboard')
@section('admin') 

<div class="page-content"> 
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px; font-weight: 500">Booking List</li>
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
                            <th>Bkg Date</th>
                            <th>Customer</th>
                            <th>Room</th>
                            <th>In/Out</th>
                            <th>Total Room</th>
                            <th>Total Guest</th>
                            <th>Payment</th>
                            <th>Bkg Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($allData as $key=> $item ) 
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td> <a href="{{ route('edit_booking',$item->id) }}"> {{ $item->code }} </a></td>
                            <td> {{ $item->created_at->format('Y/m/d') }} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item['room']['type']['name'] }} </td>
                            <td> <span class="badge bg-primary">{{ $item->check_in }}</span> -<br> <span class="badge bg-warning text-dark">{{ $item->check_out }}</span> </td>
                            <td> {{ $item->number_of_rooms }} </td>
                            <td> {{ $item->persion }} </td>
                            <td> @if ($item->payment_status == '1')
                                <span class="text-success">Complete</span>
                                @else
                                <span class="text-danger">Pending</span>
                                 @endif </td>
                            <td> @if ($item->status == '1')
                                <span class="text-success">Booked</span>
                                @else
                                <span class="text-danger">Pending</span>
                                 @endif </td>
                             
                            <td>
    <a href="{{ route('edit_booking',$item->id) }}" class="btn btn-warning px-3 radius-30"> View</a>
    <a href="{{ route('delete.booking',$item->id) }}" class="btn btn-danger px-3 radius-30" id="delete"> Delete</a>

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