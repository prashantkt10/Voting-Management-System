<?php 
session_start();
if (!isset($_SESSION['voterid'])) {
	header('Location: login.html');
}

require_once 'dbconfig.php';
$voting=$_POST['party'];
$nvoterid=$_SESSION['voterid'];

$stmt=$db->query("UPDATE `voters` SET `party`='$voting' WHERE `voterid`='$nvoterid'");
$stmt=$db->query("UPDATE `voters` SET `voted`='Y' WHERE `voterid`='$nvoterid'");

header('Refresh: 2; url=home.php');
echo "Congrats, Voted Successfully !!";
 ?>