@extends('admin.admin_dashboard')
@section('admin') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item" style="font-size: 20px; font-weight: 500"><a href="{{ route('room.type.list') }}">Room Types</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" style="padding-right: 10px; font-size: 20px; font-weight: 500">Edit Room Type</li>


                </ol>
            </nav>
        </div>
        
    </div>
			 
				<div class="container">
					<div class="main-body">
						<div class="row">




<div>
    <div class="card-body">
        
                    
               
        <div class="tab-content py-3">
            <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
              
                <div class="col-xl-12 mx-auto">
						
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-4">Edit Room Type </h5>

    <form class="row g-3" action="{{ route('update.room',$editData->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-md-4">
            <label for="input1" class="form-label">Room Type Name</label>
            <input type="text" name="room_type_name" class="form-control" id="input1" value="{{ $editData['type']['name'] }}" >
        </div>
        
        <div class="col-md-4">
            <label for="input2" class="form-label">Total Adult</label>
            <input type="text" name="total_adult" class="form-control" id="input2"  value="{{ $editData->total_adult }}">
        </div>

        <div class="col-md-4">
            <label for="input2" class="form-label">Total Child </label>
            <input type="text" name="total_child" class="form-control" id="input2" value="{{ $editData->total_child }}">
        </div>


        <div class="col-md-6">
            <label for="input3" class="form-label">Main Image </label>
            <input type="file" name="image" class="form-control" id="image"  >

            <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/roomimg/'.$editData->image) : url('upload/no_image.jpg') }}" alt="Admin" class="bg-primary" width="70" height="50"> 
        </div>




        <div class="col-md-6">
            <label for="input4" class="form-label">Gallery Image </label>
            <input type="file" name="multi_img[]" class="form-control" multiple id="multiImg" accept="image/jpeg, image/jpg, image/gif, image/png" >

            @foreach ($multiimgs as $item)

            <img src="{{ (!empty($item->multi_img)) ? url('upload/roomimg/multi_img/'.$item->multi_img) : url('upload/no_image.jpg') }}" alt="Admin" class="bg-primary" width="60"> 

              <a href="{{ route('multi.image.delete',$item->id) }}"><i class="lni lni-close"></i> </a>  

            @endforeach


            <div class="row" id="preview_img"></div>
        </div>


        <div class="col-md-4">
            <label for="input1" class="form-label">Room Price  </label>
            <input type="text" name="price" class="form-control" id="input1" value="{{ $editData->price }}" >
        </div>

        <div class="col-md-4">
            <label for="input2" class="form-label">Size </label>
            <input type="text" name="size" class="form-control" id="input2"  value="{{ $editData->size }}">
        </div>

        <div class="col-md-4">
            <label for="input2" class="form-label">Discount ( % )</label>
            <input type="text" name="discount" class="form-control" id="input2"  value="{{ $editData->discount }}">
        </div>

        

        <div class="col-md-6">
            <label for="input7" class="form-label">Room View </label>
            <select name="view" id="input7" class="form-select">
                <option selected="">Choose...</option>
                <option value="Sea View" {{ $editData->view == 'Sea View'?'selected':''}}>Sea View </option>
                <option value="Hill View" {{ $editData->view == 'Hill View'?'selected':''}}>Hill View </option>
               
            </select>
        </div>

        <div class="col-md-6">
            <label for="input7" class="form-label">Bed Style</label>
            <select name="bed_style" id="input7" class="form-select">
                <option selected="">Choose...</option>
                <option value="Queen Bed" {{ $editData->bed_style == 'Queen Bed'?'selected':''}}> Queen Bed </option>
                <option value="Twin Bed" {{ $editData->bed_style == 'Twin Bed'?'selected':''}}>Twin Bed </option>
                <option value="King Bed" {{ $editData->bed_style == 'King Bed'?'selected':''}}>King Bed </option>
            </select>
        </div>
  
        <div class="col-md-12">
            <label for="input11" class="form-label">Short Description </label>
            <textarea name="short_desc" class="form-control" id="input11" placeholder="Address ..." rows="3">{{ $editData->short_desc }}</textarea>
        </div>

        <div class="col-md-12">
            <label for="input11" class="form-label"> Main Description </label>
            <textarea name="description" class="form-control" id="myeditorinstance" >{!! $editData->description !!}</textarea>
        </div>




        <div class="col-md-12">
            <label for="facility_name" class="form-label">Room Amenities</label>
            <div id="facility_container">
                @forelse ($basic_facility as $item)
                <div class="row align-items-center mb-3 facility-row">
                    <div class="col-md-10">
                        <select name="facility_name[]" class="form-control facility-select">
                            <option value="">Select Facility</option>
                            <option value="Complimentary Breakfast" {{ $item->facility_name == 'Complimentary Breakfast' ? 'selected' : '' }}>Complimentary Breakfast</option>
                            <option value="32/42 inch LED TV" {{ $item->facility_name == '32/42 inch LED TV' ? 'selected' : '' }}>32/42 inch LED TV</option>
                            <option value="Smoke alarms" {{ $item->facility_name == 'Smoke alarms' ? 'selected' : '' }}>Smoke alarms</option>
                            <option value="Minibar" {{ $item->facility_name == 'Minibar' ? 'selected' : '' }}>Minibar</option>
                            <option value="Work Desk" {{ $item->facility_name == 'Work Desk' ? 'selected' : '' }}>Work Desk</option>
                            <option value="Safety box" {{ $item->facility_name == 'Safety box' ? 'selected' : '' }}>Safety box</option>
                            <option value="Rain Shower" {{ $item->facility_name == 'Rain Shower' ? 'selected' : '' }}>Rain Shower</option>
                            <option value="Slippers" {{ $item->facility_name == 'Slippers' ? 'selected' : '' }}>Slippers</option>
                            <option value="Hair dryer" {{ $item->facility_name == 'Hair dryer' ? 'selected' : '' }}>Hair dryer</option>
                            <option value="Laundry & Dry Cleaning" {{ $item->facility_name == 'Laundry & Dry Cleaning' ? 'selected' : '' }}>Laundry & Dry Cleaning</option>
                            <option value="Electronic door lock" {{ $item->facility_name == 'Electronic door lock' ? 'selected' : '' }}>Electronic door lock</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm remove-facility" style="padding-bottom: 7px; padding-left: 12px"><i class="lni lni-circle-minus"></i></button>
                    </div>
                </div>
                @empty
                <div class="row align-items-center mb-3 facility-row">
                    <div class="col-md-10">
                        <select name="facility_name[]" class="form-control facility-select">
                            <option value="">Select Facility</option>
                            <option value="Complimentary Breakfast">Complimentary Breakfast</option>
                            <option value="32/42 inch LED TV">32/42 inch LED TV</option>
                            <option value="Smoke alarms">Smoke alarms</option>
                            <option value="Minibar">Minibar</option>
                            <option value="Work Desk">Work Desk</option>
                            <option value="Safety box">Safety box</option>
                            <option value="Rain Shower">Rain Shower</option>
                            <option value="Slippers">Slippers</option>
                            <option value="Hair dryer">Hair dryer</option>
                            <option value="Laundry & Dry Cleaning">Laundry & Dry Cleaning</option>
                            <option value="Electronic door lock">Electronic door lock</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm remove-facility" style="padding-bottom: 7px; padding-left: 12px"><i class="lni lni-circle-minus"></i></button>
                    </div>
                </div>
                @endforelse
            </div>
            <button type="button" class="btn btn-success mt-1" id="add_facility_btn"><i class="lni lni-circle-plus" style="padding-bottom: 3px;"></i>Add Facility</button>
            <div style="padding-bottom: 30px"></div>
        </div>
                             <br>
           

 

 
        <div class="col-md-12">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" class="btn btn-primary px-3">Save Changes</button> 
            </div>
        </div>
    </form>
        </div>
    </div>

