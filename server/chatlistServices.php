<?php
include("art_db.php");
include("util.php");
$dbConnection = new ArtWork_DbConnection();
$userid = $_GET["userid"];
$expertid = $_GET["expertid"];



$expert = $dbConnection->getChatHistory($userid, $expertid);
echo $expert;

?>