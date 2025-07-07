<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class" style="color:cyan">Registered Data</h1>
<table align ='center'>
<tr><th>Division ID</th><th>Division Name</th></tr>
<?php
$sql = "SELECT * FROM division ORDER BY division_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row['division_id']."</td><td>".$row['division_name']."</td></tr>";
  $i++;
  }
} else { echo "<tr><td align='center' colspan='3'>(0 Results)</td></tr>"; }
$conn->close();
?>
</body>
</html>
