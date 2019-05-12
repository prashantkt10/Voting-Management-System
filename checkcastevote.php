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

if ($row['voted']=='Y') {
	header('Refresh: 3; url=home.php');
	echo "<h1>You Have already Voted. Come back in next election.</h1>";
} 
else {
	header('Refresh: 1; url=castevote.php');
	echo "Redirecting to caste vote page.......";
}
?>