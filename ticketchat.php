<?php
			session_start();
// echo "<pre>";
// print_r($_SESSION['status']);
// exit;
unset($_SESSION['status']);
			if($_SESSION['type']=='admin')
			{

				echo "<h2><center>Admin Panel</center></h2>
					<h3>hello     ".$_SESSION['common_name']."</h3>";
			}else
			{
				echo "<h2><center>User Panel</center></h2>
					<h3>hello     ".$_SESSION['common_name']."</h3>";
			}
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style>
	#replybtn{
		margin-left:86%;
	}
</style>
</head>
<body>
	
<?php
		$conn2 = mysqli_connect('localhost','root','','formdb_bharat') or die("Database connection failed.");


		$batchsql = "SELECT * FROM batch";
			$fetched2 = mysqli_query($conn2,$batchsql);

		$output = '';
		if(mysqli_num_rows($fetched2) > 0)
		{
		$output .= '<table  class="table">
		<tr class="thead-dark">
		<th scope="col">id</th>
		<th scope="col">Batch id</th>
		<th scope="col">Qualification Pack(*)</th>
		<th scope="col">Total Candidates(*)</th>
		<th scope="col">Button</th>      
		</tr>';
				while($row = mysqli_fetch_assoc($fetched2))
				{
					$output.= '
					<tr>
						<td scope="row">'.$row["id"].'</td>

						<td>'.$row["Batch ID(SIP)(*)"].'</td>

						<td scope="row">'.$row["Qualification Pack(*)"].'</td>

						<td>'.$row["Total Candidates(*)"].'</td>

						<td>
						
						<button type="button" class="btn btn-primary send_batch_id" data-toggle="modal" data-target="#exampleModalLong" data-id="'.$row["Batch ID(SIP)(*)"].'">
		Raise Ticket
		</button>
						
						
						</td>
					</tr>';
				}
		$output.= '</table></div>';
		echo $output;
		}
		else{
		echo "<script>alert('record not found');</script>";
		}
?>




<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">User Chat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
    



<!-- yaha se popup ka content shuru hoga admin or user ka. -->








<?php
if($_SESSION['type']=='admin')
{
?>

	<div id="msg_box"></div>

	
	<input type="button" id="replybtn" value="reply" class="btn btn-warning mb-2">
	<span id="showreply" >
	<input type="text" id="msg" class="form-control">
		
			<select class="form-select form-select-sm" onchange="changestatus(this.value)">
				<option>------</option>
				<option value="open" >open</option>
				<option value="closed"  >closed</option>
			</select>
			<input type="button" name="adminreply" id="btn" onclick="sendcomment(document.querySelector('#msg').value)" value="Send" class="btn btn-success m-2">
			
		
	</span>


<script>
	var mystatus ="";
		function changestatus(val)
		{
			mystatus = val;
		}
		
	var comment ="";
		function sendcomment(commentval)
			{
				// alert(commentval);
				comment = commentval;
			}

			var batchid="";
	
			$("document").ready(function(){
				$(document).on('click','.send_batch_id',function(e){
					e.preventDefault();
					batchid = $(this).data('id');
					// alert(batchid);
					console.log(batchid);

				});
			});
			
var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
	var getData=jQuery.parseJSON(e.data);
	// console.log(getData);
    var html="<p style='margin-left:50%; width:50%;overflow:hidden;word-wrap: break-word;'><b>"+getData.name+"</b>  said..... <br>"+getData.msg+"<br/></p>";
	jQuery('#msg_box').append(html);
};

jQuery('#btn').click(function(){
	var msg=jQuery('#msg').val();
	if(msg =='')
	{
		alert('write something!');
	}
	else{
		
		var name="<?php echo $_SESSION['common_name']?>";
		var content={
			msg:msg,
			name:name,
			status:mystatus,
		};
console.log(content);
		conn.send(JSON.stringify(content));
		var html="<p style='width:50%;overflow:hidden;word-wrap: break-word;'><b>"+name+"</b>: "+msg+"<br/></p>";
		jQuery('#msg_box').append(html);
		jQuery('#msg').val('');
	}
	

	if(mystatus == "closed")
		{
			location.reload();
		}



		
		$("document").ready(function(){
			$("#btn").on('click',function(e){
					e.preventDefault();
				
					var mycomment = comment;
					// alert(comment);
					var name3="<?php echo $_SESSION['common_name']?>";
					var bat_id = batchid;
					var who = "admin";
					$.ajax({
						url:'storage/answer-ajax.php',
						type:'POST',
						data:{
								u_batchid:bat_id,
								u_name:name3,
								u_comment:mycomment,
								who:who,
							},

						success:function(data){
								// alert(data);
								// location.href="signupvalidate.php";
								if(data == "failed")
								{
									alert("Hello admin Your Comments are not storing in background!");
								}
							}
						});
			});
		});


	
});
</script>

