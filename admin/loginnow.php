<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$ID = $_POST['Adminid'];
$Password = $_POST['Password'];

// errorchecking first:

if (empty($Password)) {
   echo "Password field is empty, please click your browsers 'back' button.";
   exit;
   }

if (empty($ID)) {
   echo "Admin id field is empty, please click your browsers 'back' button.";
   exit;
   }

if(($Password != $adminpw) || ($ID != $adminid))
  {
    echo "Error. Wrong Admin Login.";
    exit;
  }
else
  {
  session_register("alogin");
  $alogin = true;
  //header("Location: index.php");
  echo '<META HTTP-EQUIV="Refresh" Content="0;URL=index.php">';
  }

include "../footer.php";
?>