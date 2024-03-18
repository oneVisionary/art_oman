<?php
include("art_db.php");
include("util.php");
$dbConnection = new ArtWork_DbConnection();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
       
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $mode = "NA";
        if(isset($_POST["mode"])){
            $mode = "EA";
        }
        
        $currentDate = Util::getCurrentDate();
        $tableName = "artorders";
        $data = array(
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
            'mode'=>$mode,
            'created_at'=>$currentDate,
        );
        if (isset($_POST["id"])) {
            $id = trim($_POST["id"]);
           
            $where = array('id' => $id);
            $response = $dbConnection->update_data($tableName, $data, $where);
            echo $response;
        } else {
           
           
            $response = $dbConnection->insert_data($tableName, $data);
            echo $response;
        }
    } else {
        
        echo "Error: Form fields are not set.";
    }
}



?>