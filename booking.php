<?php

include 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
   // header("Location: auth-login.php");
}

$BusID=1;

 $daten= date('m/d/Y H:i:s', time());
    
   $IST = new DateTime($daten, new DateTimeZone('UTC')); // change the timezone of the object without changing it's time
    $IST->setTimezone(new DateTimeZone('Asia/Dhaka')); // format the datetime 
   $S_date = $IST->format('d');
   
   
   $Q_data ="SELECT  COUNT(Student_ID) AS 'Total_user' ,SUM(Amount) as TotalDonation,latitude,longitude FROM `user_data` JOIN DonarTab,bus_location"; //`D_Day` =$S_date
    $result_nbr = $conn->query($Q_data);
    $DAtaCheck = mysqli_fetch_assoc($result_nbr);



$query = "SELECT * FROM time_schedule";
$query2 = "SELECT * FROM time_schedule_paid";
$Q_Donar= "SELECT * FROM `DonarTab` ORDER BY `DonarTab`.`Amount` DESC";


if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
    echo mysqli_error($con);
}
if (!$result2 = mysqli_query($conn, $query2)) {
    exit(mysqli_error($conn));
    echo mysqli_error($con);
}
if (!$result3 = mysqli_query($conn, $Q_Donar)) {
    exit(mysqli_error($conn));
    echo mysqli_error($con);
}




 $users = '';
if (mysqli_num_rows($result) > 0) {
    $number = 1;

    while ($row = mysqli_fetch_assoc($result)) {  

/*     
  $daten= date('m/d/Y H:i:s', $row['TimeStemp']);
    
   $IST = new DateTime($daten, new DateTimeZone('UTC')); // change the timezone of the object without changing it's time
    $IST->setTimezone(new DateTimeZone('Asia/Dhaka')); // format the datetime  */
   // echo $IST->format('Y-m-d h:i:s a T');
    
$BookedData= $row['Booked'] ;

  $obj = $row['BookedJson'] ;
  
  

$BookedJson[$number] = json_decode($obj, true); 



$RemainPer =100-((50- $row['Booked'])*2);


if($RemainPer>=90){
$P_Type = "bg-danger";
$Bdg_Type="badge-danger";
$bfh_tx="High";
} else if($RemainPer>=70){
    $P_Type = "bg-orange";
    $bfh_tx="High";
    $Bdg_Type="badge-danger";
} else if($RemainPer>=50){
    $P_Type = "bg-purple";
    $Bdg_Type="badge-info";
    $bfh_tx="Average";
} else if($RemainPer>=30){
    $P_Type = "bg-cyan";
    $Bdg_Type="badge-info";
    $bfh_tx="Low";
} else if($RemainPer>=0){
    $P_Type = "bg-success";
    $Bdg_Type="badge-success";
    $bfh_tx="Low";
}






$RemainPer .= "%";
      $users .= '
      
                                                                                    
                     <tr>  
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                              id="checkbox-'.$number.'">
                            <label for="checkbox-'.$number.'" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td>'."# ".$number.'</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0 m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-'.rand(1,3).'.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-'.rand(4,6).'.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-'.rand(7,10).'.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">'."+".$BookedData.'</span></li>
                          </ul>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">'.$RemainPer.'</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar '.$P_Type.'" data-width='.$RemainPer.'></div>
                          </div>
                        </td>
                        <td>'.$row['Time'].'</td>
                        <td>'.$row['Location'].'</td>
                        <td>
                          <div class="badge '.$Bdg_Type.'">'.$bfh_tx.'</div>
                        </td>
                      
                              <td data-seat="'.htmlentities( $obj , ENT_QUOTES, "UTF-8").'"><button type="button" class="btn btn-outline-primary editbtn" > Book Now </button></td>
                      </tr>
                                 

      
      ';


        
        
        $number++;
    }
  
  
  //print_r(json_encode($BookedJson));
  
  
}







$number2=1;
 $users2 = '';
