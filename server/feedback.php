<?php
include("art_db.php");
$dbConnection = new ArtWork_DbConnection();
$artid = $_GET["artid"];
$res = $dbConnection->allartworks('art where art_id ='.$artid);
echo $res;
?>