<?php
include("art_db.php");
$dbConnection = new ArtWork_DbConnection();
$expertList = $dbConnection->getArtistList();
echo json_encode($expertList);
?>