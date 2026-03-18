<?php
session_start();

if(!isset($_SESSION["username"]))
{
    header("location: ./login.php");
}

$username = $_SESSION["username"];
$email = $_SESSION["email"];
?>
    
<?php require_once __DIR__ . "/include/header.php" ?>
<?php require_once __DIR__ . "/include/nav.php" ?>

<h1>Welcome, <?= $username ?></h1>
<h2>your email is  <?= $email ?></h2>
<a href="./logout.php">Logout</a>
<?php require_once __DIR__ . "/include/footer.php" ?>