if (mysqli_num_rows($result2) > 0) {
    $number = 1;

    while ($row = mysqli_fetch_assoc($result2)) {  

    
  /* $daten= date('m/d/Y H:i:s', $row['TimeStemp']);
    
   $IST = new DateTime($daten, new DateTimeZone('UTC')); // change the timezone of the object without changing it's time
    $IST->setTimezone(new DateTimeZone('Asia/Dhaka')); // format the datetime  */
   // echo $IST->format('Y-m-d h:i:s a T');
    
$BookedData= $row['Booked'] ;

  $obj = $row['BookedJson'] ;
  
  

//$BookedJson2[$number2] = json_decode($obj, true); 


 //print_r($obj);
$RemainPer =100-((50- $row['Booked'])*2);


if($RemainPer>=90){
$P_Type = "bg-danger";
$Bdg_Type="badge-danger";
$bfh_tx="High";
} else if($RemainPer>=70){
    $P_Type = "bg-orange";
    $bfh_tx="High";
    $Bdg_Type="badge-danger";
} else if($RemainPer>=50){
    $P_Type = "bg-purple";
    $Bdg_Type="badge-info";
    $bfh_tx="Average";
} else if($RemainPer>=30){
    $P_Type = "bg-cyan";
    $Bdg_Type="badge-info";
    $bfh_tx="Low";
} else if($RemainPer>=0){
    $P_Type = "bg-success";
    $Bdg_Type="badge-success";
    $bfh_tx="Low";
}






$RemainPer .= "%";
      $users2 .= '
      
                                                                                    
                     <tr>  
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                              id="checkbox-'.$number2.'">
                            <label for="checkbox-'.$number2.'" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td>'."# ".$number2.'</td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-'.rand(1,3).'.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Wildan Ahdian"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-'.rand(4,6).'.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="John Deo"></li>
                            <li class="team-member team-member-sm"><img class="rounded-circle"
                                src="assets/img/users/user-'.rand(7,10).'.png" alt="user" data-toggle="tooltip" title=""
                                data-original-title="Sarah Smith"></li>
                            <li class="avatar avatar-sm"><span class="badge badge-primary">'."+".$BookedData.'</span></li>
                          </ul>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">'.$RemainPer.'</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar '.$P_Type.'" data-width='.$RemainPer.'></div>
                          </div>
                        </td>
                        <td>'.$row['Time'].'</td>
                        <td>'.$row['Location'].'</td>
                        <td>
                          <div class="badge '.$Bdg_Type.'">'.$bfh_tx.'</div>
                        </td>
                      
                              <td data-seat="'.htmlentities( $obj , ENT_QUOTES, "UTF-8").'"><button type="button" class="btn btn-outline-primary editbtn"> Book Now </button></td>
                      </tr>
                                 

      
      ';


        
        
        $number2++;
    }
  
}


// OLD data


 // $Data_L0 .= $Data_L0;
  
  
//echo $Data_L0;





$number3=1;
 $DonarTab= '';
if (mysqli_num_rows($result3) > 0) {
    $number = 1;

    while ($row = mysqli_fetch_assoc($result3)) {  
        
        $DonarTab .= '
                     <tr>
                          <td>'.$number3.'</td>
                          <td>'.$row['Donar_Name'] .' </td>
                          <td>'.$row['Date'] .'</td>
                          <td>'.$row['Payment_Method'] .'</td>
                          <td>'.$row['Amount'] . " TK".'</td>
                        </tr>';
        
        
        
        $number3++;
    }
}











?>




<!DOCTYPE html>
<html lang="en">


<!-- index.php  21 Nov 2019 03:44:50 GMT -->
<head>

    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">



  <meta charset="UTF-8">

 <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"> 
  <title>Shah X Connect</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/bus.css">

  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    
        <script type = "text/JavaScript">
         <!--
            function AutoRefresh( t ) {
            //   setTimeout("location.reload(true);", t);

            //  setTimeout("alert('OK');  AutoRefresh(1000);", t);
             // <?php echo "OK";?>
              //AutoRefresh(1000);
             
            }
         //-->
      </script>



    
    
</head>

<body onload = "JavaScript:AutoRefresh(1000);">










           <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog"  style="max-width: 80%; role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <!-- Shah X Connect Change The Future --> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

  







<div class="modal-content-not-use">
    <div class="modal-header">
        <h4 class="modal-title" id="H1"> Choose your seat(s)</h4>
    </div>
    <div class="modal-body row">
        <div class="col-md-6">
            <p style="margin:0 auto;text-align: left;"> Hold the cursor on seats for seat numbers, click to select or deselect. </p>
            <input type="hidden" name="update_id" id="update_id">
            <div class="seat_layout clearfix " style="width:180px;">
                <!--                        <div class="stearing"></div>-->
                <div style="width:200px;float: right;height:20px;">
                    <div class="driver-steering " title="DRIVER" data-toggle="tooltip" data-placement="bottom">
                    </div>
                </div>
                
                
                
                
                
                <?php
                
              //  $cookie_name
             //    $php_var = $_SESSION['jsval'] ; //$_COOKIE['js_val'];
