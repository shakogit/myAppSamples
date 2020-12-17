<?php

//credentials
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'pwd';
$dbname = 'globe_bank';


// 1. create database connection
$connection = mysqli_connect($dbhost , $dbuser , $dbpass , $dbname);
// test if query setlocal
if(!$result_set)
{
    exit("Database qury faild !");
}
// test if connection faild
if(mysqli_connect_errno)
{
    $msg="Database connection Faild !";
    $msg.=mysqli_connect_error();
    $msg.="(" . mysqli_connect_errno() . ")";
    exit($msg);
}
// 2. Perform database query
$query = "SELECT * FROM subject ";
$result_set = mysqli_query($connection, $query);
// 3. use returned data (if any)
while($subject = mysqli_fetch_assoc($result_set));
echo $subject['menu_name'] . "<br>";
// 4. release returned data
mysqli_free_result($result_set);
// 5. close database connection
mysqli_close($connection);

?>