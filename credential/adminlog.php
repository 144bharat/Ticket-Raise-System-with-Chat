<?php
// $conn = mysqli_connect('localhost','root','','ticket') or die("Database connection failed.");
// if(isset($_POST['submit']))
// {
//     $name=$_POST['name'];
//     $password=$_POST['password'];

//     // print(gettype($name));
//     // exit;


// }


?>














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        
        .css-selector {
                    background: linear-gradient(270deg, #21d4fd, #b721ff, #21a5ff, #9221ff);
                    background-size: 800% 800%;

                    -webkit-animation: AnimationName 7s ease infinite;
                    -moz-animation: AnimationName 7s ease infinite;
                    animation: AnimationName 7s ease infinite;
                }

                @-webkit-keyframes AnimationName {
                    0%{background-position:0% 50%}
                    50%{background-position:100% 50%}
                    100%{background-position:0% 50%}
                }
                @-moz-keyframes AnimationName {
                    0%{background-position:0% 50%}
                    50%{background-position:100% 50%}
                    100%{background-position:0% 50%}
                }
                @keyframes AnimationName {
                    0%{background-position:0% 50%}
                    50%{background-position:100% 50%}
                    100%{background-position:0% 50%}
                }
        .container{
            color:white;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            margin-top:100px;
            width:40%;
            height:400px;
        }
        form>div{
            margin-top:50px;
        }
    </style>
</head>
<body class="css-selector">
    <div class="container">
        <h2>Login Page</h2>
        <form method="post" enctype= "multipart/form-data">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary mt-5">
        </form>
    </div>
</body>
</html>

<script>

$("document").ready(function(){

    $("#submit").on('click',function(e){
            e.preventDefault();
        
            var name = $("#name").val();
            var password = $("#password").val();

            $.ajax({
                url:'adminvalidate.php',
                type:'POST',
                data:{
                        a_name:name,
                        a_password:password,
                    },

                success:function(data){
                    if(data)
                    {
                        window.location.href="../ticketchat.php";
                    }
                    else
                    {
                        alert("Wrong Credentials!");
                    }
                    }
                });
            });
        });
</script>