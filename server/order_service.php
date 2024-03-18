<?php
include("art_db.php");
include("util.php");
$dbConnection = new ArtWork_DbConnection();
$artist_userid = $_GET["artist_userid"];
$artid = $_GET["artid"];
$table = "artorders";
$currentDate = Util::getCurrentDate();
$data = array(
    'new_artist_id'=>$artist_userid,
    'art_id'=>$artid,
    'created_at'=>$currentDate,
);

$expert = $dbConnection->insert_data($table, $data);
echo $expert;

?>