@extends('admin.admin_dashboard')
@section('admin') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

 <style>
    .form-check-label{
        text-transform: capitalize;
    }
 </style>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item" style="font-size: 20px; font-weight: 500"><a href="{{ route('all.roles.permission') }}">Permissions in Roles</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" style="padding-right: 10px; font-size: 20px; font-weight: 500">Edit Permission in Role</li>
            
            
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
                
       <form  class="row g-3" action="{{ route('admin.roles.update',$role->id) }}" method="post" enctype="multipart/form-data">
         @csrf

              
    
    <div class="col-md-6">
        <label for="input1" class="form-label">Role Name </label>
        <h3>{{ $role->name }}</h3>
         
    </div> 

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="CheckDefaultmain">
        <label class="form-check-label" for="CheckDefaultmain">All Permissions</label>
    </div>

    <hr>

        @foreach ($permission_groups as $group) 
        <div class="row"> 
            <div class="col-3">
     @php
      $permissions = App\Models\User::getpermissionByGroupName($group->group_name)
     @endphp

                <div class="form-check">
      
                    
      <label class="form-check-label" for="CheckDefault"> {{ $group->group_name }} </label>
                </div>

            </div>

            <div class="col-9">
   
            @foreach ($permissions as $permission) 
                <div class="form-check">
            <input class="form-check-input" type="checkbox" name="permission[]"  id="CheckDefault{{ $permission->id }}" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                    <label class="form-check-label" for="CheckDefault{{ $permission->id }}">{{ $permission->name }} </label>
                </div>
                @endforeach
                <br>
            </div>

        </div>
        @endforeach
        {{-- // end row --}}


 
                 
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


 <script>
    $('#CheckDefaultmain').click(function(){
        if ($(this).is(':checked')) {
           $('input[ type= checkbox]').prop('checked',true); 
        }else{
            $('input[ type= checkbox]').prop('checked',false); 
        }
    });
 </script>

@endsection