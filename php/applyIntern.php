<?php
  session_start();
?>
<?php include 'connection.php';?>
<?php
if(!isset($_SESSION['who'])){
  echo "<script>alert('please Login to apply');</script>";
      exit;
}
if ($_SESSION['who']=='employee') {
  echo "<script>alert('This action is not permited, please login as student');</script>";
  
      exit;
} else if($_SESSION['who']=='student') {
      $id=$_SESSION['id'];
      $intern_id=$_POST['intern_id'];
   if($_GET['action']=='apply') {
     $date=date("Y-m-d");
     $query="INSERT INTO `studentoptedintern`(`stu_id`, `intern_id`, `applied_on`) ";
     $query.="VALUES ('$id','$intern_id','$date')";
     //verify if already applied
     $verifyq="SELECT * FROM `studentoptedintern` WHERE `stu_id`='$id' and `intern_id`='$intern_id'";
     $qresult=$mysqli->query($verifyq);
     if($qresult->num_rows==1){
       echo "<script>alert('You have already applied to this internship');</script>";
      
           exit;
     } else{
        if ($mysqli->query($query)) {
          echo "<script>alert('Applied for internship');</script>";
         
              exit;
        } else {
          echo "<script>alert('Failed to apply for internship');</script>";
        
              exit;
        }
     }
   }
   else if($_GET['action']=='remove') {
     $query="DELETE FROM `studentoptedintern` WHERE `stu_id`='$id' and `intern_id`='$intern_id'";
     if ($mysqli->query($query)) {
       echo "<script>alert('removed internship');</script>";
           exit;
     } else {
       echo "<script>alert('Failed to apply for internship');</script>";
           exit;
     }
   } else {
     exit;
   }
}
?>
