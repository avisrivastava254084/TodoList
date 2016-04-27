<?php
$id=$_GET['id'];
mysql_connect("localhost","root",'');
mysql_select_db("db");
$response2=mysql_query("update todo set done=1 where id='$id' ");
header("Location: index.php");