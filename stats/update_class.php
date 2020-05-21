<?php  
 //fetch.php  
	 $connect = mysqli_connect("localhost", "root", "", "stats"); 
	 
    $id=$_POST['class_id'];
	$class_name=$_POST['class_name'];
	$year=$_POST['year'];
	$term_name=$_POST['term_name'];
	$level=$_POST['level'];
	
	$sql = "UPDATE `classes` 
	SET `class_name`='{$class_name}',
		`class_year`='{$year}',
		`class_term`='{$term_name}',
		`class_level`='{$level}' WHERE class_id=$id";
	
	
	$result = mysqli_query($connect,$sql) or die;

        if($result>0)
               echo "<p class='checkExistance'>Data Exists</p>";
            else
               echo "<p class='checkExistance'>Data doesnt Exist</p>";
 ?>