<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class" style="color:purple">Register Employee Details</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Election Role Name<span class="mandatory">*</span>&nbsp;: <select autocomplete="off" type="number" name="myelectionrolecode" id="myelectionrolecode"><br><br>
<?php
$sql = "SELECT * FROM election_role ORDER BY election_role_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['election_role_code'].">".$row['election_role']."</option>";
  }
}
?>
</select><br><br>
Emp Id<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myempid" id="myempid"><br><br>
CFMS Id<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mycfmsid"
id="mycfmsid"><br><br>
Name<span class="mandatory">*</span>&nbsp;: <input autocomplete="off"
type="text" name="myname" id="myname"><br><br>
Designation<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mydesignation"
id="mydesignation"><br><br>
Scale Of Pay<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myscaleofpay"
id="myscaleofpay"><br><br>
Basic Pay<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mybasicpay"
id="mybasicpay"><br><br>
Gazatted Status<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mygazattedstatus"
id="mygazattedstatus"><br><br>
DOB<span class="mandatory">*</span>&nbsp;: <input autocomplete="off"
type="date" name="mydob" id="mydob"><br><br>
Age<span class="mandatory">*</span>&nbsp;: <input autocomplete="off"
type="number" name="myage" id="myage"><br><br>
Working Mandal Name<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="number" name="myworkingmandalcode"
id="myworkingmandalcode"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['mandal_id'].">".$row['mandal_name']."</option>";
  }
}
?>
</select><br><br>
Native Mandal Name<span class="mandatory">*</span>&nbsp;: <select autocomplete="off" type="number" name="mynativemandalcode" id="mynativemandalcode"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['mandal_id'].">".$row['mandal_name']."</option>";
  }
}
?>
</select><br><br>
Residence Mandal Name<span class="mandatory">*</span>&nbsp;: <select autocomplete="off" type="number" name="myresidencemandalcode" id="myresidencemandalcode"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['mandal_id'].">".$row['mandal_name']."</option>";
  }
}
?>
</select><br><br>
Mobile<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mymobile" id="mymobile"><br><br>
Emp Type Name<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="number" name="myemptypecode"
id="myemptypecode"><br><br>
<?php
$sql = "SELECT * FROM emp_type ORDER BY emp_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['emp_type_id'].">".$row['emp_type_name']."</option>";
  }
}
?>
</select><br><br>
Gender Code<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="text" name="mygendercode"
id="myegendercode"><br><br>
<?php
$sql = "SELECT * FROM emp_gender ORDER BY gender_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['gender_id'].">".$row['gender_name']."</option>";
  }
}
?>
</select><br><br>
Office Code<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="text" name="myofficecode"
id="myofficecode"><br><br>
<?php
$sql = "SELECT * FROM emp_office ORDER BY office_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['office_id'].">".$row['office_name']."</option>";
  }
}
?>
</select><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

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
      $sql = "INSERT INTO employee (election_id, election_role_code,
emp_id, cfms_id, name, designation, scale_of_pay, basic_pay,
gazatted_status, dob, age, working_mandal_code, native_mandal_code,
residence_mandal_code, mobile,  emp_type_code, gender_code, office_code, client_ip_address) VALUES
('','".$myelectionrolecode."','".$myempid."','".$mycfmsid."','".$myname."','".$mydesignation."','".$myscaleofpay."','".$mybasicpay."','".$mygazattedstatus."','".$mydob."','".$myage."','".$myworkingmandalcode."','".$mynativemandalcode."','".$myresidencemandalcode."','".$mymobile."','".$myemptypecode."','".$mygendercode."','".$myofficecode."','".$_SERVER['REMOTE_ADDR']."')";
      if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green'>Data has been saved
successfully!</span><br>";
      } else {
        echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
      }
}
?>
<input id="entry_button" name="register_button" type="submit">
</form>
<div>
<br/>
</body>
</html>