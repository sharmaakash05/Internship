<?php
  include 'connection.php';
?>

<?php
// Start the session
session_start();
// Unset all of the session variables.
$_SESSION = array();

session_destroy();
header("Location: /internshala_project/index.php");
die();

?>
