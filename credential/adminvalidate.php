<?php
session_start();
unset($_SESSION['user_name']);
$conn = mysqli_connect('localhost','root','','ticket') or die("Database connection failed.");
if(isset($_POST))
{
    //  ADMIN LOGIN SYSTEM
                
                $name=$_POST['a_name'];
                $password=$_POST['a_password'];

                // print(gettype($name));
                // exit;

            $adminsql = "select * from admin where name='$name' AND password='$password'";
            $fetchadmin = mysqli_query($conn,$adminsql);
            if(mysqli_num_rows($fetchadmin)>0)
            {
                echo "admin";
                $_SESSION['type']="admin";
                $_SESSION['common_name']=$name;
            }
            $usersql = "select * from user where username='$name' AND userpassword='$password'";
            // $fetchadmin = mysqli_query($conn,$adminsql);
            // print_r($fetchadmin);

            $fetchuser = mysqli_query($conn,$usersql);
            if(mysqli_num_rows($fetchuser)>0)
            {
                echo "user";
            $_SESSION['type']="user";
            $_SESSION['common_name']=$name;
            }
        }
















        //             $totalrow = mysqli_num_rows($fetchadmin);
        
        //             $i=1;
        
        //             while($row=mysqli_fetch_assoc($fetchadmin))
        //             {
        //                 if($name != $row['name'] && $i==$totalrow)
        //                 {
        //                     echo "Invalid Credential!";
        //                 }
        //                 elseif($password != $row['password'] && $i==$totalrow){
        //                     echo "Invalid Credential!";
        //                 }
        //                 else{
        //                                 if($password == $row['password'] && $name == $row['name'])
        //                                 {
        //                                     echo "admin";
        //                                     $_SESSION['type']="admin";
        //                                     $_SESSION['user_name']=$name;
        //                                     break;
        //                                 }
        //                 }
        //                 $i++;
        //             }              
        // }
        ?>