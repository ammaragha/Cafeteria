<?php 
require '../helpers/dbConnection.php';

$sqluser = "select * from user";
$objData = mysqli_query($con,$sqluser);

$sql = 'SELECT * FROM orders';
$op  = mysqli_query($con,$sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Orders</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
      .div1{
        height: 50vh;
        background: url("../assetsDir/assets/img/download.jpg")no-repeat center/cover;
        color:white;
      }
      table{
        border: 3px solid black;
      }
      img{
        height:90px;
      }
    </style>
</head>
<body>
  <div class="div1 container-fluid">
<nav class="navbar container-fluid justify-content-between ">
    <div class="col-md-5  ps-4">
    <a class="navbar-brand active text-light" href="../../index.php">Home</a>
    <a class="navbar-brand text-light" >My Order</a>
    </div>
    <div  class="col-md-2 ">
    <img src="../Users/uploads/<?php echo $_SESSION['user']['image']; ?>" alt="" height="50px" width="50px">
    <?php  echo $_SESSION['user']['name'];?>
    </div>
</nav>
</div>
<br>
<h2 class="container">My Orders</h2><br>
  <table class="table table-bordered container rounded-3" id="dataTable" width="100%" cellspacing="0">
      <thead>
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
             <th>#</th> 
             <th>Date</th>
             <th>Total Price</th>
             <th>Status</th>
             <th>Actions</th>
          </tr>
      </tfoot>
      <tbody>
        <?php 
           while($data = mysqli_fetch_assoc($op)){     
        ?>
        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['date']; ?></td>
          <td><?php echo $data['total_price']; ?></td>
          <td><?php echo $data['status']?></td>
          <td><a href='cancel.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>cancel</a></td>
        </tr>
        <?php 
           }
         ?>
      </tbody>
  </table>
  
    <div class="container m-auto me-5 col-md-12 row">
    <?php
    $sql = 'select *  from  product ';
$op = mysqli_query($con,$sql);
?>
 <?php    
           while($data = mysqli_fetch_assoc($op)){
        ?>
        <div class="card row m-2 col-md-6" style="width: 18rem;">
  <img src="../Products/uploads/<?php echo $data['image'];?>" class="card-img-top" alt="...">
  <div class="card-body text-center">
    <h5 class="card-title"><?php echo $data['name'];?></h5>
    <p><?php echo"price:-".$data['price']." L.E";?></p>
  </div>
</div>
      <?php } ?>
    
           </div>
</body>
</html>
