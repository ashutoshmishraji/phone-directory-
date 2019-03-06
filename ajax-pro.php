<?php 

include 'config.php';

// Submit Entry SQL

if(isset($_POST["submit_phone_directory"]))
{
  
  $duplicate_error=0;

  $name=test_input_1($_POST["name"]);
  $phone_number=test_input_1($_POST["phone_number"]);

  $sql="SELECT * FROM phone_directory WHERE name='$name' AND phone_number='$phone_number' AND deleted='0'";
  $result=$conn->query($sql);
  if($result->num_rows > 0)
  {
    $duplicate_error=1;
  }

  if($duplicate_error==0)
  {
    $stmt = $conn->prepare("INSERT INTO phone_directory (name,phone_number) VALUES (?,?)");
    $stmt->bind_param("ss", $name,$phone_number);
    $stmt->execute();
    $User_Message="<span>Added Successfully!</span>";
    $User_Message_toast= "green";
  }
  else
  {
    $User_Message="<span>Already Added!</span>";
    $User_Message_toast= "red";
  }
  
  

     
}

if(isset($_POST["phone_directory_record_delete"]))
{
    $id=$_POST["id"];
  
      $sql = "UPDATE phone_directory SET deleted=1 WHERE id=$id";
     if ($conn->query($sql) === TRUE) 
        {
          $User_Message= "<scan>Delete successfully<span>";
          $User_Message_toast= "green";
        }
        else
        {
          $User_Message= "<scan>Error updating record: " . $conn->error."<span>";
          $User_Message_toast= "red";
        }
}


if(!empty($User_Message))
{

if($User_Message_toast=='red')
{
  echo '<div id="toast" style="background-color:red;">'.$User_Message.'</div>';
}
else
{
  echo '<div id="toast" style="background-color:green;">'.$User_Message.'</div>';
}


}


function test_input_1($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function test_input_2($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data=str_replace ("'","\'",$data);
  return $data;
}

function test_input_3($data) {
  $data=str_replace ("'","\'",$data);
  return $data;
}

 
?>

<?php 

$sql_phone_directory = "SELECT * FROM phone_directory WHERE deleted=0";    
$result_phone_directory=$conn->query($sql_phone_directory);


if($result_phone_directory->num_rows > 0)
{

?>


  <table class="w3-table w3-striped w3-bordered w3-border w3-border-round-large w3-white w3-table-all w3-small">
    <tr style="background-color:#003c74; color:white;">
      <th>S No.</th>
      <th>Name</th>
      <th>Phone Number</th>
      <th>Actions</th>
    </tr>


<?php

$s_no=1;

while($row_phone_directory = $result_phone_directory->fetch_assoc())
    {
        $id=$row_phone_directory['id'];
        $name=$row_phone_directory['name'];
        $phone_number=$row_phone_directory['phone_number'];
  
?>

    <tr>
      <td><?php echo  $s_no; ?></td>
      <td><?php echo  $name; ?></td>
      <td><?php echo  $phone_number; ?></td>
      <td>
        <div style="display:inline;" class="delete">
        <button class="fa fa-trash-o w3-button w3-text-red w3-large delete_phone_directory_record" id="<?php echo  $id; ?>"></button>
        </div>
      </td>
    </tr>

 <?php

$s_no++;
  } 

  ?>   

  </table>


<?php

}
else
{
    echo "No record Found";
}

?>

<script>
  var x = document.getElementById("toast");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
</script>

<script>
$(document).ready(function(){
    $("button.delete_phone_directory_record").click(function(){
        if(confirm("Are you sure you want to delete?")==true)
        {
        
        var phone_directory_record_delete=" ";
        var value=$(this).attr("id");
                $.post("ajax-pro.php",
        {
            id:value,
            phone_directory_record_delete:phone_directory_record_delete
        },
        function(data)
        {
           $("#phone_directory_toast_message").html(data);
  
        }
        );
        
        }
        
    });
});
</script>