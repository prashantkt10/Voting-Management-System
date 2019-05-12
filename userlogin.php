<?php 
session_start();
require_once 'dbconfig.php';
$id=$_POST['uid'];
$pwd=$_POST['pwd'];
$stmt=$db->prepare("SELECT * FROM `voters` WHERE voterid=:voterid AND password=:password");
$stmt->execute(array(':voterid'=>$id, ':password'=>$pwd));
$row=$stmt->fetch(PDO::FETCH_NUM);
// print_r($row);
if ($row>0) {
	$_SESSION['voterid']=$id;
	header('Location: home.php');
}
else{
	header('Location:login.html');
	echo "Login Failed !!";

}

 ?>
