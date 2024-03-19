<?php
include("art_db.php");
$dbConnection = new ArtWork_DbConnection();
$artid = $_GET["artid"];
$res = $dbConnection->allartworks('comment where artid ='.$artid);
    echo $res;

?>