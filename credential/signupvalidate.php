<?php
$conn = mysqli_connect('localhost','root','','ticket') or die("Database connection failed.");
if(isset($_POST))
{

    //  USER SIGNUP SYSTEM
                
                    $uid=$_POST['u_id'];
                    $uname=$_POST['u_name'];
                    $upassword=$_POST['u_password'];

                    // print($uid);
                    // exit;
if($_POST['u_name']=='')
{
    echo "Enter name to proceed!";
}
else if($_POST['u_password']=='')
{
    echo "Enter password to proceed!";
}
else
{
    $usersignsql = "insert into user(userid,username,userpassword) values('$uid','$uname','$upassword');";

    if(mysqli_query($conn,$usersignsql))
    {
            echo "success"; 
    }
    else{
        echo "failed";
     }
}

}
?>