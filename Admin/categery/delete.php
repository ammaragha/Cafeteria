<?php 

require '../helpers/dbConnection.php';

$id = $_GET['id'];

$sql = "select * from category where id = $id";
$op  = mysqli_query($con,$sql);

if(mysqli_num_rows($op) == 1){
   $sql = "delete from category where id = $id";
   $op  = mysqli_query($con,$sql);

   if($op){
       $Message = ["Message" => "Raw Removed"];
   }else{
       $Message = ["Message" => "Error try Again"];
   }

}else{
    $Message = ["Message" => "Invalid Id "];
}

   $_SESSION['Message'] = $Message;

   header("location: index.php");

?>