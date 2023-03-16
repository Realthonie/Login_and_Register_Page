<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "projectdb";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
    die("Failed to connect!");
}