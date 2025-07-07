<?php
$id="";
$myemptypecode="";
$myemptypename="";
    function edit_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation1()' name='edit' id='edit'
action='".htmlspecialchars($_SERVER["PHP_SELF"])."'
method='POST'><input type='hidden' value='".$row_id."' name='row_id'
id='row_id'><input value='Edit' type='submit' name='edit_button'
id='edit_button'></form>";
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
<h1 class="div-class" style="color:blue">Edit Registration</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM emp_type WHERE emp_type_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['emp_type_id'];
        $myemptypecode=$row['emp_type_code'];
        $myemptypename=$row['emp_type_name'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
Emp Type Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="myemptypecode"
id="myemptypecode" value="<?php echo $myemptypecode; ?>"><br><br>
Emp Type Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myemptypename" id="myemptypename" value="<?php echo $myemptypename; ?>"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $myemptypename = test_input($_POST["myemptypecode"]);
    $myemptypename = test_input($_POST["myemptypename"]);

    $sql = "UPDATE emp_type SET emp_type_code = '".$myemptypecode."',
    emp_type_name = '".$myemptypename."'WHERE emp_type.emp_type_id ='".$id."'";
    if ($conn->query($sql) === TRUE) {
      echo "<span style='color:green'>Data has been updated
successfully!</span><br>";
    } else {
      echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
    }
}
?>

<input id="update_button" name="update_button" type="submit" value="Update">
</form>
<div>
<br/>

<?php
echo "<table align='center'>";
echo "<tr><th>Emp Type Id<th>Emp Type Code
</th><th>Emp Type Name</th><th>Action</th></tr>";
$sql = "SELECT * FROM emp_type ORDER BY emp_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['emp_type_id']."</td><td>".$row['emp_type_code']."</td><td>".$row['emp_type_name']."</td><td>".edit_button($row['emp_type_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='22'>(0 Results)</td></tr>";
}
$conn->close();
?>
</body>
</html>