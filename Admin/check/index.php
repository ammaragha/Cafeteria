<?php
require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';

$sql = 'SELECT orders.*,user.name,user.room FROM orders JOIN user WHERE orders.user_id=user.id';
$op = mysqli_query($con, $sql);

require '../layouts/header.php';
require '../layouts/nav.php';
require '../layouts/sidNav.php';
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/checks/display</li>
            <?php 
            echo '<br>';
           if(isset($_SESSION['Message'])){
             Messages($_SESSION['Message']);
          
              unset($_SESSION['Message']);
              }
        
             ?>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                while($data = mysqli_fetch_assoc($op)){     
                            ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['date']; ?></td>
                            <td><?php echo $data['total_price']; ?></td>

                        </tr>
                        <?php 
                                 }
                            ?>
                </table>

                <div class="container m-auto me-5 col-md-12 row">
                    <?php
                     $sql = 'select *  from  product ';
                     $op = mysqli_query($con,$sql);
                     while($data = mysqli_fetch_assoc($op)){
                    ?>
            
                    <div class="card row m-3 col-md-6" style="width: 18rem;">
                        <img src="../Products/uploads/<?php echo $data['image'];?>" class="card-img-top img-fluid"
                            alt="..." style="height:100px ;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $data['name'];?></h5>
                            <p><?php echo"price:-".$data['price']." L.E";?></p>
                        </div>
                    </div>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
</main>

  
<?php
require '../layouts/footer.php';
?>