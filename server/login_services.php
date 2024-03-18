<?php
include("art_db.php");
include("util.php");
$dbConnection = new ArtWork_DbConnection();
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["email"]) && isset($_POST["password"])) {
       
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $tableName = "artist";
        $data = array(
            'email'=>$email,
            'password'=>$password,
        );
        $response = $dbConnection->isUserExist($tableName,$data);
        $userData = json_decode($response,true);
        if(isset($userData['error'])){
            echo "";
        }
        else{
            $_SESSION["userid"] = $userData['id'];
//$_SESSION["mode"] = $userData['mode'];
            echo  $userData['mode'];
        }
        
       
    } else {
        
        echo "Error: Form fields are not set.";
    }
}



?>