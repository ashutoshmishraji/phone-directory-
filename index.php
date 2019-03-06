<?php 

include 'config.php';
 
?>

<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
a
{
    text-decoration:none;
}
</style>

<style>
#toast {
  visibility: hidden;
  min-width: 200px;
  margin-left: -125px;
  color:white;
  text-align: center;
  border-radius: 8px;
  border-color: #dddddd;
  border-style: solid;
  border-width: 2px;
  padding: 8px;
  position: fixed;
  z-index: 1;
  right: 50px;
  bottom: 30px;
  font-size: 17px;
}

#toast.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>
<style>
.printbox 
    {border-width:thick 30px;
	border-style: solid; 
    background-color:#fff;
    line-height: 2;color:#6E6A6B;font-size: 14pt;
	text-align:left;
	float: middle;
    border: 3px  white;
	width:40%;
     height:2em; 
     margin:10%;
	 display:inline;
}

</style>
<body class="w3-theme-l5">

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px; min-height:600px;">    
  <!-- The Grid -->
  <div class="w3-row">
    
    <!-- Middle Column -->
    <div class="w3-col l12 m12 s12">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
             
             
  <h4 class="w3-center w3-container" style="color:#337ab7; font-family: 'Montserrat', sans-serif; margin-top: 20px; margin-bottom: 30px; line-height: 1.2; font-size: 28px;">Phone Directory</h4>
<div class="w3-container" style="margin-bottom: 30px;">
  
  <button class="w3-btn w3-round-large w3-text-white w3-right w3-card w3-blue" onclick="add_new_phone_directory()">Add New</button>
  

  
  
</div>


 <div class="w3-container">  
    <div class="w3-responsive" id="phone_directory_toast_message">
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
echo 'No record Found';

?>  

</div>
</div>

<br>

<!-- Add New Employee -->
<div id="add_new_phone_directory_id" class="w3-modal w3-round-large">
    <div class="w3-modal-content w3-animate-bottom w3-card-4 w3-round-large"  style="max-width: 700px;">
      <header class="w3-container w3-small" style="color: white; border-radius: 5px 8px 0px 0px; background: -webkit-linear-gradient(left, #435280, #002769);"> 
        <span onclick="document.getElementById('add_new_phone_directory_id').style.display='none'" 
        class="w3-button w3-display-topright w3-small" >&times; Close</span>
        <h3 class="w3-center" style="font-size: 12px;">Add Details</h3>
      </header>
      

<div class="w3-container w3-round-large" style="background-color:#f5f5f5;">

  <div class="w3-container w3-small" style="margin-top: 30px;">
  <div class="w3-row-padding" style="margin-bottom: 12px;">

  <p class="w3-col l6 m6 s12">
  <label style="color: black;">Name</label>
  <input class="w3-input" name="name" type="text" id="phone_directory_name" required></p>
 
  
    <p class="w3-col l6 m6 s12">
  <label style="color: black;">Phone Number</label>
 
  <input class="w3-input" name="phone_number" type="text" id="phone_directory_phone_number" required></p>
     <div  class="printbox"id="printphone_directory_name" ></div>
<div class="printbox" id="printphone_directory_phone_number" ></div>


<script>
var inputBox1 = document.getElementById('phone_directory_name');

inputBox1.onkeyup = function(){
    document.getElementById('printphone_directory_name').innerHTML = inputBox1.value;
};
var inputBox2 = document.getElementById('phone_directory_phone_number');

inputBox2.onkeyup = function(){
    document.getElementById('printphone_directory_phone_number').innerHTML = inputBox2.value;
};
</script>
    <p class="w3-col l12 m12 s12">
  <button name="submit_phone_directory" class="submit_phone_directory_id w3-btn w3-round-large w3-blue-gray">Submit</button></p>

</div>

</div>

</div>
      
    </div>
  </div>
             
             
             
            </div>
          </div>
        </div>
      </div>

      
    <!-- End Middle Column -->
    </div>
    
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>
<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
 
</footer>

  <!-- Message Show in Toast -->


<?php
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

?>

<script>
$(document).ready(function(){
    $("button.submit_phone_directory_id").click(function(){
        var submit_phone_directory=" ";
        var name=$('#phone_directory_name').val();
        var phone_number=$('#phone_directory_phone_number').val();
        $.post("ajax-pro.php",
        {
            name:name,
            phone_number:phone_number,
            submit_phone_directory:submit_phone_directory
        },
        function(data)
        {
            document.getElementById('add_new_phone_directory_id').style.display='none';
           $("#phone_directory_toast_message").html(data);
  
        }
        );
        
    });
});
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
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}



// Dropdown Side Menu
function dropDownSideMenu(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-hide") == -1) {
    x.className += " w3-hide";
  } else { 
    x.className = x.className.replace("w3-hide", "");

  }
}

</script>

<script>
  var x = document.getElementById("toast");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
</script>

<script>
function confirmDelete(){
   return confirm("Are you sure you want to delete?");
}
</script>

<script>
function add_new_phone_directory()
{
   document.getElementById('add_new_phone_directory_id').style.display='block';  
}
</script>


<script>
  var x = document.getElementById("toast");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
</script>

<?php 
$conn->close();
?>

</body>
</html> 
