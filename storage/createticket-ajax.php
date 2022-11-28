<?php
$conn = mysqli_connect('localhost','root','','ticket') or die("Database connection failed.");
if(isset($_POST))
{
                    $batchid=$_POST['u_batchid'];
                    $createmsg=$_POST['u_createmsg'];
                    $name=$_POST['u_name'];


            if($_POST['u_createmsg']=='')
            {
                echo "Enter something to Create Ticket!";
            }
            else
            {
                $problemsql = "insert into problem(batchid,username,createmsg) values('$batchid','$name','$createmsg');";

                if(mysqli_query($conn,$problemsql))
                {
                        echo "ticket created"; 
                }
                else{
                    echo "failed to create ticket!";
                }
            }
                
}

?>