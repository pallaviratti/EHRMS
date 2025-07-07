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
Emp Type Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="myemptypecode"
id="myemptypecode"><br><br>
Emp Type Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myemptypename" id="myemptypename"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $myemptypecode = test_input($_POST["myemptypecode"]);
      $myemptypename = test_input($_POST["myemptypename"]);

      $sql = "INSERT INTO emp_type (emp_type_id , emp_type_code, emp_type_name) VALUES
('','".$myemptypecode."','".$myemptypename."')";
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