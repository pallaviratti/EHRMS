<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class" style="color:blue"> Employee Registered Data</h1>
<table align='center'>
<tr><th>Election Id</th><th>Emp
Id</th><th>CFMS Id</th><th>Name</th><th>Designation</th><th>Scale Of
Pay</th><th>Basic Pay</th>
<th>Gazatted Status</th><th>DOB</th><th>Age</th><th>Working Mandal
Code</th><th>Native Mandal Code</th><th>Residence Mandal
Code</th><th>Mobile</th>
<th>Emp Type Code</th><th>Gender Code</th><th>Office Code</th><th>Election Role</th><th>Gender Name</th><th>Working  Mandal Name</th><th>Native Mandal Name</th><th>Residence Mandal Name</th><th>Office Name</th><th>Emp Type Name</th></tr>
<?php
$sql = "SELECT `employee`.`election_id`,
`employee`.`election_role_code`,
`employee`.`emp_id`,
`employee`.`cfms_id`,
`employee`.`name`,
`employee`.`designation`,
`employee`.`scale_of_pay`,
`employee`.`basic_pay`,
`employee`.`gazatted_status`,
`employee`.`dob`,
`employee`.`age`,
`employee`.`working_mandal_code`,
`employee`.`native_mandal_code`,
`employee`.`residence_mandal_code`,
`employee`.`mobile`,
`employee`.`emp_type_code`,
`employee`.`gender_code`,
`employee`.`office_code`,
`election_role`.`election_role`,
`emp_gender`.`gender_name`,
`working_mandal`.`mandal_name` AS `working_mandal_name`,
`native_mandal`.`mandal_name` AS `native_mandal_name`,
`residence_mandal`.`mandal_name` AS `residence_mandal_name`,
`emp_office`.`office_name`,
`emp_type`.`emp_type_name`
 FROM 
 `employee`
  JOIN `election_role` ON `employee`.`election_role_code` = `election_role`.`election_role_id`
  JOIN `emp_gender` ON `employee`.`gender_code` = `emp_gender`.`gender_code`
  JOIN `mandal` AS `working_mandal` ON `employee`.`working_mandal_code` = `working_mandal`.`mandal_code`
  JOIN `mandal` AS `native_mandal` ON `employee`.`native_mandal_code` = `native_mandal`.`mandal_code`
  JOIN `mandal` AS `residence_mandal` ON `employee`.`residence_mandal_code` = `residence_mandal`.`mandal_code`
  JOIN `emp_office` ON `employee`.`office_code` = `emp_office`.`office_code`
  JOIN `emp_type` ON `employee`.`emp_type_code` = `emp_type`.`emp_type_code`";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['election_id']."</td><td>".$row['emp_id']."</td><td>".$row['cfms_id']."</td><td>".$row['name']."</td><td>".$row['designation']."</td><td>".$row['scale_of_pay']."</td><td>".$row['basic_pay']."</td><td>".$row['gazatted_status']."</td><td>".$row['dob']."</td><td>".$row['age']."</td>
    <td>".$row['working_mandal_code']."</td><td>".$row['native_mandal_code']."</td><td>".$row['residence_mandal_code']."</td><td>".$row['mobile']."</td><td>".$row['emp_type_code']."</td><td>".$row['gender_code']."</td><td>".$row['office_code']."</td><td>".$row['election_role']."</td><td>".$row['gender_name']."</td><td>".$row['working_mandal_name']."</td><td>".$row['native_mandal_name']."</td><td>".$row['residence_mandal_name']."</td><td>".$row['office_name']."</td><td>".$row['emp_type_name']."</td></tr>";
  $i++;
  }
} else { echo "<tr><td align='center' colspan='24'>(0 Results)</td></tr>"; }
$conn->close();
?>
</body>
</html>