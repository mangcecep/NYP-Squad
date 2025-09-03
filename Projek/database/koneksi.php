<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'appdata';

$connection = new mysqli(
    $server,
    $username,
    $password,
    $db
);

if($connection->error) {
    die(" ERROR CONNECTION " . $connection->error);
}
?>