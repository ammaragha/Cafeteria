<?php 
require './Admin/helpers/dbConnection.php';

$sqluser = "select * from user";
$objData = mysqli_query($con,$sqluser);

$sql = 'select product.*,category.*  from  product inner join category  on product.category_id = category.id';
$op  = mysqli_query($con,$sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
      .post-image{
        height: 150px;
      }
      button{
        border-radius: 5px;
      }
      .div1{
        height: 50vh;
        background: url("./Admin/assetsDir/assets/img/download.jpg")no-repeat center/cover;
        color:white;
      }
    </style>
</head>
<body>
  <div class="div1 container-fluid">
<nav class="navbar container-fluid justify-content-between ">
    <div class="col-md-5  ps-4">
    <a class="navbar-brand active text-light">Home</a>
    <a class="navbar-brand text-light" href="#">Add Order</a>
    </div>
    <div  class="col-md-2 ">
    <img src="./Admin/Users/uploads/<?php echo $_SESSION['user']['image']; ?>" alt="" height="50px" width="50px">
    <?php  echo $_SESSION['user']['name'];?>
    </div>
</nav>
</div>
<h2 class="text-center">Our Products</h2>
<section class="container-fluid col-md-12 row  text-center text-dark">
<div class=" container col-md-12 row border-2">
     <?php    
           while($data = mysqli_fetch_assoc($op)){
        ?>
        <div class="col-lg-2 col-md-2">
          <div class="post-image">
            <img class="img-fluid h-100 w-100" src="./Admin/Products/uploads/<?php echo $data['image'];?>" alt="">
          </div>
          <div class="post-desc">
            <div class="post-title">
              <h5><?php echo $data['name'].'('.$data['title'].')';?></h5>
            </div>
            <p><?php echo"price:-".$data['price']." L.E";?></p>
          </div>
        </div>
      <?php } ?>
</div>
</section>
</body>
</html>
