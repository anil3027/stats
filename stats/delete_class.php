<?php

$connect = mysqli_connect("localhost", "root", "", "stats");  

if(isset($_GET['id']))
{
     $sql = "DELETE FROM classes WHERE class_id=".$_GET['id'];
     $connect->query($sql);
   echo 'Deleted successfully.';
   header('location:main.php#myModal2');
} else{
   echo "error from delete class.php";
}

?>