$php_var = 1;

 //echo $php_var;





$Data_L0= '';




// $str = '{ "A1":0,    "A2":0,    "A3":0,    "A4":1,    "B1":1,    "B2":1,    "B3":0,    "B4":0,    "C1":0,    "C2":0,    "C3":0,    "C4":0,    "D1":0,    "D2":0,    "D3":0,    "D4":0,    "E1":0,    "E2":0,    "E3":0,    "E4":0,    "F1":0,    "F2":0,    "F3":0,    "F4":0,    "G1":0,    "G2":1,    "G3":0,    "G4":0,    "H1":0,    "H2":1,    "H3":1,    "H4":0,    "I1":0,    "I2":0,    "I3":0,    "I4":0,    "J1":0,    "J2":0,    "J3":0,    "J4":1,    "J5":1 }';


//print_r($obj);

 //$BookedJson=json_decode($str, true); 
     
      $Data_L0='<ul style="width:30px; float:right;" class="list-inline">';
for ($x = 5; $x >= 1; $x--) {
    
   
    $SitRow=1;
    
        foreach (range('A', 'J') as $alphabet) {
            
            $Sit = $alphabet.$x;
            
            
/* 
		echo '<script type="text/javascript">console.log('
          . str_replace('<', '\\x3C', json_encode($BookedJson[$php_var][$Sit]))
          . ');</script>'; */

            
          
          
            if($BookedJson[$php_var][$Sit]==0 ){
                
                if($x !=  3 || $Sit=='J3'){

                    
            
                $Data_L0 .= '        <li data-seat="{&quot;ticket_id&quot;:418020261,&quot;trip_id&quot;:8426756,&quot;company_id&quot;:109,&quot;seat_number&quot;:&quot;'.$Sit.'&quot;,&quot;seat_column&quot;:'.$x.',&quot;seat_row&quot;:'.$SitRow.',&quot;seat_floor&quot;:0,&quot;ticket_type&quot;:1,&quot;ticket_status&quot;:1,&quot;seat_type_id&quot;:1,&quot;fare_type_id&quot;:1,&quot;is_selected_for_booking&quot;:0,&quot;counter_id&quot;:null,&quot;fare_type_name&quot;:&quot;Economy&quot;,&quot;seatAvailable&quot;: '.$BookedJson[$php_var][$Sit].'}">
                        <a href="javascript:void(0)" class="seat" title="['.$Sit.']" data-toggle="tooltip" data-placement="bottom" onclick="chooseSeat(this)" data-original-title="['.$Sit.']">0-'.$x.'-'.$SitRow.' <div class="spinner">
                                <div class="double-bounce1">
                                </div>
                                <div class="double-bounce2">
                                </div>
                            </div>
                        </a>
                    </li>
            ';
                } else {
                    
                       $Data_L0 .= '<li data-seat="{&quot;ticket_id&quot;:418020261,&quot;trip_id&quot;:8426756,&quot;company_id&quot;:109,&quot;seat_number&quot;:&quot;'.$Sit.'&quot;,&quot;seat_column&quot;:'.$x.',&quot;seat_row&quot;:'.$SitRow.',&quot;seat_floor&quot;:0,&quot;ticket_type&quot;:1,&quot;ticket_status&quot;:1,&quot;seat_type_id&quot;:1,&quot;fare_type_id&quot;:1,&quot;is_selected_for_booking&quot;: '.!$BookedJson[$php_var][$Sit].',&quot;counter_id&quot;:null,&quot;fare_type_name&quot;:&quot;Economy&quot;,&quot;seatAvailable&quot;: '.$BookedJson[$php_var][$Sit].'}">
                                                                                    </li>   ';
                    
                    
                }
            
            $SitRow++;
          
            } else if($BookedJson[$php_var][$Sit]==1 ) {
                  if($x !=  3 || $Sit=='J3'){
              $Data_L0 .=   ' <li data-seat="{&quot;ticket_id&quot;:415378166,&quot;trip_id&quot;:8373521,&quot;company_id&quot;:120,&quot;seat_number&quot;:&quot;'.$Sit.'&quot;,&quot;seat_column&quot;:'.$x.',&quot;seat_row&quot;:'.$SitRow.',&quot;seat_floor&quot;:0,&quot;ticket_type&quot;:1,&quot;ticket_status&quot;:2,&quot;seat_type_id&quot;:1,&quot;fare_type_id&quot;:1,&quot;is_selected_for_booking&quot;:1,&quot;counter_id&quot;:null,&quot;fare_type_name&quot;:&quot;Economy&quot;,&quot;seatAvailable&quot;: '.$BookedJson[$php_var][$Sit].'}">
                                                                                                                                                                                                        <a href="javascript:void(0)" class="booked seat" title="['.$Sit.']" data-toggle="tooltip" data-placement="bottom">0-'.$x.'-'.$SitRow.'</a>
                                                    
                                                                                                                                    </li>';
                
                 $SitRow++;
                 
            } else {
                
                     $Data_L0 .= '<li data-seat="{&quot;ticket_id&quot;:418020261,&quot;trip_id&quot;:8426756,&quot;company_id&quot;:109,&quot;seat_number&quot;:&quot;'.$Sit.'&quot;,&quot;seat_column&quot;:'.$x.',&quot;seat_row&quot;:'.$SitRow.',&quot;seat_floor&quot;:0,&quot;ticket_type&quot;:1,&quot;ticket_status&quot;:1,&quot;seat_type_id&quot;:1,&quot;fare_type_id&quot;:1,&quot;is_selected_for_booking&quot;: '.!$BookedJson[$php_var][$Sit].',&quot;counter_id&quot;:null,&quot;fare_type_name&quot;:&quot;Economy&quot;,&quot;seatAvailable&quot;: '.$BookedJson[$php_var][$Sit].'}">
                                                                                    </li>   ';
                    
                
                 $SitRow++;
            }
            }
            
            
            
        }  
      $Data_L0 .='   </ul>';
      if($x!=1)
         $Data_L0 .='<ul style="width:30px; float:right;" class="list-inline">';
}   
                
                
                
                
                
                
                
                
                
                
                
                
                
                echo $Data_L0;
                
                
                
                ?>
                
                
                
                
                
                
                
                
                

            </div>
            <div class="clearfix"></div>
            <!--<p id="seatError" class="hidden">Sorry! this ticket is not available now.</p>-->
        </div>
        <div id="Div3" class="col-md-6">
            <div class="row seat_icons_mobile">
                <div class="col-sm-4" style="padding-right:0;">
                    <ul id="Ul71" class="list-inline clearfix">
                        <li class="seat-white">
                        </li>
                        <li class="legend-label"> Available Seats</li>
                    </ul>
                </div>
                <div class="col-sm-4" style="padding-right:0;">
                    <ul id="Ul72" class="list-inline clearfix">
                        <li class="seat-gray">
                        </li>
                        <li class="legend-label"> Booked Seats </li>
                    </ul>
                </div>
                <div class="col-sm-4" style="padding-right:0;">
                    <ul id="Ul73" class="list-inline clearfix">
                        <li class="seat-green">
                        </li>
                        <li class="legend-label"> Selected Seats</li>
                    </ul>
                </div>
            </div>
            <div id="Div4" class="clearfix">
                <div id="tbl_price_details">
                    <table class="table-responsive">
                        <thead>
                            <tr>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <div class="t_data">
                                        <table id="tbl_seat_list">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="tickets_total" class="t_total">
                    <p><b>Total: 0</b>
                    </p>
                    <p>
                    </p>
                </div>
                <form id="confirmbooking" method="post" action="/booking/bus/confirm">
                    <div class="form-group">
                        <label for="bpt">Choose Boarding Point <span>*</span></label>
                        <select id="boardingpoint" name="boardingpoint" class="form-control">
                            <option value="0"> -- Boarding points -- </option>
                            <option value="105949442"> Abdullahpur Bus Point (10:00 PM) </option>
                             <option value="105949443"> Arambag Bus Point (11:30 PM) </option>
                              <option value="105949444"> Gabtoli AC Counter (11:40 PM) </option>
                              <option value="105949444"> Sayedabad Bus Point (11:50 PM) </option>
                              
                        </select>
                        <p id="errormsg" class="hidden"> Choose</p>
                    </div>
                    <a href="javascript:void(0)" onclick="submitConfirm(this)" class="btn btn-default btn-sm continue-btn" style="margin-top:20px;">Continue</a>
                    <input type="hidden" id="searchid" name="searchid">
                    <button type="button" class="close" data-dismiss="modal" style="margin-top:27px;"><span aria-hidden="true" style="font-size:14px; color:#089D49; font-weight:normal; ">Close</span></button>
                    <div class=" text-danger route-search-error text-center" style="font-size:14px;color: #757A7E; display: flex;background: #F3F8F5;border-radius: 3px;padding-left: 0px;margin-top:15px">
                        <div style="width: 45.66px;height: 40px;background: #D9E9DE;border-radius: 3px 0px 0px 3px;padding-top: 10px">
                            <img src="https://www.shohoz.com/svg/info.svg" alt="journey svg">
                        </div>
                     
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
</form>
</div>
</div>
</div>







        <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>














  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-2">
      
   
  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
         
            
            
               
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Book Your Ticket</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th class="text-center">
                          <div class="custom-checkbox custom-checkbox-table custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                              class="custom-control-input" id="checkbox-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div>
                        </th>
                        <th>#SL</th>
                        <th>Booked</th>
                        <th>Sit Remain</th>
                        <th>Booking Time</th>
                        <th>Destination</th>
                        <th>Priority</th>
                        <th>Action</th>
                      </tr>
                      


                          
                           <?php if($users!='')echo $users ;?> 
                          
                          
                        
                          
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
          
          
          
          
          
          
          
         
        
        </section>
        




    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
    
    <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>  
    









                                            
      
