<?php
include("art_db.php");
include("util.php");
$dbConnection = new ArtWork_DbConnection();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userid = $_POST['userid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

   
    $targetDir = "../asset/images/expertArtwork/";
    $fileName = $_FILES['artwork']['name'];
    $targetFilePath = $targetDir . basename($fileName);
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $currentDate = Util::getCurrentDate();
        $tableName = "art";
    $newFileName = date('YmdHis') . '.' . $fileType;
    $targetFilePath = $targetDir . $newFileName;

   
    $allowTypes = array('jpg', 'jpeg');
    if (in_array($fileType, $allowTypes)) {
        
        if (move_uploaded_file($_FILES['artwork']['tmp_name'], $targetFilePath)) {
            //artist_id	title	description	price	created_at	

            $data = array(
                'artist_id'=>$userid,
                'title'=>$title,
                'description'=>$description,
                'price'=>$price,
                'created_at'=>$currentDate,
                'img'=>$newFileName
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
          
            echo "Failed to upload file.";
        }
    } else {
        // File type not allowed
        echo "Only JPG files are allowed.";
    }
}
?>
