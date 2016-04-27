<?php 
  
require 'db.php'; 
$db = new Db(); 
  
// adds new item 
if(isset($_POST['addEntry'])) { 
    $query = "INSERT INTO todo VALUES('', ?, ?,'0')"; 
      
    if($stmt = $db->mysql->prepare($query)) { 
        $stmt->bind_param('ss', $_POST['title'], $_POST['description']); 
        $stmt->execute(); 
        header("location: index.php"); 
    } else die($db->mysql->error); 
}