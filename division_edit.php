<?php
$id="";
$mydivisionname="";
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
<h1 class="div-class" style="color:purple">Edit Registration</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM division WHERE division_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['division_id'];;
        $mydivisionname=$row['division_name'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id"><br><br>
Division Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mydivisionname" id="mydivisionname"
value="<?php echo $mydivisionname; ?>"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $mydivisionname = test_input($_POST["mydivisionname"]);
    $sql = "UPDATE division SET 
division_name = '".$mydivisionname."' WHERE division.division_id ='".$id."'";
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
echo "<tr><th>Division ID</th><th>Division Name</th><th>Action</th></tr>";
$sql = "SELECT * FROM division ORDER BY division_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['division_id']."</td><td>".$row['division_name']."</td><td>".edit_button($row['division_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='3'>(0 Results)</td></tr>";
}
$conn->close();
?>
</body>
</html>
