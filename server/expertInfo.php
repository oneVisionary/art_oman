<?php
include("art_db.php");
$dbConnection = new ArtWork_DbConnection();
$userid = $_GET["userid"];
$cmd = $_GET["cmd"];
if($cmd=="edit"){
    $expert = $dbConnection->getExpertInfo($userid);
    echo json_encode($expert);
}
else if($cmd=="delete") {
    $res = $dbConnection->delete('artist',$userid);
    echo $res;
}
else if($cmd=="viewart") {
    $res = $dbConnection->artworkItems('art',$userid);
    echo $res;
}
else if($cmd=="vieworders") {
    $res = $dbConnection->vieworders($userid);
    echo $res;
}
else if($cmd=="viewarts") {
    $res = $dbConnection->allartworks('art');
    echo $res;
}
else if($cmd=="viewspecificart") {
    $res = $dbConnection->allartworks('art where art_id =');
    echo $res;
}
else if($cmd=="chatsend") {
    $res = $dbConnection->chatMessage('chat');
    echo $res;
}

?>