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
Election Role Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="myelectionrolecode"
id="myelectionrolecode"><br><br>
Election Role<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myelectionrole" id="myelectionrole"><br><br>
Detailed Election Role<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mydetailedelectionrole" id="mydetailedelectionrole"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $myelectionrolecode = test_input($_POST["myelectionrolecode"]);
      $myelectionrole = test_input($_POST["myelectionrole"]);
      $mydetailedelectionrole = test_input($_POST["mydetailedelectionrole"]);

      $sql = "INSERT INTO election_role (election_role_id, election_role_code, election_role, detailed_election_role, client_ip_address) VALUES
('','".$myelectionrolecode."','".$myelectionrole."','".$mydetailedelectionrole."','".$_SERVER['REMOTE_ADDR']."')";
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