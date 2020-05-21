<?php
//insert.php;

if(isset($_POST["class_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=stats", "root", "");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["class_name"]); $count++)
 {  
  $query = "INSERT INTO classes 
  (create_id, class_name, class_year, class_term, class_level) 
  VALUES (:order_id, :class_name, :class_year, :class_term, :class_level)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':class_name'  => $_POST["class_name"][$count], 
    ':class_year' => $_POST["class_year"][$count], 
    ':class_term'  => $_POST["class_term"][$count],
    ':class_level'  => $_POST["class_level"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>