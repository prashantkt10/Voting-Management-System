<?php 
session_start();
unset($_SESSION['voterid']);
header('Location: login.html');
 ?>