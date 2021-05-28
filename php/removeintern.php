<?php
  session_start();
?>
<?php include 'connection.php';?>
<?php
if($_SESSION['who']==='student'){
  $stu_id=$_SESSION['id'];
  $intern_id=$_POST['internId'];
  $query="DELETE FROM `studentoptedintern` WHERE `stu_id`='$stu_id' and `intern_id`='$intern_id'";
  if ($result = $mysqli->query($query)) {
    echo "<script>alert('successfully opted out of internship');</script>";
   exit;
  }
} else {
  echo "<script>alert('please login as student');</script>";
  exit;
}
?>
