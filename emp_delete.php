<?php 
    function delete_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation()' name='delete'election_id='delete' action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='POST'><input type='hidden' value='".$row_id."' name='row_id'election_id='row_id'><input value='Delete' type='submit' name='delete_button'election_id='delete_button'></form>";
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
<h1 class="div-class" style="color:crimson">Delete Employee Registration Details</h1>
<div class="div-class">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
    $delete_id=$_POST['row_id'];
    $sql = "DELETE FROM employee WHERE employee.election_id ='".$delete_id."'";
    if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green'>Record has been deleted successfully!</span><br>";
    } else {
    echo "<span style='color:red'>Error: " . $sql . "<br>" . $conn->error."</span><br>";
    }
}
?>
<br/>
<?php
echo "<table align='center'>";
echo "<tr><th>Election Id</th><th>Election Role Code</th><th>Emp Id</th><th>CFMS Id</th><th>Name</th><th>Designation</th><th> Scale Of Pay</th><th>Basic Pay</th>
<th>Gazated Status</th><th>DOB</th><th>Age</th><th>Working Mandal Code</th><th>Native Mandal Code</th><th>Residence Mandal Code</th><th>Mobile</th>
<th>Emp Type Code</th><th>Gender Code</th><th>Office Code</th><th>Action</th></tr>";
$sql = "SELECT * FROM employee ORDER BY election_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['election_id']."</td><td>".$row['election_role_code']."</td><td>".$row['emp_id']."</td><td>".$row['cfms_id']."</td><td>".$row['name']."</td><td>".$row['designation']."</td><td>".$row['scale_of_pay']."</td><td>".$row['basic_pay']."</td><td>".$row['gazatted_status']."</td><td>".$row['dob']."</td><td>".$row['age']."</td>
            <td>".$row['working_mandal_code']."</td><td>".$row['native_mandal_code']."</td><td>".$row['residence_mandal_code']."</td><td>".$row['mobile']."</td><td>".$row['emp_type_code']."</td><td>".$row['gender_code']."</td><td>".$row['office_code']."</td><td>".delete_button($row['election_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='5'>(0 Results)</td></tr>";
}
$conn->close();
?>
</body>
</html>
