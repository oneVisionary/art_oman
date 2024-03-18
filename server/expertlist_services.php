<?php
include("art_db.php");
$dbConnection = new ArtWork_DbConnection();
$expertList = $dbConnection->getExpertList();
echo json_encode($expertList);
?>