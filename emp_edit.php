<?php
$id="";
$myelectionrolecode="";
$myempid="";
$mycfmsid="";
$myname="";
$mydesignation="";
$myscaleofpay="";
$mybasicpay="";
$mygazattedstatus="";
$mydob="";
$myage="";
$myworkingmandalcode="";
$mynativemandalcode="";
$myresidencemandalcode="";
$mymobile="";
$myemptypecode="";
$mygendercode="";
$myofficecode="";
    function edit_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation1()' name='edit' id='edit'
action='".htmlspecialchars($_SERVER["PHP_SELF"])."'
method='POST'><input type='hidden' value='".$row_id."' name='row_id'
id='row_id'><input value='Edit' type='submit' name='edit_button'
id='edit_button'></form>";
        return $btn;
    }
?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class" style="color:blue">Edit Registration</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM employee WHERE election_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['election_id'];
        $myelectionrolecode=$row['election_role_code'];
        $myempid=$row['emp_id'];
        $mycfmsid=$row['cfms_id'];
        $myname=$row['name'];
        $mydesignation=$row['designation'];
        $myscaleofpay=$row['scale_of_pay'];
        $mybasicpay=$row['basic_pay'];
        $mygazattedstatus=$row['gazatted_status'];
        $mydob=$row['dob'];
        $myage=$row['age'];
        $myworkingmandalcode=$row['working_mandal_code'];
        $mynativemandalcode=$row['native_mandal_code'];
        $myresidencemandalcode=$row['residence_mandal_code'];
        $myemptypecode=$row['emp_type_code'];
        $mygendercode=$row['gender_code'];
        $myofficecode=$row['office_code'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id"><br><br>
Election Role Name<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="number" name="myelectionrolecode"
id="myelectionrolecode"
value="<?php echo $myelectionrolecode; ?>"><br><br>

<?php
$sql = "SELECT * FROM election_role ORDER BY election_role_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['election_role_id']==$myelectionrolecode)
        {echo "<option value=".$row['election_role_id']." selected>".$row['election_role']."</option>";}
    else
        {echo "<option value=".$row['election_role_id'].">".$row['election_role']."</option>";}
    
  }
}
?>
</select><br><br>
Emp Id<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myempid" id="myempid"
value="<?php echo $myempid; ?>"><br><br>
CFMS Id<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mycfmsid" id="mycfmsid"
value="<?php echo $mycfmsid; ?>"><br><br>
Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myname" id="myname"
value="<?php echo $myname; ?>"><br><br>
Designation<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="mydesignation"
id="mydesignation" value="<?php echo $mydesignation; ?>"><br><br>
Scale Of Pay<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="myscaleofpay"
id="myscaleofpay" value="<?php echo $myscaleofpay; ?>"><br><br>
Basic Pay<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="mybasicpay"
id="mybasicpay" value="<?php echo $mybasicpay; ?>"><br><br>
Gazatted Status<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="mygazattedstatus"
id="mygazattedstatus" value="<?php echo $mygazattedstatus; ?>"><br><br>
DOB<span class="mandatory">*</span>:<input
autocomplete="off" type="date" name="mydob"
id="mydob" value="<?php echo $mydob; ?>"><br><br>
Age<span class="mandatory">*</span>:<input
autocomplete="off" type="number" name="myage"
id="myage" value="<?php echo $myage; ?>"><br><br>
Working Mandal Name<span class="mandatory">*</span>:<select
autocomplete="off" type="text" name="myworkingmandalcode"
id="myworkingmandalcode" value="<?php echo $myworkingmandalcode; ?>"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['mandal_id']==$myworkingmandalcode)
        {echo "<option value=".$row['mandal_id']." selected>".$row['mandal_name']."</option>";}
    else
        {echo "<option value=".$row['mandal_id'].">".$row['mandal_name']."</option>";}
    
  }
}
?>
</select><br><br>
Native Mandal Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="mynativemandalcode"
id="mynativemandalcode" value="<?php echo $mynativemandalcode; ?>"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['mandal_id']==$mynativemandalcode)
        {echo "<option value=".$row['mandal_id']." selected>".$row['mandal_name']."</option>";}
    else
        {echo "<option value=".$row['mandal_id'].">".$row['mandal_name']."</option>";}
    
  }
}
?>
</select><br><br>
Residence Mandal Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="myresidencemandalcode"
id="myresidencemandalcode" value="<?php echo $myresidencemandalcode;
?>"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['mandal_id']==$myresidencemandalcode)
        {echo "<option value=".$row['mandal_id']." selected>".$row['mandal_name']."</option>";}
    else
        {echo "<option value=".$row['mandal_id'].">".$row['mandal_name']."</option>";}
    
  }
}
?>
</select><br><br>
Mobile<span class="mandatory">*</span>:<input
autocomplete="off" type="number" name="mymobile"
id="mymobile" value="<?php echo $mymobile; ?>"><br><br>
Emp Type Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="myemptypecode"
id="myemptypecode" value="<?php echo $myemptypecode; ?>"><br><br>
<?php
$sql = "SELECT * FROM emp_type ORDER BY emp_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['emp_type_id']==$myemptypeid)
        {echo "<option value=".$row['emp_type_id']." selected>".$row['emp_type_name']."</option>";}
    else
        {echo "<option value=".$row['emp_type_id'].">".$row['emp_type_name']."</option>";}
    
  }
}
?>
</select><br><br>
Gender Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="mygendercode"
id="mygendercode" value="<?php echo $mygendercode; ?>"><br><br>
<?php
$sql = "SELECT * FROM emp_gender ORDER BY gender_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['gender_id']==$mygendercode)
        {echo "<option value=".$row['gender_id']." selected>".$row['gender_name']."</option>";}
    else
        {echo "<option value=".$row['gender_id'].">".$row['gender_name']."</option>";}
    
  }
}
?>
</select><br><br>
Office Code<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="myofficecode"
id="myofficecode" value="<?php echo $myofficecode; ?>"><br><br>
<?php
$sql = "SELECT * FROM emp_office ORDER BY office_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['office_id']==$myofficecode)
        {echo "<option value=".$row['office_id']." selected>".$row['office_name']."</option>";}
    else
        {echo "<option value=".$row['office_id'].">".$row['office_name']."</option>";}
    
  }
}
?>
</select><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $myelectionrolecode = test_input($_POST["myelectionrolecode"]);
    $myempid = test_input($_POST["myempid"]);
    $mycfmsid = test_input($_POST["mycfmsid"]);
    $myname = test_input($_POST["myname"]);
    $mydesignation = test_input($_POST["mydesignation"]);
    $myscaleofpay = test_input($_POST["myscaleofpay"]);
    $mybasicpay = test_input($_POST["mybasicpay"]);
    $mygazattedstatus = test_input($_POST["mygazattedstatus"]);
    $mydob = test_input($_POST["mydob"]);
    $myage = test_input($_POST["myage"]);
    $myworkingmandalcode = test_input($_POST["myworkingmandalcode"]);
    $mynativemandalcode = test_input($_POST["mynativemandalcode"]);
    $myresidencemandalcode = test_input($_POST["myresidencemandalcode"]);
    $mymobile = test_input($_POST["mymobile"]);
    $myemptypecode = test_input($_POST["myemptypecode"]);
    $mygendercode = test_input($_POST["mygendercode"]);
    $myofficecode = test_input($_POST["myofficecode"]);

    $sql = "UPDATE employee SET election_id = '".$id."',
    election_role_code = '".$myelectionrolecode."', emp_id = '".$myempid."',
    cfms_id = '".$mycfmsid."', name = '".$myname."', designation =