</div>


<!-- Added Room Number Section -->
<div class="card mt-4">
    <div class="card-body">
        <h5 class="mb-4">Room Numbers</h5>
        <a class="btn btn-primary float-right mb-3" onclick="addRoomNo()" id="addRoomNo">
            <i class="lni lni-circle-plus" style="padding-bottom: 3px;"></i> Add Room Number
        </a>
        <div class="roomnoHide" id="roomnoHide">
            <form action="{{ route('store.room.no',$editData->id) }}" method="post">
                @csrf
                <input type="hidden" name="room_type_id" value="{{ $editData->roomtype_id }}">
                <div class="row">
                    <div class="col-md-4">
                        <label for="input2" class="form-label">Room No</label>
                        <input type="text" name="room_no" class="form-control" id="input2">
                    </div>
                    <div class="col-md-4">
                        <label for="input7" class="form-label">Status</label>
                        <select name="status" id="input7" class="form-select">
                            <option selected="">Select Status...</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success" style="margin-top: 28px;">Save</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table mb-0 table-striped" id="roomview">
            <thead>
                <tr>
                    <th scope="col">Room Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allroomNo as $item)
                <tr>
                    <td>{{ $item->room_no }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('edit.roomno',$item->id) }}" class="btn btn-warning px-3 radius-30">Edit</a>
                        <a href="{{ route('delete.roomno',$item->id) }}" class="btn btn-danger px-3 radius-30" id="delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


            </div>
             {{-- // End primaryhome --}}

        </div>
    </div>
</div>





						 
 
						</div>
					</div>
				</div>
 </div>

 
        <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        </script>   
        
        
        <!--------===Show MultiImage ========------->
<script>
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
 </script>


<!--========== Start of add Basic Plan Facilities ==============-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery Library -->
<script>
    $(document).ready(function () {
        // Add new facility row
        $('#add_facility_btn').click(function () {
            let newFacility = `
                <div class="row align-items-center mb-3 facility-row">
                    <div class="col-md-10">
                        <select name="facility_name[]" class="form-control facility-select">
                            <option value="">Select Facility</option>
                            <option value="Complimentary Breakfast">Complimentary Breakfast</option>
                            <option value="32/42 inch LED TV">32/42 inch LED TV</option>
                            <option value="Smoke alarms">Smoke alarms</option>
                            <option value="Minibar">Minibar</option>
                            <option value="Work Desk">Work Desk</option>
                            <option value="Safety box">Safety box</option>
                            <option value="Rain Shower">Rain Shower</option>
                            <option value="Slippers">Slippers</option>
                            <option value="Hair dryer">Hair dryer</option>
                            <option value="Laundry & Dry Cleaning">Laundry & Dry Cleaning</option>
                            <option value="Electronic door lock">Electronic door lock</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm remove-facility" style="padding-bottom: 7px; padding-left: 12px"><i class="lni lni-circle-minus"></i></button>
                    </div>
                </div>`;
            $('#facility_container').append(newFacility);
        });

        // Remove facility row
        $(document).on('click', '.remove-facility', function () {
            $(this).closest('.facility-row').remove();
        });
    });
</script>
 <!--========== End of Basic Plan Facilities ==============-->

  <!--========== Start Room Number Add ==============-->
    <script>
        $('#roomnoHide').hide();
        $('#roomview').show();

        function addRoomNo(){
            $('#roomnoHide').show();
            $('#roomview').hide();
            $('#addRoomNo').hide();
        }

    </script>

   <!--========== End Room Number Add ==============-->


@endsection