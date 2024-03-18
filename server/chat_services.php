<?php
include("art_db.php");
include("util.php");
$dbConnection = new ArtWork_DbConnection();


if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["sendby"]) && isset($_POST["sendto"]) && isset($_POST["message"])) {
       
        $sendby = trim($_POST["sendby"]);
        $sendto = trim($_POST["sendto"]);
        $message = trim($_POST["message"]);
        $currentDate = Util::getCurrentDate();
        $tableName = "chat";
        if($_FILES['file']['name']){
            $fileName = $_FILES['file']['name'];
            $targetDir = "../asset/images/chatfiles/";
            //echo $fileName;
            $targetFilePath = $targetDir . basename($fileName);
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
            $currentDate = Util::getCurrentDate();
                $tableName = "chat";
            $newFileName = date('YmdHis') . '.' . $fileType;
            $targetFilePath = $targetDir . $newFileName;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                
    
                $data = array(
                    'sendby'=>$sendby,
                    'sendto'=>$sendto,
                    'message'=>$newFileName,
                   
                    'created_at'=>$currentDate,
                );
              
                $response = $dbConnection->insert_data($tableName, $data);
               
            } else {
              
                echo "Failed to upload file.";
            }

        }
        else{
             $data = array(
                'sendby'=>$sendby,
                'sendto'=>$sendto,
                'message'=>$message,
               
                'created_at'=>$currentDate,
            );
            $response = $dbConnection->insert_data($tableName, $data);
        }
       
       
       


        
      
       
   
    } else {
        
        echo "Error: Form fields are not set.";
    }
}



?>