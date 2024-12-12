<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css"> 
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 14px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: #B56952;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: #B56952;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: #B56952; font-size: 25px;">San's Beach Resort<br>
            <span style="color: black; font-size: 14px; font-weight:normal"> San Diego, Lian, Batangas <br>
            +63 960 857 3745 | sansbeachresort@gmail.com </span></h2>
          <p style="text-align: left;" class="font"><b>INVOICE NO.</b> {{ $editData->code }} <br>
            <b>ISSUED DATE</b>: {{ $editData->check_in }} <br>
            <b>DUE DATE</b>: {{ $editData->check_out}} <br>
          </p>
          <p style="text-align: left;" class="font"><b>BILLED TO:</b> <br>
            {{ $editData->name }} <br>
            {{ $editData->address }} {{ $editData->city }} {{ $editData->zip_code }} <br>
            {{ $editData->phone }} <br>
            {{ $editData->email }} <br><br>
 

          </p>
        </td>
       
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5px 0 5px;" class="font">
     
    <thead class="table-light">
        <tr align="left">
            <th>Room Type</th>
            <th>Total Room</th>
            <th>Price per Room</th>
            <th>In / Out Date</th>
            <th>Total Nights</th>
            <th>Total Guests</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $editData->room->type->name }}</td>
            <td>{{ $editData->number_of_rooms }}</td>
            <td>P{{ $editData->actual_price }}</td>
            <td>
                <span class="badge bg-primary">{{ $editData->check_in }}</span>  -<br> 
                <span class="badge bg-warning text-dark">{{ $editData->check_out }}</span></td>
            <td>{{ $editData->total_night }}</td>
            <td>{{ $editData->persion }}</td>
            

        </tr>
    </tbody> 
              
  </table>

  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5px 0 5px;" class="font">
    <tr>
        <td><b>Subtotal</b></td>
        <td style="text-align: right;">P{{ $editData->subtotal }}</td>
    </tr>
    <tr>
        <td><b>Discount</b></td>
        <td style="text-align: right;">P{{ $editData->discount }}</td>
    </tr>
    <tr>
        <td><b>Total</b></td>
        <td style="text-align: right;">P{{ $editData->total_price }}</td>
    </tr>
</table>



   
 
  <table class="table test_table" style="float:right; border:none">
                        
 </table>


  <div class="font mt-3" align="center">
    <p><b>Thank you for your booking!</b></p>
  </div>

</body>
</html>