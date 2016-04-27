<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="css/default.css" /> 
    <title>My To-Do List</title> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/scripts.js"></script>
    <style>
    body {
    	background-color: #E3E7EA;
    }
    a {
    	text-decoration: none;
    }
    a:hover {
    	text-decoration: none;
    }
    li {
    	display: inline;
    }
    </style>
</head> 
  
<body> 
  
<div id="container"> 
      
<h1 style="text-align: center; font-family: 'Open Sans', sans-serif">My to-Do List</h1> 
  
<ul id="tabs">
    <li id="todo_tab" class="selected"><a href="#"><h2 style="padding-top: 30px;">To-Do</h2></a></li>        
</ul> 
  
<div id="main" style="padding-left: 30px;"> 
      
<div id="todo"> 
  
<?php 
require 'db.php'; 
$db = new Db(); 
$query = "SELECT * FROM todo ORDER BY id asc"; 
$results = $db->mysql->query($query); 
  
if($results->num_rows) { 
    while($row = $results->fetch_object()) { 
        $title = $row->title; 
        $description = $row->description; 
        $id = $row->id;
		$done = $row->done;
		echo $done;
		if($done==1){
			$mark="done";
		}
		else{
			$mark="not done";
		}
		
echo '<div class="item">'; 
  
$data = <<< EOD
<h4> $title </h4>
<p> $description </p> 
<p> $mark </p>
  
<input type="hidden" name="id" id="id" value="$id" /> 
  
<div class="options"> 
    <a class="deleteEntryAnchor" href="delete.php?id=$id"><button type="button" class="btn btn-danger btn-sm">Delete</button></a> 
    <a class="editEntry" href="markItDone.php?id=$id"><button type="button" class="btn btn-success btn-sm">Mark it Done</button></a> 
</div>
EOD;
echo $data; 
echo '</div>'; 
    } // end while 
} else { 
    echo "<p>There are zero items. Add one now!</p>"; 
} 
?> 
</div><!--end todo wrap--> 
  
<div id="addNewEntry"> 
  
<hr /> 
<h2 style="text-align: center; padding-top: 30px; font-family: 'Open Sans', sans-serif;">Add New Entry</h2> 
<form action="addItem.php" method="post" style="padding-top: 30px;"> 
    <p> 
        <label for="title"> Title</label> 
        <input type="text" name="title" id="title" class="input"/> 
    </p> 
  
    <p> 
        <label for="description"> Description</label>
		<textarea name="description" id="description" rows="10" cols="35"></textarea>
        		
    </p>   
      
    <p> 
        <input type="submit" name="addEntry" id="addEntry" value="Add New Entry" /> 
    </p>
	
</form> 
  
</div><!-- end add new entry -->
  
</div><!-- end main--> 
</div><!--end container--> 
  
</body> 
</html>