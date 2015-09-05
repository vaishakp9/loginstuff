<?php include("./inc/header.inc.php"); ?>
<?php
if(isset($_GET['u'])){
$username = mysql_real_escape_string($_GET['u']);
if(ctype_alnum($username)){
	//if exists
	$check = mysql_query("SELECT username, first_name FROM users WHERE username = '$username'");
	if(mysql_num_rows($check)==1){
		$get=mysql_fetch_assoc($check);
		$username = $get['username'];
		$firstname = $get['first_name'];
	}
	else
	{
		echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/index.php\">";
		exit();
	}
}

}
?>
<div id="wrapperProfile">
<div class="postForm">Post form</div>
<div class="profilePosts">Your Posts</div>
<img src="" height="250" width="200" alt="<?php echo $username; ?>'s Profile" title="<?php echo $username; ?>'s Profile" />
<br/>
<div class="textHeader"><?php echo $username; ?>'s Profile</div>
<div class="profileLeftSideContent">Something</div>
<div class="textHeader"><?php echo $username; ?>'s Friends</div>
<div class="profileLeftSideContent">
	<img src="#" height="50" width="40" />&nbsp;&nbsp;
	<img src="#" height="50" width="40" />&nbsp;&nbsp;
	<img src="#" height="50" width="40" />&nbsp;&nbsp;
	<img src="#" height="50" width="40" />&nbsp;&nbsp;
	<img src="#" height="50" width="40" />&nbsp;&nbsp;
	<img src="#" height="50" width="40" />&nbsp;&nbsp;
	<img src="#" height="50" width="40" />&nbsp;&nbsp;
	<img src="#" height="50" width="40" />&nbsp;&nbsp;
</div>