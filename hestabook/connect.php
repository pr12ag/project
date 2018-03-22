<?php
session_start();
if(!isset($_SESSION['mail'])){
	header("location:newlogin.php");
}

	require_once "connection.php";
	$ema=$_SESSION['mail'];
	$sql="select * from user where email='$ema'";
	$dataObj = $conn->query($sql);
	$user = $dataObj->fetch_row();
?>
<?php
function getTime($time){
	$now =strtotime("now");
	$lastWeek = strtotime($time);
	$difference = abs($now - $lastWeek)/3600;
	$agoTime=getAgoTime($difference/24);
	return $agoTime;
}
function getAgoTime($time)
{
	if (floor($time)>0)
	{

		return floor($time)." days ago";
	}
}
function getPostType($type)
{
	if($type==0)
	{
		return "T";
	}
	else{
		return "I";	 
	}
}
require "connection.php";
$sql="select post.post_data, post.post_type, post.post_time,feed.email from post inner JOIN feed on post.post_id=feed.post_id order by post.post_time DESC;";
$dataObj = $conn->query($sql);
while ($row = $dataObj->fetch_assoc()) {

        $data[] = $row;
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="author" content="Team Hestabit">
    <meta name="description" content="">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>Hestabit &copy;</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--CDN FOR Font Awesom-->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet"  type="text/css" href="connect.css"/>
	</head>
<body>

<div class="header-section">
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="header-text">
			<p><strong>Face<span>Look</span></strong></p>
			</div>
		</div>
		<div class="col-md-3">
			<div class="logout">
			<p> <a href="logout.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>    </p>
			</div>
		</div>		
	</div>
</div>
</div>
<br>
<div class="post-body">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="user-details">
					<ul>
				<li> <div class="profile">
				<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $user['9'] ).' "width="100px" height="100px" alt="profile picture"/>'?></div></li>
					<?php 
							foreach($user as $services){
							if($user[9]==$services || $user[0]==$services){
								continue;
							}
							else {
							echo "<li>$services</li>";
						}}
							?>
    				</ul>		
  					<button id="opener">Open Edit</button><br>
 				</div>
 				
			</div>
			<div class="col-md-offset-1 col-md-6">
				<form action="newsfeed.php" method="POST">
					<div class="input-group">
   						<input type="text" class="form-control" name="feed" id="upost">
   						<span class="input-group-btn">
       				<button class="btn btn-default" type="submit" name="post-button" onClick="return empty()">Post Here!!</button>
   						</span>
					</div>
				<p>
					<div class="form-group">
  							<label for="comment">Your Post</label>
  						
  							
					</div>	
					
					<div class="feed">

					<ul>
						<?php foreach ($data as $key) :?>
						<li>
							<?php 
							$pic= $key['post_data'];
							if($key['post_type']==0){
								
								echo '<img src='.$pic.' alt="image"/>';
							}
							else{
						echo "<div>$pic</div>";
					}?>
						<div><?php echo getTime($key['post_time']);?></div>
						<div><?php echo getPostType($key['post_type']);?></div>
						</li>
						<?php endforeach;?>
</ul>
  							
					</div>	
				</p>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="footer-section">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p align="center">Copy &copy; All Rights Reserved.</p>
		</div>
	</div>
</div>
</div>
<!--edit buuton form!-->
<div id="dialog" title="Edit Details">
  	<form  action="update.php" method="POST" role="form">
			<div class="form-group">
				<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="">
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="passsword">
			</div>
			<div class="form-group">
				<input type="text" name="description" id="description" tabindex="2" class="form-control" placeholder="Description">
			</div>									
			<div class="form-group">
				<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="address" value="">
			</div>
			<div class="form-group">
				<input type="file" name="picture" id="picture" class="form-control">
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
			<input type="submit" name="edit-submit" id="" tabindex="4" class="form-control btn btn-register" value="Edit Now">
					</div>
				</div>
			</div>
	</form>
</div>

<script type="text/javascript">
	$('#file-upload').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#file-upload')[0].files[0].name;
  $(this).prev('label').text(file);
});
//Function To Display Popup
$(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  });
//funtion to check post is disable when left empty
function empty() {
    var x;
    x = document.getElementById("upost").value;
    if (x == "") {
        alert("Please Either Post Something OR Pass Image URL");
        return false;
    };
}
$("#picture").change(function() {

   					 var val = $(this).val();

    				switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
      					  case 'gif': case 'jpg': case 'png': case 'jpeg':
       						     alert("an image");
       						     break;
       						 default:
       						     $(this).val('');
            // error message here
       						     alert("not an image");
      					      break;
    }
});
</script>  
	<script type="text/javascript">
$(document).ready(function(){
	setInterval(function(){
		$('.feed').load('time.php')
	}, 3000);
});
</script>
</script>
</body>
</html>