<script type="text/javascript">


function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

var SitBooked = 0; 

        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');
                

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
               // console.log(data);
                var JSvalue = data[1].replace("# ", ""); 

                $('#update_id').val(JSvalue);
               // document.cookie = "js_val = " + data[1].replace("# ", ""); 
                sessionStorage.setItem("jsval", JSvalue);
               
        console.log( sessionStorage.getItem("jsval"));
         
           /*      $('#update_id').val(data[1].replace("# ", ""));
                $('#fname').val(data[2]);
                $('#lname').val(data[3]);
                $('#course').val(data[4]);
                $('#contact').val(data[5]); */
            });
        });



    $(document).ready(function() {
        $('.btnClose').on('click', function () {
            releaseAllSeats($(this).closest('.trseats'));
            // $(this).closest('table').find('td').css('border-bottom', '15px solid #F7F7F7');
            // $('.list_rows table td.border-fix-seat').css('border-bottom', '15px solid #F7F7F7');
        });
        $(window).on('unload', function(){
            releaseAllSeats();app/views/www/search-bus-trips-seats.blade.php
        });
        let el = document.querySelector('.view_seat_bg');
        let  parentScrollPosition = el.getAttribute('data-tripId');
        $(`#trip${parentScrollPosition}`)[0].scrollIntoView();

    });
    function toTitleCase(str)
    {
        return str.replace(/\b\w/g, function (txt) { return txt.toUpperCase(); });
    }






    function submitConfirm(objContBtn)
    {
     alert("Sit Confirmed");
        var allOkay = true;
        var is_eid_ticket = '0';
        $('#errormsg').addClass('hidden');
        $('#errormsg2').addClass('hidden');
        if ($('#tbl_price_details').find('table#tbl_seat_list').find('tbody:eq(0)').find('tr').length < 1) {
            $('#errormsg').text('Please choose your seat before you continue.').removeClass('hidden');
            allOkay = false;
        } else if ($('#boardingpoint').val() < 1) {
            $('#errormsg').text('Please choose a boarding point').removeClass('hidden');
            allOkay = false;
        } else if (is_eid_ticket == 1 && $('#dropingpoint').val() < 1) {
            $('#errormsg2').text('Please choose a droping point').removeClass('hidden');
            allOkay = false;
        } else if (showReturn == 1 && $('#tbl_price_details').find('table#tbl_seat_list').find('tbody:eq(0)').find('tr').length < maxTickets) {
            $('#errormsg').text('You need to select ' + maxTickets + ' seats.').removeClass('hidden');
            allOkay = false;
        }

        if (allOkay) {
            $(window).off('unload');
            $('#searchid').val($('#www-search-id').val());

            // Start of CleverTap Integration
            // Event: [B] Journey Seats Selected, [B] Return Seats Selected
            var $contObj = $(objContBtn);
            var tripData = $contObj.closest('tr.trip-row-amenities').prev().data('trip');

            //console.log($('#tbl_price_details').find('table#tbl_seat_list').find('tbody:eq(0)').find('tr').length); return;
            // var journeyDate = $.datepicker.formatDate('d-M-yy', new Date(tripData.tripRoute.departure_date));
            var noOfSeats = $('#tbl_price_details').find('table#tbl_seat_list').find('tbody:eq(0)').find('tr').length;
            // var returnDate = $.datepicker.formatDate('d-M-yy', new Date($('#dor').val()));
            var bp = $("#boardingpoint option:selected").text();
            var bpName = bp.split(" (");
            var fareString = $('#tickets_total').find('p').find('b').text();
            var fare = fareString.split(": ");

            var cleverTapData = {
                'Origin': toTitleCase(tripData.details.origin_city_name),
                'Destination': toTitleCase(tripData.details.destination_city_name),
                // 'Journey Date': new Date($('div.oneway p#search_list_title').text().match(/(\d{2}\-\w*,\s\d{4}$)/g)[0]),
                'Event Source': 'Web'
            };

            // check if with return tickets or not 
            let isWithReturn;
            if(document.querySelector('.with_return')){
                isWithReturn  = document.querySelector('.with_return').dataset.withReturn==="yes";
            }
            if (isWithReturn) {
                var now = new Date();
                cleverTapData['Return Date'] = new Date($('#return-date').text()+ ' ' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds());
            }
            
            let activeBar  =  document.querySelector('.details');
            let isDeparture = activeBar.dataset.hedaer==="departure";

            if (isDeparture) {
                cleverTapData['Journey Date'] = new Date(tripData.tripRoute.departure_date + ' ' + tripData.tripRoute.departure_time);

                cleverTapData['Journey Operator Name'] = tripData.operator.company_name;
                cleverTapData['Journey Operator ID'] = tripData.operator.company_id;
                // cleverTapData['Journey Trip Time'] = tripData.tripRoute.departure_time;
                cleverTapData['Journey Trip No'] = tripData.details.trip_number;
                cleverTapData['Journey Seats Available'] = tripData.details.available_seats;
                cleverTapData['Journey No of Seats'] = noOfSeats;
                cleverTapData['Journey Boarding Point'] = bpName[0];
                cleverTapData['Journey Ticket Fare'] = fare[1];
            } else {
                tempCleverTapData = JSON.parse(localStorage.getItem('tempCleverTapData'));

                // if (new Date() < tempCleverTapData.exp) {
                    cleverTapData['Journey Date'] = tempCleverTapData.journeyDate;
                // }

                localStorage.removeItem('tempCleverTapData');

                cleverTapData['Return Date'] = new Date(tripData.tripRoute.departure_date + ' ' + tripData.tripRoute.departure_time);
                cleverTapData['Return Operator Name'] = tripData.operator.company_name;
                cleverTapData['Return Operator ID'] = tripData.operator.company_id;
                // cleverTapData['Return Trip Time'] = tripData.tripRoute.departure_time;
                cleverTapData['Return Trip No'] = tripData.details.trip_number;
                cleverTapData['Return Seats Available'] = tripData.details.available_seats;
                cleverTapData['Return No of Seats'] = noOfSeats;
                cleverTapData['Return Boarding Point'] = bpName[0];
                cleverTapData['Return Ticket Fare'] = fare[1];
            }

            if ($('#dropingpoint').val() > 0) {
                var dp = $("#dropingpoint option:selected").text();
                var dpName = dp.split(" (");

                cleverTapData['Dropping Point'] = dpName[0];
            }

            if (isDeparture) {
                clevertap.event.push('[B] Journey Seats Selected', cleverTapData);
            } else {
                clevertap.event.push('[B] Return Seats Selected', cleverTapData);
            }
            // End of CleverTap Integration

            //Track Facebook Event - InitiateCheckout
            var totalTixPrice = $('#tickets_total').find('p').find('b').text();
            //alert(totalTixPrice.substr(7));
            fbq('track', 'InitiateCheckout', {
                value: totalTixPrice.substr(7),
                currency: 'BDT',
                num_items: $('#tbl_price_details').find('table#tbl_seat_list').find('tbody:eq(0)').find('tr').length
            });

            /* var r = confirm("Due to current traffic conditions, the trip may get cancelled. Are you sure you want to proceed?");
            if (r == false) {
                return false;
            } */
            //////////////////////
            $('form#confirmbooking').submit();
        }
    }
    
    
    
    
    function chooseSeat(seatObj)
    {






        //debugger
        $('#seatError').addClass('hidden');
        var $seatObj = $(seatObj);
        if($seatObj.hasClass("request_pending")) {
            return;
        } else {
            $seatObj.addClass("request_pending");
            $('.continue-btn').addClass("continue-btn-disabled");
        }
        var $seatTableBody = $('#tbl_price_details').find('table#tbl_seat_list').find('tbody:eq(0)');
        var sData = $seatObj.parent().data('seat');
        var tripData = $seatObj.closest('tr.trip-row-amenities').prev().data('trip');
        var discountAmount = 0;


//$seatObj.getClassName  sData.seat_number

//alert("Message :" + SitBooked);

console.log(sData.seat_number);

if ($seatObj.hasClass('selected')) {
            //un select a seat
            $seatObj.removeClass("request_pending");
              $seatObj.removeClass('selected');
              if(SitBooked==0){
                SitBooked=0;
              } else  SitBooked--;
         
$('div#tickets_total').html('<p><b>Total: ' + SitBooked + '</b></p>');
                    
           
                    

} else {
if(SitBooked<4){
SitBooked++;

const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
         // document.getElementById("table-data").innerHTML = this.responseText;
        }
        xhttp.open("GET", "busbooksit.php?Query=booked&Type="+sData.seat_number);
        xhttp.send();



$seatObj.addClass('selected');
 $seatObj.removeClass("request_pending");
 $('div#tickets_total').html('<p><b>Total: ' + SitBooked + '</b></p>');

       

} else {

$seatObj.removeClass("request_pending");
alert("Warning! You Cant booked More than 4 Sit " );


}
 

}

