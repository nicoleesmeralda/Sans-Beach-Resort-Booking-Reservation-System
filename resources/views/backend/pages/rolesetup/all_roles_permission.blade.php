@extends('admin.admin_dashboard')
@section('admin') 

<div class="page-content"> 
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px; font-weight: 500">Permissions in Roles</li>
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
                            <th>Roles Name </th> 
                            <th>Permission </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($roles as $key=> $item ) 
                        <tr>
                            <td>{{ $key+1 }}</td> 
                            <td>{{ $item->name }}</td> 

                            <td>
                            @foreach ($item->permissions as $perm)
       <span class="badge bg-danger">{{ $perm->name  }}</span>                         
                            @endforeach    
                            </td> 



                            <td>
    <a href="{{ route('admin.edit.roles',$item->id) }}" class="btn btn-warning px-3 radius-30"> Edit</a>
    <a href="{{ route('admin.delete.roles',$item->id) }}" class="btn btn-danger px-3 radius-30" id="delete"> Delete</a>

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