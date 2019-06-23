<?php

/* Creates variables to access the local database */
$serverName = "localhost";
$dBUsername= "root";
$dBPassword= "";
$dBNAME= "db_users";

/* Create connection with database */
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBNAME);
 
/* Checks if the connection fails */
if(!$conn) {
     die("Connection failed: " .mysqli_connect_error());
 }

