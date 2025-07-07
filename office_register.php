<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class" style="color:blue">Registration Form</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Office Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="myofficecode"
id="myofficecode"><br><br>
Office Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myofficename" id="myofficename"><br><br>
Dept Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="mydeptcode" id="mydeptcode"><br><br>
Office Type Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="myofficetypecode" id="myofficetypecode"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $myofficecode = test_input($_POST["myofficecode"]);
      $myofficename = test_input($_POST["myofficename"]);
      $mydeptcode = test_input($_POST["mydeptcode"]);
      $myofficetypecode = test_input($_POST["myofficetypecode"]);

      $sql = "INSERT INTO emp_office (office_id, office_code, office_name, dept_code, office_type_code, client_ip_address) VALUES
('','".$myofficecode."','".$myofficename."','".$mydeptcode."','".$myofficetypecode."','".$_SERVER['REMOTE_ADDR']."')";
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