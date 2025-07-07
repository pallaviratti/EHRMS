<?php
    function delete_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation()'
name='delete'emp_type_id='delete'
action='".htmlspecialchars($_SERVER["PHP_SELF"])."'
method='POST'><input type='hidden' value='".$row_id."'
name='row_id'emp_type_id='row_id'><input value='Delete' type='submit'
name='delete_button'emp_type_id='delete_button'></form>";
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
<h1 class="div-class" style="color:blue">Delete Employee
Registration Details</h1>
<div class="div-class">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
    $delete_id=$_POST['row_id'];
    $sql = "DELETE FROM emp_type WHERE emp_type.emp_type_id ='".$delete_id."'";
    if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green'>Record has been deleted
successfully!</span><br>";
    } else {
    echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
    }
}
?>
<br/>
<?php
echo "<table align='center'>";
echo "<tr><th>Emp Type Id</th><th>Emp Type Code</th><th>Emp Type Name</th><th>Action</th></tr>";
$sql = "SELECT * FROM emp_type ORDER BY emp_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['emp_type_id']."</td><td>".$row['emp_type_code']."</td><td>".$row['emp_type_name']."</td><td>".delete_button($row['emp_type_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='5'>(0 Results)</td></tr>";
}
$conn->close();
?>
</body>
</html>