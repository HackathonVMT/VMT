
  <?php
      $sql3 = "select MAX(mileage) as h, vehicle_name as n
               from vehicle v,mileage1 m
               where v.vehicle_type= 'car' and v.vehicle_id = m.vehicle_id and m.mileage = (select max(mileage)
                                                                                             from mileage_1,vehicle
                                              where vehicle.vehicle_type= 'car' and vehicle.vehicle_id = mileage_1.vehicle_id);";
      $res3 = $con->query($sql3);

       if ($res3->num_rows > 0){
    $row3 = $res3->fetch_assoc();
    $mil_max =$row3['h'];
        $v_name = $row3['n'];
        //echo "<strong>".$v_name."</strong>";
    echo "<strong style='color:orange;'>".$v_name."</strong>";

       }

     ?></p>
  <div class="w3-grey">
    <div class="w3-container w3-center w3-padding w3-pink" style="width:<?php echo $mil_max?>%"><?php echo $mil_max?></div>
  </div>

  <p><span> Bike with minimun mileage: </span><?php
      $sql4 = "select min(mileage) as h1, vehicle_name as n1
               from vehicle v,mileage_details m
               where v.vehicle_type= 'bike' and v.vehicle_id = m.vehicle_id and m.mileage = (select min(mileage)
                                                                                             from mileage_details,vehicle
                                              where vehicle.vehicle_type= 'bike' and vehicle.vehicle_id = mileage_details.vehicle_id);";
      $res4 = $con->query($sql4);
       if ($res4->num_rows > 0){
    $row4 = $res4->fetch_assoc();
    $mil_min =$row4['h1'];
        $v_name1 = $row4['n1'];
        echo "<strong style='color:red;'>".$v_name1."</strong>";
        //echo "<strong>".$v_name1."</strong>";
    }

     ?>
   */</p>
  <div class="w3-grey">
    <div class="w3-container w3-center w3-padding w3-brown" style="width:<?php echo $mil_min?>%"><?php echo $mil_min?>
  </div>
  </div>
</div>
<hr>
-->
