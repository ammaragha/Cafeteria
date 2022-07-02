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
            <li class="breadcrumb-item active">Dashboard/orders/display</li>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Total Price</th>
                                <th>Rooms</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>  
                                <th>Date</th>
                                <th>Total Price</th>
                                <th>Rooms</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                while($data = mysqli_fetch_assoc($op)){     
                            ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['date']; ?></td>
                                <td><?php echo $data['total_price']; ?></td>
                                <td><?php  echo $data['room']?></td>
                                <td><?php echo $data['status']?></td>
                            </tr>
                            <?php 
                                 }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>



  
<?php
require '../layouts/footer.php';
?>