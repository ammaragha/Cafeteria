<?php
require './Admin/helpers/dbConnection.php';

$sqluser = "select * from user";
$objData = mysqli_query($con, $sqluser);

$sql = 'select product.*, category.*, product.id as pid from  product inner join category  on product.category_id = category.id';
$op  = mysqli_query($con, $sql);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Cafeteria</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Add Order</a>
                    </li>

                </ul>
                <span class="navbar-text userimg">
                    <img src="./Admin/Users/uploads/<?php echo $_SESSION['user']['image']; ?>" alt="" height="50px" width="50px">

                </span>
                <span class="navbar-text username">
                    <a href="#"><?php echo $_SESSION['user']['name']; ?></a>

                </span>
                <input type="hidden" id="user" value="<?php echo ($_SESSION['user']["id"]); ?>">
            </div>
        </div>
    </nav>

    <div class="container-fluid py-5 d-flex secdiv">
        <div class="check p-2">
            <h3>Items</h3>
            <div class="orderedItems"></div>
            <h6>Notes</h6>
            <textarea name="orderNotes" id="notes" class="notearea"></textarea>
            <label for="rooms">Room:</label>
            <select name="rooms" id="rooms" class="w-75">
                <option value="19">19</option>
                <option value="10">10</option>
                <option value="14">14</option>
                <option value="15">15</option>
            </select>
            <div class="py-4">
                Total Price: <span class="total"></span> LE
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" value="Confirm" class="confirmOrder savebtn btn btn-primary btn-lg">
            </div>
        </div>
        <div class="products text-center">
            <div class="row gapping">
                <?php
                while ($data = mysqli_fetch_assoc($op)) {
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                        <div class="card productHolder">
                            <img class="card-img-top productimg" src="./Admin/Products/uploads/<?php echo $data['image']; ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['name'] . '(' . $data['title'] . ')'; ?></h5>
                                <p class="card-text"><span>price:</span>
                                    <span> <?php echo $data['price'] ?> </span> <span>LE</span>
                                </p>
                                <p class="card-text productid"><span>P_ID:</span>
                                    <span> <?php echo $data['pid']; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="main.js"></script>
    
</body>

</html>