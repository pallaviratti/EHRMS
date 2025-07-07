<?php
    function delete_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation()'
name='delete'office_id='delete'
action='".htmlspecialchars($_SERVER["PHP_SELF"])."'
method='POST'><input type='hidden' value='".$row_id."'
name='row_id'office_id='row_id'><input value='Delete' type='submit'
name='delete_button'office_id='delete_button'></form>";
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
<h1 class="div-class" style="color:blue">Delete Office
Registration Details</h1>
<div class="div-class">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
    $delete_id=$_POST['row_id'];
    $sql = "DELETE FROM emp_office WHERE emp_office.office_id ='".$delete_id."'";
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
echo "<tr><th>Office Id</th><th>Office Code</th><th>Office Name</th><th>Dept Code</th><th>Office Type Code</th><th>Action</th></tr>";
$sql = "SELECT * FROM emp_office ORDER BY office_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['office_id']."</td><td>".$row['office_code']."</td><td>".$row['office_name']."</td><td>".$row['dept_code']."</td><td>".$row['office_type_code']."</td><td>".delete_button($row['office_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='5'>(0 Results)</td></tr>";
}
$conn->close();
?>
</body>
</html>
