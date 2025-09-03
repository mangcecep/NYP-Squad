<?php
session_start();
require "koneksi.php";

$full_name = htmlspecialchars($_POST['nama']);
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$password = $_POST['password'];

if (
    $full_name == "" ||
    $email == "" ||
    $no_telp == "" ||
    $password == "" 
) {
    $_SESSION["VALIDATION_INPUT"] = "All Field must be filled";
    header("Location: ../register.php");
    return;
}

$cekEmail = "SELECT email FROM appdataa WHERE email = '$email' ";

if($connection->query($cekEmail)->num_rows > 0) {
    $_SESSION['VALIDATION_EMAIL_EXIST'] = "Email has already use";
    header("Location: ../register.php");
    return;
}

$password_hased = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO appdataa(nama, email, no_telp, password) VALUE ('$full_name', '$email', '$no_telp', '$password_hased')";

if($connection->query($sql)) {
    $_SESSION['REGISTER_SUCCESS'] = "Register succesfully, please login";
    header("Location: ../Home.php");
    $connection->close();
    die();
}

$_SESSION["VALIDATION_SUCCESS"] = "Register success";
header("Location: ../register.php");
?>