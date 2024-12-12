@extends('admin.admin_dashboard')
@section('admin') 

<div class="page-content"> 
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    
                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px; font-weight: 500">Gallery</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.gallery') }}" class="btn btn-primary px-5">Add Image</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->


    
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
               
   <form action="{{ route('delete.gallery.multiple') }}" method="POST">
    @csrf
           
                <table  class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            
                            <th width="50px">Sl</th>
                            <th>Image</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($gallery as $key=> $item ) 
                        <tr> 
    
                            <td>{{ $key+1 }}</td>
                            <td> <img src="{{ asset($item->photo_name) }}" alt="" style="width:70px; height:40px;" > </td>
                          
                            <td>
    <a href="{{ route('edit.gallery',$item->id) }}" class="btn btn-warning px-3 radius-30"> Edit</a>
    <a href="{{ route('delete.gallery',$item->id) }}" class="btn btn-danger px-3 radius-30" id="delete"> Delete</a>

                            </td>
                        </tr>
                        @endforeach 
                      
                    </tbody>
                 
                </table>
       
            </form>     
            </div>
        </div>
    </div>
     
  
     
</div>




@endsection