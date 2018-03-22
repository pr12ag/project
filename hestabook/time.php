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
	if (floor($time)>=1)
	{
		return floor($time)." days ago";
	}
	else{
		if(floor($time*24>=1)){
		return floor($time*24)." hours ago";
	}
	else{
		return floor($time*60*24)." minutes ago";
	}

}
}
function getPostType($type)
{
	if($type==0)
	{
		return "I";
	}
	else{
		return "T";	 
	}
}
require "connection.php";
$sql="select post.post_data, post.post_type, post.post_time,feed.email from post inner JOIN feed on post.post_id=feed.post_id order by post.post_time DESC;";
$dataObj = $conn->query($sql);
while ($row = $dataObj->fetch_assoc()) {
        $data[] = $row;
    }

?>
		<ul>
						<?php foreach ($data as $key) :?>
						<li>
							<?php 
							$pic= $key['post_data'];
							$mail=$key['email'];
							$qry="select name from user where email=$mail;";
							$dataval=$conn->query($qry);
							$row=$dataval->fetch_assoc();
							if($key['post_type']==0){
								
								echo '<img src='.$pic.' alt="image"/>';
							}
							else{
						echo "<div>$pic</div>";
					}?>
						<div><?php echo getTime($key['post_time']);?></div>
						<div><?php echo getPostType($key['post_type']);?></div>
						<div><?php echo $row['email'];?></div>
						</li>
						<?php endforeach;?>
</ul>