@extends('admin.admin_dashboard')
@section('admin') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item" style="font-size: 20px; font-weight: 500"><a href="{{ route('all.permission') }}">All Permissions</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" style="padding-right: 10px; font-size: 20px; font-weight: 500">Edit Permission</li>
            
            
                            </ol>
                        </nav>
                    </div>
                    
                </div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
						 
    <div class="col-lg-12">
        
        <div class="card">

            <div class="card-body p-4">
                
       <form  class="row g-3" action="{{ route('update.permission') }}" method="post" enctype="multipart/form-data">
         @csrf

    <input type="hidden" name="id" value="{{ $permission->id }}"> 
    
    <div class="col-md-6">
        <label for="input1" class="form-label">Permission Name </label>
        <input type="text" name="name" class="form-control" value="{{ $permission->name }}"  >
         
    </div>

    <div class="col-md-6">
        <label for="input1" class="form-label">Permission Group </label>
        <select name="group_name" class="form-select mb-3" aria-label="Default select example">
            <option selected="">Select Group </option>
            <option value="Manage Room" {{ $permission->group_name == 'Manage Room' ? 'selected' : '' }}>Manage Room</option>
            <option value="Booking" {{ $permission->group_name == 'Booking' ? 'selected' : '' }}>Booking</option>
            <option value="Setting" {{ $permission->group_name == 'Setting' ? 'selected' : '' }}>Setting</option>
            <option value="Booking Report" {{ $permission->group_name == 'Booking Report' ? 'selected' : '' }}>Booking Report </option>
            <option value="Resort Gallery" {{ $permission->group_name == 'Hotel Gallery' ? 'selected' : '' }}>Resort Gallery </option>
            <option value="Contact Message" {{ $permission->group_name == 'Contact Message' ? 'selected' : '' }}>Contact Message </option>
            <option value="Role and Permission" {{ $permission->group_name == 'Role and Permission' ? 'selected' : '' }}>Role and Permission </option>
        </select>
         
    </div>
    
 
                 
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Save Changes </button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
						</div>
					</div>
				</div>
			</div>


            

@endsection