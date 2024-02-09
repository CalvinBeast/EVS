<?php

include("connect.php");

$avatar = $_FILES['avatar'] ['name'];
$tmp_name = $_FILES['avatar'] ['tmp_name'];
$usrname = $_POST['usrname'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$role = $_POST['role'];


if($password==$cpassword){
    
    move_uploaded_file("$tmp_name","../uploads/$avatar");
    $insert = mysqli_query( $connect,"INSERT INTO voting( avatar,usrname,mobile,password,cpassword,address,role,status,votes ) 
                                VALUES('$avatar','$usrname','$mobile','$password','$cpassword','$address','$role',0,0)" );

        if($insert){
            echo '
            <script>
            alert("Registration Successful");
            window.location="../index.html";
            </script>
            ';
        }
        else{
            echo '
            <script>
            alert("Imformation not Valid");
            window.location="../routes/Registration.html";
            </script>
            ';
        }

}
else{

    echo '
    <script>
    alert("Password and Comfirm Password does not match");
    window.location="../routes/Registration.html";
    </script>
    ';

}


?>