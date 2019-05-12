<?php 
require_once 'dbconfig.php';
//$name=$voterid=$password=$emailid=$contactno=$uaddress=$image=$picpath="";
$name=input_data($_POST['fullname']);
$voterid=input_data($_POST['voterno']);
$password=input_data($_POST['pwd']);
$emailid=input_data($_POST['email']);
$contactno=input_data($_POST['contact']);
$uaddress=input_data($_POST['address']);
$newpath=input_data('pics/'.$_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $newpath);
$vote="N";

$stmt=$db->query("INSERT INTO `voters`(`name`, `voterid`, `password`, `email`, `contactno`, `address`, `photo`, `voted`) VALUES ('$name','$voterid','$password','$emailid','$contactno','$uaddress','$newpath', '$vote')");

header('Refresh: 2; url=login.html');
echo "Registered SuccessfullY !!";

function input_data($data){
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;
 }
 ?>
