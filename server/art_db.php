<?php

class ArtWork_DbConnection{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct(){
        $this->servername="localhost";
        $this->username="root";
        $this->password="";
        $this->dbname="art_oman";
        $this->connect();
       
    }
    public function connect(){
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($this->conn->connect_error){
            die ("connection failed".$this->conn->connect_error);
        }
        //echo "Database connected successfully";
    }
    public function getConnection(){
        return $this->conn;
    }
    public function insert_data($table, $data){
        $columns = implode(",",array_keys($data));
        $values = implode("','",array_values($data));
        $sql = "insert into $table ($columns) values('$values')";
        //echo $sql;
        if($this->conn->query($sql)==TRUE){
            echo "New Record inserted successfully";
        }
        else{
            echo "Error".$sql."<br>".$this->conn->error;
        }
        
    }
    public function update_data($table, $data, $condition){
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ', ');
        $condition_set ='';
        foreach($condition as $key=>$value){
            $condition_set .="$key='$value'";
        }
        $condition_set = rtrim($condition_set, ', ');
        $sql = "update $table set $set where $condition_set";
        //echo $sql;
        if($this->conn->query($sql)==TRUE){
            echo " Record Updated successfully";
        }
        else{
            echo "Error".$sql."<br>".$this->conn->error;
        }
    }
    public function delete($table, $condition) {
        $sql = "DELETE FROM $table WHERE id=$condition";
        if ($this->conn->query($sql) === TRUE) {
            return json_encode(array("message"=>"Deleted successfully"));
            
        } else {
            return json_encode(array("message"=>"Error: " . $sql . "<br>" . $this->conn->error));
            
        }
        
        
    }
    public function deleteart($table, $condition) {
        $sql = "DELETE FROM $table WHERE art_id=$condition";
       // echo $sql;
        if ($this->conn->query($sql) === TRUE) {
            return json_encode(array("message"=>"Deleted successfully"));
            
        } else {
            return json_encode(array("message"=>"Error: " . $sql . "<br>" . $this->conn->error));
            
        }
        
        
    }
    public function isUserExist($table,$userData){
        $email = $userData['email'];
        $password = $userData['password'];
        $sql = "select * from $table where email ='$email' && password='$password '";
        $result = $this->conn->query($sql);
        if($result && $result->num_rows>0){
            $userInfo = $result ->fetch_assoc();
            return json_encode($userInfo);
        }
        else{
            return json_encode(array("error"=>"User Not found"));
        }
    }
    public function getExpertList(){
        $sql = "select * from artist where mode='EA'";
        $result = $this->conn->query($sql);
        $expertList = [];
        while($row=$result->fetch_assoc()){
            $expertList[] =$row;
        }
        return $expertList;
        
    }
    public function getArtistList(){
        $sql = "select * from artist where mode='NA'";
        $result = $this->conn->query($sql);
        $expertList = [];
        while($row=$result->fetch_assoc()){
            $expertList[] =$row;
        }
        return $expertList;
        
    }
    public function getartistChatList($expertid){
        $sql = "select * from chat inner join artist on artist.id= chat.sendby where sendto=$expertid";
       // echo $sql;
        $result = $this->conn->query($sql);
        $expertList = [];
        while($row=$result->fetch_assoc()){
            $expertList[] =$row;
        }
        return $expertList;
        
    }
    public function artworkItems($table,$userid){
        $sql = "select * from $table where artist_id=$userid";
        $result = $this->conn->query($sql);
        $artworks = [];
        if($result && $result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $artworks[] =$row;
            }
            return json_encode($artworks);
        }
        else{
            return json_encode(array("error"=>"Art Not found","userid"=>$userid));
        }
      
        
    }
    public function vieworders($userid){
        $sql = "select * from artorders inner join art on art.art_id =artorders.art_id where artorders.new_artist_id=$userid";
        //echo $sql;
        $result = $this->conn->query($sql);
        $artworks = [];
        if($result && $result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $artworks[] =$row;
            }
            return json_encode($artworks);
        }
        else{
            return json_encode(array("error"=>"Art Not found","userid"=>$userid));
        }
      
        
    }
    public function allartworks($table){
        $sql = "select * from $table";
        $result = $this->conn->query($sql);
        $artworks = [];
        if($result && $result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $artworks[] =$row;
            }
            return json_encode($artworks);
        }
        else{
            return json_encode(array("error"=>"Art Not found","userid"=>$userid));
        }
      
        
    }

    public function getChatHistory($userid, $expertid){
        $sql = "SELECT * FROM chat WHERE (sendby = $userid AND sendto = $expertid) OR (sendto = $userid AND sendby = $expertid)";

        
        //echo $sql;
        $result = $this->conn->query($sql);
        $artworks = [];
        if($result && $result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $artworks[] =$row;
            }
            return json_encode($artworks);
        }
        else{
            return json_encode(array("error"=>"Art Not found","userid"=>$userid));
        }
      
        
    }
    
    public function getExpertInfo($userid){
        $sql = "select * from artist where id=$userid";
        $result = $this->conn->query($sql);
        if($result && $result->num_rows>0){
            $userInfo = $result ->fetch_assoc();
            return json_encode($userInfo);
        }
        else{
            return json_encode(array("error"=>"User Not found"));
        }
        
    }
    public function getArtInfo($userid){
        $sql = "select * from art where art_id=$userid";
        $result = $this->conn->query($sql);
        if($result && $result->num_rows>0){
            $userInfo = $result ->fetch_assoc();
            return json_encode($userInfo);
        }
        else{
            return json_encode(array("error"=>"Art Not found"));
        }
        
    }
}
?>