/*
        if ($seatObj.hasClass('selected')) {
            //un select a seat
            $seatObj.removeClass('selected');
            //alert('#' + sData.ticket_id);
            $('#' + sData.ticket_id).remove();
            $.ajax({
                url: '/booking/bus/seat/release',
                type: 'POST',
                data: {"ticketid":sData.ticket_id,
                    "routeid":tripData.tripRoute.trip_route_id,
                    "searchid":$('#www-search-id').val()}
            }).done(function(data) {
                $seatObj.removeClass("request_pending");
                $('.continue-btn').removeClass("continue-btn-disabled");
            });

            var ticketPrice = 0;
            var discountValue = 0;
            var discountType = 1;

            switch (parseInt(sData.fare_type_id)) {
                case 1:
                    ticketPrice = tripData.tripRoute.economy_class_fare;
                    if (discountType == 1){
                        discountAmount = Math.floor((ticketPrice / 100) * discountValue)
                    } else {
                        discountAmount = discountValue;
                    }
                    break;
                case 2:
                    ticketPrice = tripData.tripRoute.business_class_fare;
                    discountAmount = 0;
                    if (discountType == 1){
                        discountAmount = Math.floor((ticketPrice / 100) * discountValue)
                    } else {
                        discountAmount = discountValue;
                    }

                    break;
                case 3:
                    ticketPrice = tripData.tripRoute.special_class_fare;
                    discountAmount = 0;
                    if (discountType == 1){
                        discountAmount = Math.floor((ticketPrice / 100) * discountValue)
                    } else {
                        discountAmount = discountValue;
                    }
                    break;
            }

            doTicketsTotal(discountAmount);

        } else {

            if (searchtocity == 'kolkata' && companyId == soudiaOperatorID)
            {
                maxTickets = maxSoudiaKolTix;
            }
            // if (companyId == emadOperatorId)
            // {
            //     maxTickets = maxEmadTix;
            // }
            if ($seatTableBody.find('tr').length < maxTickets) {
                //select a seat
                var ticketPrice = 0;
                var discountTicketPrice = 0;
                var ticketPriceString = '';
                var discountValue = 0;
                var discountType = 1;
                switch (parseInt(sData.fare_type_id)) {
                    case 1:
                        ticketPrice = tripData.tripRoute.economy_class_fare;
                        if (discountType == 1){
                            discountAmount = Math.floor((ticketPrice / 100) * discountValue)
                        } else {
                            discountAmount = discountValue;
                        }
                        discountTicketPrice = tripData.tripRoute.economy_class_fare - discountAmount;
                        break;
                    case 2:
                        ticketPrice = tripData.tripRoute.business_class_fare;
                        discountAmount = 0;
                        if (discountType == 1){
                            discountAmount = Math.floor((ticketPrice / 100) * discountValue)
                        } else {
                            discountAmount = discountValue;
                        }
                        discountTicketPrice = tripData.tripRoute.business_class_fare - discountAmount;
                        break;
                    case 3:
                        ticketPrice = tripData.tripRoute.special_class_fare;
                        discountAmount = 0;
                        if (discountType == 1){
                            discountAmount = Math.floor((ticketPrice / 100) * discountValue)
                        } else {
                            discountAmount = discountValue;
                        }
                        discountTicketPrice = tripData.tripRoute.special_class_fare - discountAmount;
                        break;
                }
                if (0 > 0)
                {
                    ticketPriceString = '<strike style="color:red; font-size: 10px;">' + ticketPrice + '</strike> ' + discountTicketPrice + '.00';
                }
            else
                {
                    ticketPriceString = ticketPrice;
                }
                var tr = '<tr id="' + sData.ticket_id + '"><td width="115">' + sData.seat_number + '</td><td width="100">' + ticketPriceString + '</td><td>' + sData.fare_type_name + '<input type="hidden" name="ticket[]" value="' + sData.ticket_id + '"/><input type="hidden" name="triproute[]" value="' + tripData.tripRoute.trip_route_id + '"/></td></tr>';
                $seatTableBody.append(tr);
                $.ajax({
                    url: '/booking/bus/seat/reserve',
                    type: 'POST',
                    data: {"ticketid":sData.ticket_id,
                        "routeid":tripData.tripRoute.trip_route_id,
                        "searchid":$('#www-search-id').val()}
                }).done(function(response) {
                    $seatObj.removeClass("request_pending");
                    $('.continue-btn').removeClass("continue-btn-disabled");
                    $seatObj.addClass('selected');
                    if (response.ack != 1) {
                        $seatObj.removeClass('selected');
                        //alert('#' + sData.ticket_id);
                        $('#' + sData.ticket_id).remove();
                        $('#seatError').text('Sorry! this ticket is not available now.');
                        $('#seatError').removeClass('hidden');
                        $seatObj.addClass('booked');
                        $seatObj.removeAttr('onclick');
                    }
                }).fail(()=> {
                   // $seatObj.removeClass("request_pending");
                    $seatObj.removeClass('selected');
                });

                doTicketsTotal(discountAmount);

            } else {
                $seatObj.removeClass("request_pending");
                $('.continue-btn').removeClass("continue-btn-disabled");
                $('#seatError').html('<div class="error-partial col-lg-12" style="padding:5px 20px;margin-top:0px;"><i class="fa fa-exclamation-triangle" style="font-size:20px;"></i><div class="error-message-div" style="padding:2px;">Maximum of ' + maxTickets + ' seat(s) can be booked at-a-time.</div></div>');
                $('#seatError').removeClass('hidden');
            }


        }
*/

    }
    function doTicketsTotal(discountAmount)
    {
        var ticketsTotal = 0;
        var $seatTableBody = $('#tbl_price_details').find('table#tbl_seat_list').find('tbody:eq(0)');
        var $seatTableTr = $seatTableBody.find('tr');
        $.each($seatTableTr, function(index, trObj) {
            ticketsTotal += parseFloat($(trObj).find('td:eq(1)').text()) - discountAmount;
        });
        $('div#tickets_total').html('<p><b>Total: ' + ticketsTotal + '</b></p>');
    }
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });



</script>
                                      
                                            

    
    
    
</body>


<!-- index.php  21 Nov 2019 03:47:04 GMT -->
</html>


<script>
          function cngdata(val)
    {
    
    if(val){
    
             document.getElementById('t_total').innerHTML = '<p><b>Total: 1</b>
</p>
                    <p>
                    </p>';
    } else {
    
             document.getElementById('t_total').innerHTML = '<p><b>Total: 0</b>
</p>
                    <p>
                    </p>';
    
    }
    
    
    
    }


</script>


