<?php
include("art_db.php");
include("util.php");
$dbConnection = new ArtWork_DbConnection();
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["name"]) && isset($_POST["star"])) {
       
        $name = trim($_POST["name"]);
        $star = trim($_POST["star"]);
        $feedback = trim($_POST["feedback"]);
        $artid = trim($_POST["artid"]);
        $tableName = "comment";
        $currentDate = Util::getCurrentDate();
        $data = array(
            'name'=>$name,
            'star'=>$star,
            'feedback'=>$feedback,
            'created_at	'=>$currentDate,
            'artid	'=>$artid,
        );
        $response = $dbConnection->insert_data($tableName, $data);
            echo $response;
       
        
       
    } else {
        
        echo "Error: Form fields are not set.";
    }
}



?>