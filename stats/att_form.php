

<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "stats");  
 $output = '';  
 if(isset($_POST["att_form_year"]) || isset($_POST['att_form_term']))  
 {
      {  
        $sql = "SELECT classes.class_id,classes.class_name FROM classes 
         WHERE (class_year = '".$_POST["att_form_year"]."') 
         AND (class_term = '".$_POST["att_form_term"]."') ORDER BY class_name,class_level ASC"; 
      }  

      $output .= '
      
      <tr align="center">
       <th rowspan="2">CLASS NAME</th>
       
       <th colspan="2">  <input type="checkbox" id="chkddl" onclick="Enableddl(this)"/> AM </th>
       <th colspan="2"> <input type="checkbox" onclick="Enabled(this)"/> PM</th>
      <tr>
       
       <tr align="center">
       
       <th>BOYS</th>
       <th>GIRLS</th>
       <th>BOYS</th>
       <th>GIRLS</th>
       
   </tr>'; 


      $result = mysqli_query( $connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  

        $output .= '
        <tr id="'.$row["class_id"].'" >
        <td>'.$row["class_name"].'</td>
        <td ><select class="mySelect 1-50 form-control" disabled="disabled"   required="true" >  <option   value="" >0</option></select>  </td>
        <td ><select  class="1-50 form-control" required="true" >  <option value=""  >0</option></select>  </td>
        <td ><select    class="1-50 form-control" required="true" >  <option value="" >0</option></select>  </td>
        <td ><select    class="1-50 form-control" required="true" >  <option value="" >0</option></select>  </td>
        
        
    </tr>'; 

    $output .= '
    <tr> 
    <td></td>
    </tr>'; 
      
}


echo $output;
            }
             else
            {
            echo 'Data Not Found';
             }

 ?>  





<!-----------------this get the number in the select ---------------------------->
<script>
$(function(){
    var $select = $(".1-50");
    
    for (i=1;i<=50;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});
</script>






<!-------------------------this script disable enable the coloumn--------------------->
<script>
function Enableddl(chkddl) {
  var ddl=document.getElementsByClassName("mySelect")[2];
 
  ddl.disabled=chkddl.checked ? false:true;
  if(!ddl.disabled){
    ddl.focus(this);
  }
}

</script>





