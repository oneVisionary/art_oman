<?php
include("art_db.php");
include("util.php");
$dbConnection = new ArtWork_DbConnection();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $where = array('art_id' => $id);
    $tableName ="art";
    
    $data = array(
      
        'title'=>$title,
        'description'=>$description,
        'price'=>$price,
        
    );
    $response = $dbConnection->update_data($tableName, $data, $where);
    echo $response;
   
}
?>
