
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h1>Notification</h1>
<?php

include "notification.php";
include '../config/database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$get_id=$_GET['id'];
$change ="read";
try{

    //user id 
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query= $conn->prepare("SELECT * FROM `notification` WHERE id=?");
    $query->execute([$get_id]);

    $results= $query->fetch();

    echo $results['messages'];
    echo " at  ";
    echo $results['date'];

    $query=$conn->prepare("UPDATE `notification` SET to_read=? WHERE id=?");
    $query->execute([$change,$get_id]);
    
}
catch(PDOException $e)
{
    echo "result of notification $e";
}

?>
    <a href="main_page.php">go back</a>
</body>
</html>
