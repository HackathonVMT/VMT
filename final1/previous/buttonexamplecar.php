<?php session_start();
if($_SESSION['carcount']<=0)
{
  $_SESSION['redirect1']=true;
  header("Location: try1.php");

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="button.css">
</head>
<body>

  <button type="button" class="btn btn-info btn-lg w3-teal" style="margin-top: 30px;margin-left: 192px; " data-toggle="modal" data-target="#myModal">click for details</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal"  role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">REFILL TO REFILL</h4>
        </div>
        <div class="modal-body" style="width:600px;height:550px">
        <?php include("refill.php");?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <div class="modal fade" id="myModal1"  role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <form method="post">
         <input type="text" autocomplete="off" name="nm" id="user" >
       <input type="submit">
       </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

    <button type="button" class="btn btn-info btn-lg w3-teal" style="margin-top: 30px;margin-left: 192px; " data-toggle="modal" data-target="#myModal2">click for details</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal2"  role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ALL CAR USERS</h4>
          </div>
          <div class="modal-body" style="width:600px;height:550px">
          <?php include("same_car_compare.php");?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <div class="modal fade" id="myModal1"  role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <form method="post">
           <input type="text" autocomplete="off" name="nm" id="user" >
         <input type="submit">
         </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <form action="users_mileage_car.php">
    <input  type="submit"  class="btn btn-info btn-lg w3-teal" style="margin-top: 30px;margin-left: 192px; " value="Click for details">
     </form>
    <!-- Modal -->


</body>
</html>
