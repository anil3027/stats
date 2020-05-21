

<?php  

 $connect = mysqli_connect("localhost", "root", "", "stats");  
 $sql = "SELECT classes.class_id,classes.class_name, classes.class_year,classes.class_term,classes.class_level FROM classes 
         WHERE (class_year = '".$_POST["class_year"]."') 
        AND (class_term = '".$_POST["class_term"]."') ORDER BY class_name,class_level ASC";  

          $result = mysqli_query( $connect, $sql);
          if(isset($_POST["class_year"]) || isset($_POST['class_term']))   {
          while($row = $result->fetch_assoc()) {
             

      ?> 
        
        <tr id="<?=$row['class_id'];?>">
            <td><?=$row['class_name'];?></td>
            <td><?=$row['class_year'];?></td>
            <td><?=$row['class_term'];?></td>
            <td><?=$row['class_level'];?></td>
            <td align="center"> 
            
            <button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#edit_class" data-dismiss="modal"
		         data-class_id="<?=$row['class_id'];?>"
             data-class_name="<?=$row['class_name'];?>"
             data-year="<?=$row['class_year'];?>"
             data-term_name="<?=$row['class_term'];?>"
             data-level="<?=$row['class_level'];?>"
             >Edit</button>
            <button class="btn btn-danger btn-sm delete" >Delete</button>
            </td>
        </tr>
          
<?php	
	}
  }

	else {
		echo "<tr >
		<td colspan='5'>No Result found !</td>
		</tr>";
	}
  mysqli_close($connect);

?>

 
 
 <script type="text/javascript">
 $(document).ready(function(){
    $(".delete").click(function(){
      
  var id = $(this).parents("tr").attr("id");

        
        
        if(confirm('Are you sure to remove  this record?'))
        { 
            $.ajax({
               url: "delete_class.php",
               type: "GET",
               data: {id: id},
             error: function() {
                 alert('Something is wrong');
              },
               success: function(data) {
                Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Deleting Class',
                            showConfirmButton: false,
                            timer: 1500
                               });
                    $("#"+id).remove();
 
                      
               }
            });
        }
    });

    
   

  });
</script>

