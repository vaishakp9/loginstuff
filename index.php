<?php include("./inc/header.inc.php") ?>
<?php 
$reg = @$_POST['reg'];
$fn="";
$ln="";
$usrnm="";
$email="";
$password="";
$date="";
$u_check="";
$fn=strip_tags(@$_POST['fname']);
$ln=strip_tags(@$_POST['lname']);;
$usrnm=strip_tags(@$_POST['username']);;
$email=strip_tags(@$_POST['email']);;
$password=strip_tags(@$_POST['password']);;
$date=date("Y-m-d");
if($reg){
$u_check=mysql_query("SELECT username from users where username='$usrnm'");
$check=mysql_num_rows($u_check);
if($check==0)
{
	if($fn&&$ln&&$usrnm&&$email&&$password){

		if(strlen($fn)>25||strlen($ln)>25||strlen($usrnm)>25)
			echo "Limit exceeded ! Please try again ... ";
		else
		{
			if(strlen($password)>30||strlen($password)<5)
				echo "Your password should be between 5 to 30 characters long ! Please try again ... ";
			else{
				$password=md5($password);
				$query=mysql_query("INSERT into users VALUES ('','$usrnm','$fn','$ln','$email','$password','$date','0') ");
				die("Welcome !");
			}
		}
	}
	else
		echo "Please fill in all fields ! ";

}
else
	echo "Please try another username ... This already exists ... Sorry :(";
}

//Login 

if(isset($_POST["user_login"])&&isset($_POST["password_login"])){
$user_login=preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]);
$password_login=preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]);
$password_login=md5($password_login);
$sql=mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$password_login' Limit 1 ");
$userCount=mysql_num_rows($sql);
if($userCount==1){
	while($row=mysql_fetch_array($sql)){
		$id=$row["id"];
	}
	$_SESSION["user_login"]=$user_login;
	header("Location: home.php");
	exit();

}
else
	{
		echo "Wrong info. Please try again ... ";
		exit();
	}


}
?>
<div id="wrapperProfile">
	<table>
		<tr>
			<td width="60%" valign="top">
				<h2>Already a member ? Sign in below ! </h2>
				<form action="index.php" method="POST">
	                <input type="text" size="25" name="user_login" placeholder="Username"/><br><br>
					<input type="password" size="25" name="password_login" placeholder="Password"/><br><br>
					<input type="submit" size="25" name="login" value="Log In"/>	
				
				</form> 
			</td>
			<td width="40%" valign="top">
				<h2 >Sign Up </h2>
				<form action="index.php" method="POST">
					<input type="text" size="25" name="fname" placeholder="First Name"/><br><br>
					<input type="text" size="25" name="lname" placeholder="Last Name"/><br><br>
					<input type="text" size="25" name="username" placeholder="Username"/><br><br>
					<input type="text" size="25" name="email" placeholder="E-mail address"/><br><br>
					<input type="password" size="25" name="password" placeholder="Password"/><br><br>
					<input type="submit" size="25" name="reg" value="Sign Up !"/>	
				</form>
			</td>
		</tr>
	</table>
	<?php include("./inc/footer.inc.php") ?>