<?php 

}
else {
?>
		
		<div id="msg_box"></div>
		<input type="button" id="replybtn" value="reply" class="btn btn-warning mb-2">		
		<span id="showreply">
				<input type="text" id="msg" class="form-control">
				<input type="button" id="btn" value="Send" class="btn btn-success m-2" onclick="sendcomment(document.querySelector('#msg').value)">
				<input type="button" id="createbtn" value="Create Ticket" class="btn btn-danger m-2" style="margin-left:80%;display:none">
		</span>
		
		<form style="display:none" id="createticketform">
				<p>Raise your query</p>
				<input type="text" id="createmsg">
				<input type="button" class="btn btn-outline-secondary" id="sendquery" value="send query">			
		</form>




		<script>
// create ticket ka data ja rha hai.

		var batchid="";
	$("document").ready(function(){
				$(document).on('click','.send_batch_id',function(e){
					e.preventDefault();
					batchid = $(this).data('id');
					// alert(batchid);
					console.log(batchid);

				});
				

			$("#sendquery").on('click',function(e){
					e.preventDefault();
				
					var createmsg = $("#createmsg").val();
					var name2="<?php echo $_SESSION['common_name']?>";
					var bat_id = batchid;

					$.ajax({
						url:'storage/createticket-ajax.php',
						type:'POST',
						data:{
								u_batchid:bat_id,
								u_name:name2,
								u_createmsg:createmsg,
							},

						success:function(data){
								alert(data);
								// location.href="signupvalidate.php";
							}
						});
					});
				});
				
				
				
				var comment ="";
					function sendcomment(commentval)
				{
					// alert(commentval);
					comment = commentval;
				}
				
	var conn = new WebSocket('ws://localhost:8080');
	conn.onopen = function(e) {
		console.log("Connection established!");
	};
	
	conn.onmessage = function(e) {
		var getData=jQuery.parseJSON(e.data);
		// console.log(getData);
		var html="<p style='margin-left:50%; width:50%;overflow:hidden;word-wrap: break-word;'><b>"+getData.name+"</b> said.....<br>"+getData.msg+"<br/>"+"<span class='btn btn-success btn-sm' style='float:right'>"+getData.status+"</span></p>";
		
		
		if(getData.status =="closed")
		{
			document.getElementById("createbtn").style.display="block";
			// document.getElementById("createticketform").style.display="block";
			document.getElementById("btn").style.display="none";
			document.getElementById("msg").style.display="none";
		}else
		{
			document.getElementById("btn").style.display="block";
			document.getElementById("msg").style.display="block";
			document.getElementById("createbtn").style.display="none";
			document.getElementById("createticketform").style.display="none";	
		}

		document.getElementById("createbtn").addEventListener('click',()=>{
			document.getElementById("createticketform").style.display="block";
		});


		jQuery('#msg_box').append(html);
		};

		jQuery('#btn').click(function(){
		var msg=jQuery('#msg').val();
		// console.log(typeof msg);
		if(msg =='')
		{
		alert('write something!');
		}
		else{
		// 	var mystatus = changestatus(status);
		// alert(mystatus);
		var name="<?php echo $_SESSION['common_name']?>";
		var content={
			msg:msg,
			name:name
		};

		conn.send(JSON.stringify(content));
		
		var html="<p style='width:50%;overflow:hidden;word-wrap: break-word;'><b>"+name+"</b>: "+msg+"<br/></p>";



		jQuery('#msg_box').append(html);
		jQuery('#msg').val('');
		}

		});



// data answer wali side jayga.

		$("document").ready(function(){
			$("#btn").on('click',function(e){
					e.preventDefault();
				
					var mycomment = comment;
					// alert(comment);
					var name3="<?php echo $_SESSION['common_name']?>";
					var bat_id = batchid;
					var who = "user";
					$.ajax({
						url:'storage/answer-ajax.php',
						type:'POST',
						data:{
								u_batchid:bat_id,
								u_name:name3,
								u_comment:mycomment,
								who:who,
							},

						success:function(data){
								// alert(data);
								// location.href="signupvalidate.php";
								if(data == "failed")
								{
									alert("Hello user Your Comments are not storing in background!");
								}
							}
						});
			});
		});





		</script>

		<?php
	} 
	
	?>
<script>
	
	$('#showreply').hide();
	
	$(document).on("click","#replybtn",function(e){
		jQuery('#showreply').toggle("slow");
	})
</script>


       
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 




</body>
</html>
