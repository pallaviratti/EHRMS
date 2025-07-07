<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class" style="color:blue"> Office Registered Data</h1>
<table align='center'>
<tr><th>Office Id<th>Office Code</th><th>Office Name</th><th>Dept Code</th><th>Oficce Type Code</tr>
<?php
$sql = "SELECT * FROM emp_office ORDER BY office_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['office_id']."</td><td>".$row['office_code']."</td><td>".$row['office_name']."</td><td>".$row['dept_code']."</td><td>".$row['office_type_code']."</td></tr>";
  $i++;
  }
} else { echo "<tr><td align='center' colspan='4'>(0 Results)</td></tr>"; }
$conn->close();
?>
</body>
</html>