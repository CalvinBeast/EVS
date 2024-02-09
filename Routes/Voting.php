<?php
/* SESSION START */
session_start();
if(!isset($_SESSION['userdata']))
{

  header("location:../");

}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];

/* STATUS CODE */

if($userdata['status']==0){
  $status='<b style="color:red" > NOT VOTED </b>';
}
else{
  $status='<b style="color:green" > VOTED </b>';
}
/* STATUS CODE END */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link src="../css/dashboard.css">
    <style>
    .main{
      display: flex;
    }
    
    .userinfo{
      border-radius: 20px;
      border: 2px solid black;
      padding: 50px;
      z-index: 1;
      background-color: #ffffffc7;
      font-size: 24px;
      width: fit-content;
      position: relative;
      margin: 6px;
    }
    
    .groups{
      border-radius: 20px;
      border: 2px solid black;
      padding: 50px;
      z-index: 1;
      background-color: #ffffffc7;
      position: relative;
      margin: 6px;
      width: -moz-available;
    }

    .img{  
      height: 500px;
      margin-top: -23px;
      z-index: 0;
      justify-content: center;
      align-content: center;
      align-items: center;
      display: flex;
      position: absolute;
    }

    .group1{
      margin-top:20px;
    }

    b{
      font-size:20px;
    }

    p{
      margin: 0px;
      font-size: 24px;
      display: contents;
    }

    .flft{
      float: left;
    }

    .flrt{
      position: relative;
      left: 132px;
      display: flow-root;
    }

    </style>
</head>
<body>
    <div class="main"> 
        <img src="sticky-removebg-preview.png" class="img">
    
        <div class="userinfo">

            <center> <img src="../uploads/<?php echo $userdata['avatar'] ?>" height="100" width="100"> </center>
            <br>
            <br>
            <b> Name: </b> <?php echo $userdata['usrname'] ?>
            <br><br>
            <b> Mobile: </b> <?php echo $userdata['mobile'] ?>
            <br><br>
            <b> Address: </b> <?php echo $userdata['address'] ?>
            <br><br>
            <b> Status: </b> <?php echo $userdata['status'] ?>

        </div>

        <div class="groups">

              <?php
                if($_SESSION['groupsdata']){
                  for($i =0; $i<count($groupsdata); $i++){
              ?>

          <div class="group1">
            <div class="flft">
            <img src="../uploads/<?php echo $groupsdata[$i]['avatar'] ?>" height="100" width="100">
            </div>
            <br>
            <div class="flrt">
              <b>GROUP NAME:</b><p><?php echo $groupsdata[$i]['usrname'] ?></p>
              <br><br>
              <b>VOTES:</b><p><?php echo $groupsdata[$i]['votes'] ?></p>
              <br><br>
              <form action="#">
                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                <input type="submit" name="votebtn" value="vote" id="votebtn">
              </form>
              </div>
            
          </div>

          <?php
            }
          }
          else{

          }
          ?>

        </div>

    </div>
</body>
</html>

