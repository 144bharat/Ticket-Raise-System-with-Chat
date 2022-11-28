<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userlog-signup</title>
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
            width:50%;
            
        }
    </style>
</head>
<body class="css-selector">
    <div class="container">
        <h2>User panel</h2>
        <h3>Signup page</h3>

        <form method="post" enctype= "multipart/form-data">
        <div class="form-group">
        userid         <input type="text" class="form-control" name="userid" id="userid"><br>
        </div>
        
        <div class="form-group">
        username      <input type="text" class="form-control" name="username" id="username"><br>
        </div>
       
        <div class="form-group">
        userpassword    <input type="text" class="form-control" name="userpassword" id="userpassword"><br>
        </div>
        
        <input type="submit" name="submit" id="submit" class="btn btn-success">

        <input type="button" name="login" class="btn btn-primary" value="Login" onclick="window.location.href = 'adminlog.php';">

        </form>
    </div>
</body>
</html>


<script>

$("document").ready(function(){

    $("#submit").on('click',function(e){
            e.preventDefault();
        
            var id = $("#userid").val();
            var name = $("#username").val();
            var password = $("#userpassword").val();

            $.ajax({
                url:'signupvalidate.php',
                type:'POST',
                data:{
                        u_id:id,
                        u_name:name,
                        u_password:password,
                    },

                success:function(data){
                        alert(data);
                        // location.href="signupvalidate.php";
                    }
                });
    });
});
</script>