'".$mydesignation."', scale_of_pay = '".$myscaleofpay."', basic_pay =
'".$mybasicpay."', gazatted_status = '".$mygazattedstatus."', dob =
'".$mydob."', age = '".$myage."', working_mandal_code =
'".$myworkingmandalcode."', native_mandal_code =
'".$mynativemandalcode."', residence_mandal_code =
'".$myresidencemandalcode."', mobile = '".$mymobile."',  emp_type_code =
'".$myemptypecode."', gender_code = '".$mygendercode."',  office_code
= '".$myofficecode."'WHERE employee.election_id ='".$id."'";
    if ($conn->query($sql) === TRUE) {
      echo "<span style='color:green'>Data has been updated
successfully!</span><br>";
    } else {
      echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
    }
}
?>

<input id="update_button" name="update_button" type="submit" value="Update">
</form>
<div>
<br/>

<?php
echo "<table align='center'>";
echo "<tr><th>Election Id<th>Election Role Code
</th><th>Emp Id</th><th>CFMS
Id</th><th>Name</th><th>Designation</th><th>Scale Of Pay</th><th>Basic
Pay</th><th>Gazatted Status</th><th>DOB</th><th>Age</th><th>Working
Mandal Code</th><th>Native Mandal Code</th><th>Residence Mandal
Code</th><th>Mobile</th><th>Emp Type Code</th><th>Gender
Code</th><th>Office Code</th><th>Action</th></tr>";
$sql = "SELECT * FROM employee ORDER BY election_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['election_id']."</td><td>".$row['election_role_code']."</td><td>".$row['emp_id']."</td><td>".$row['cfms_id']."</td><td>".$row['name']."</td><td>".$row['designation']."</td><td>".$row['scale_of_pay']."</td><td>".$row['basic_pay']."</td><td>".$row['gazatted_status']."</td><td>".$row['dob']."</td><td>".$row['age']."</td><td>".$row['working_mandal_code']."</td><td>".$row['native_mandal_code']."</td><td>".$row['residence_mandal_code']."</td><td>".$row['mobile']."</td><td>".$row['emp_type_code']."</td><td>".$row['gender_code']."</td><td>".$row['office_code']."</td><td>".edit_button($row['election_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='22'>(0 Results)</td></tr>";
}
$conn->close();
?>
</body>
</html>