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
<form name="register" id="register" onsubmit="return validate(document)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Mandal Code<span class="mandatory">*</span>&nbsp;: <input autocomplete="off" type="number" name="mymandalcode" id="mymandalcode"><br><br>
Mandal Name<span class="mandatory">*</span>&nbsp;: <input autocomplete="off" type="text" name="mymandalname" id="mymandalname"><br><br>
Division Name<span class="mandatory">*</span>&nbsp;: <select autocomplete="off" type="number" name="mydivisioncode" id="mydivisioncode"><br><br>
<?php
$sql = "SELECT * FROM division ORDER BY division_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['division_id'].">".$row['division_name']."</option>";
  }
}
?>
</select><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $mymandalcode = test_input($_POST["mymandalcode"]);
      $mymandalname = test_input($_POST["mymandalname"]);
      $mydivisioncode = test_input($_POST["mydivisioncode"]);
      
      $sql = "INSERT INTO mandal (mandal_id, mandal_code, mandal_name, division_code, client_ip_address) VALUES ('','".$mymandalcode."','".$mymandalname."','".$mydivisioncode."','".$_SERVER['REMOTE_ADDR']."')";
      if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green'>Data has been saved successfully!</span><br>";
      } else {
        echo "<span style='color:red'>Error: " . $sql . "<br>" . $conn->error."</span><br>";
      }
}
?>
<input id="entry_button" name="register_button" type="submit">
</form>
<div>
<br/>
</body>
</html>