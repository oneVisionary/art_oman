<?php
include("art_db.php");
$dbConnection = new ArtWork_DbConnection();
$userid = $_GET["userid"];
$cmd = $_GET["cmd"];
if($cmd=="edit"){
   
    $expert = $dbConnection->getArtInfo($userid);
    
    echo $expert;
}
else if($cmd=="delete") {
    echo "line 13:".$userid;
    $res = $dbConnection->deleteart('art',$userid);
    echo $res;
}

?>