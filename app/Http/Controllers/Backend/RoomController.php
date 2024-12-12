<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\RoomNumber;
use App\Models\RoomType;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function EditRoom($id){

        $basic_facility = Facility::where('rooms_id',$id)->get();
        $multiimgs = MultiImage::where('rooms_id',$id)->get();
        $editData = Room::find($id);
        $allroomNo = RoomNumber::where('rooms_id',$id)->get();
        return view('backend.allroom.rooms.edit_rooms',compact('editData','basic_facility','multiimgs','allroomNo'));
    } //End Method 


    public function UpdateRoom(Request $request, $id){

        $room  = Room::find($id);
        $room->total_adult = $request->total_adult;
        $room->total_child = $request->total_child;
        $room->price = $request->price;

        $room->size = $request->size;
        $room->view = $request->view;
        $room->bed_style = $request->bed_style;
        $room->discount = $request->discount;
        $room->short_desc = $request->short_desc;
        $room->description = $request->description; 
        $room->status = 1;
        /// Update Single Image 

        if($request->file('image')){

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(550,850)->save('upload/roomimg/'.$name_gen);
        $room['image'] = $name_gen; 
        }


            // Update Room Type Name
        if ($request->room_type_name) {
            $roomType = RoomType::find($room->roomtype_id);
            if ($roomType) {
                $roomType->name = $request->room_type_name;
                $roomType->save();
            }
        }

        
        $room->save();

        //// Update for Facility Table 

        if($request->facility_name == NULL){

            $notification = array(
                'message' => 'Error! There should be room amenities.',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);

        } else{
            Facility::where('rooms_id',$id)->delete();
            $facilities = Count($request->facility_name);
            for($i=0; $i < $facilities; $i++ ){
                $fcount = new Facility();
                $fcount->rooms_id = $room->id;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->save();
            } // end for
        } // end else 

        //// Update Multi Image 

        if($room->save()){
            $files = $request->multi_img;
            if(!empty($files)){
                $subimage = MultiImage::where('rooms_id',$id)->get()->toArray();
                MultiImage::where('rooms_id',$id)->delete();
 
            }
            if(!empty($files)){
                foreach($files as $file){
                    $imgName = date('YmdHi').$file->getClientOriginalName();
                    $file->move('upload/roomimg/multi_img/',$imgName);
                    $subimage['multi_img'] = $imgName;

                    $subimage = new MultiImage();
                    $subimage->rooms_id = $room->id;
                    $subimage->multi_img = $imgName;
                    $subimage->save();
                }

            }
        } // end if

        $notification = array(
            'message' => 'Room updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }//End Method 


    public function MultiImageDelete($id){

        $deletedata = MultiImage::where('id',$id)->first();

        if($deletedata){

            $imagePath = $deletedata->multi_img;

            // Check if the file exists before unlinking 
            if (file_exists($imagePath)) {
               unlink($imagePath);
               echo "Image unlinked successfully";
            }else{
                echo "Image does not exist";
            }

            //  Delete the record form database 

            MultiImage::where('id',$id)->delete();

        }

        $notification = array(
            'message' => 'Multi image deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }//End Method 

    public function StoreRoomNumber(Request $request,$id){

        $data = new RoomNumber();
        $data->rooms_id = $id;
        $data->room_type_id = $request->room_type_id;
        $data->room_no = $request->room_no;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Room number added successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }//End Method 



    public function EditRoomNumber($id){

        $editroomno = RoomNumber::find($id);
        return view('backend.allroom.rooms.edit_room_no',compact('editroomno'));

    }//End Method 

    public function UpdateRoomNumber(Request $request, $id)
    {
        // Find the room number by ID
        $data = RoomNumber::find($id);
    
        // Update the fields with new values from the request
        $data->room_no = $request->room_no;
        $data->status = $request->status;
        $data->save();
    
        // Retrieve the related Room ID (if applicable)
        $roomId = $data->rooms_id;  // Assuming room_id is available in the RoomNumber model
    
        // Set the notification for the successful update
        $notification = array(
            'message' => 'Room number updated successfully',
            'alert-type' => 'success'
        );
    
        // Redirect to the Edit Room page with the updated room ID
        return redirect()->route('edit.room', $roomId)->with($notification);
    }
    


    public function DeleteRoomNumber($id)
    {
        // Find the room number by ID
        $roomNumber = RoomNumber::find($id);
    
        // Retrieve the related room ID (if applicable)
        $roomId = $roomNumber->rooms_id;  // Assuming `room_id` exists in the RoomNumber model
    
        // Delete the room number
        $roomNumber->delete();
    
        // Set a success notification
        $notification = array(
            'message' => 'Room number deleted successfully',
            'alert-type' => 'success'
        );
    
        // Redirect to the Edit Room page with the related room ID
        return redirect()->route('edit.room', $roomId)->with($notification);
    }

    public function DeleteRoom(Request $request, $id){
        $room = Room::find($id);

        if (file_exists('upload/roomimg/'.$room->image) AND ! empty($room->image)) {
           @unlink('upload/roomimg/'.$room->image);
        }

        $subimage = MultiImage::where('rooms_id',$room->id)->get()->toArray();
        if (!empty($subimage)) {
            foreach ($subimage as $value) {
               if (!empty($value)) {
               @unlink('upload/roomimg/multi_img/'.$value['multi_img']);
               }
            }
        }

        RoomType::where('id',$room->roomtype_id)->delete();
        MultiImage::where('rooms_id',$room->id)->delete();
        Facility::where('rooms_id',$room->id)->delete();
        RoomNumber::where('rooms_id',$room->id)->delete();
        $room->delete();

        $notification = array(
            'message' => 'Room deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  

    }//End Method









}
 