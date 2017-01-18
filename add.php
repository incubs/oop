<?php session_start();


include 'vendor/autoload.php';

$firstName =$_POST['first_name'];
$lastName =$_POST['last_name'];
$email =$_POST['email'];
$message =$_POST['message'];
$user = new User($firstName);
try {
    $user->setEmail($email);
} catch ( Exception $exception ) {
    $_SESSION['message'] = "<div class='alert alert-danger'>Invalid Email</div>";
    header('location:index.php');
    exit;
}
$user->setLastName($lastName);
$user->setMessage($message);
$user->save();

$_SESSION['message'] = "<div class='alert alert-success'>Successfully Saved</div>";

header('location:index.php');