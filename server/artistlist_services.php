<?php
include("art_db.php");
$dbConnection = new ArtWork_DbConnection();
$userid = $_GET["userid"];
$expertList = $dbConnection->getartistChatList($userid);
echo json_encode($expertList);
?>