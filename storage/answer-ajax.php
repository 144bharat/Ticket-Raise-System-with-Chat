<?php
$conn = mysqli_connect('localhost','root','','ticket') or die("Database connection failed.");
if($_POST['who']=="user")
{

    
                
                    $batchid=$_POST['u_batchid'];
                    $name=$_POST['u_name'];
                    $comment=$_POST['u_comment'];
                    $person=$_POST['who'];

                    

    $commentsql = "insert into answer(batchid,name,person,comment) values('$batchid','$name','$person','$comment');";

    if(mysqli_query($conn,$commentsql))
    {
            echo "success"; 
    }
    else{
        echo "failed";
     }


}
else
{
                    
            $batchid=$_POST['u_batchid'];
            $name=$_POST['u_name'];
            $comment=$_POST['u_comment'];
            $person=$_POST['who'];

            

        $commentsql = "insert into answer(batchid,name,person,comment) values('$batchid','$name','$person','$comment');";

        if(mysqli_query($conn,$commentsql))
        {
        echo "success"; 
        }
        else{
        echo "failed";
        }

}
?>