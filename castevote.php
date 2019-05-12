<?php 
session_start();
if (!isset($_SESSION['voterid'])) {
	header('Location: login.html');
}
require_once 'dbconfig.php';
$voterid=$_SESSION['voterid'];
$stmt=$db->prepare("SELECT * FROM `voters` WHERE voterid=:voterid");
$stmt->execute(array(':voterid'=>$voterid));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
</head>
<body background="image/xyz.jpg">
<header style="background-color:green; opacity:0.8; position:absolute; top:0; width:100%;">
	<h1 align="center" style="font-family: 'PT Sans', sans-serif; "><u>Welcome <?php echo $row['name'] ?></u></h1>
</header>

<table align="center" style="margin-top:100px">
	<tr bgcolor="white">
		<td><a href="home.php">HOME</a></td>
		<td><a href="castevote.php">CASTE YOUR VOTE</a></td>
		<td><a href="status.php">ELECTION STATUS</a></td>
		<td ><a href="logout.php">LOGOUT</a></td>
	</tr>
	<tr>
		<td colspan="4" align="center"><h4>:Choose a party to vote:</h4></td>
	</tr>
	<form action="casting.php" method="post">
	<tr>
		<td colspan="4" align="center"><input type="radio" name="party" value="bjp">BJP<br>
			<input type="radio" name="party" value="sp">SP<br>
			<input type="radio" name="party" value="congress">Congress<br>
			<input type="radio" name="party" value="aap">AAP<br>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center">
			<input type="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset">
		</td>
	</tr>
	</form>
</table>

<!-- <img src="<?php echo $row['photo']; ?>" style="margin-top:100px"> -->

<footer align="center" style="background-color:green; opacity=0.9; position:absolute; bottom:0; width:100%;">
	<h4 style="font-family: 'PT Sans', sans-serif; ">All rights reserved @ <a href="http://www.fb.com/prashant3g">Prashant</a></h4>
	</footer>
</body>
</html>