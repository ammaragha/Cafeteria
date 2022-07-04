<?php
require '../helpers/dbConnection.php';
require '../helpers/functions.php';

$sql = 'select * from category';
$RoleOp = mysqli_query($con, $sql);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = Clean($_POST['name']);
    $price = Clean($_POST['price']);
    $category_id = $_POST['category_id'];
    
    
    $errors = [];

    
     if (!Validate($name, 1)) {
        $errors['name'] = 'Required Field';
    } elseif (!Validate($name, 6)) {
        $errors['name'] = 'Invalid String';
    }


    if (!Validate($category_id, 1)) {
        $errors['category'] = 'Field Required';
    } elseif (!Validate($category_id, 4)) {
        $errors['category'] = 'Invalid Id';
    }


     if (!Validate($price , 1)) {
        $errors['price'] = 'Field Required';
    }

    
    if (!Validate($_FILES['image']['name'], 1)) {
        $errors['Image'] = 'Field Required';
    } else {
        $ImgTempPath = $_FILES['image']['tmp_name'];
        $ImgName = $_FILES['image']['name'];

        $extArray = explode('.', $ImgName);
        $ImageExtension = strtolower(end($extArray));

        if (!Validate($ImageExtension, 7)) {
            $errors['Image'] = 'Invalid Extension';
        } else {
            $FinalName = time() . rand() . '.' . $ImageExtension;
        }
    }

    if (count($errors) > 0) {
        $Message = $errors;
    } else {
      

        $disPath = './uploads/' . $FinalName;

        if (move_uploaded_file($ImgTempPath, $disPath)) {
            $userId = $_SESSION['user']['id'];

            $sql = "insert into product (name,price,image,category_id) values ('$name','$price','$FinalName',$category_id)";
            $op = mysqli_query($con, $sql);

            if ($op) {
                $Message = ['Message' => 'Raw Inserted'];
            } else {
                $Message = ['Message' => 'Error Try Again ' . mysqli_error($con)];
            }
        } else {
            $Message = ['Message' => 'Error  in uploading Image  Try Again '];
        }
    }
  
    $_SESSION['Message'] = $Message;
}

require '../layouts/header.php';
require '../layouts/nav.php';
require '../layouts/sidNav.php';
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Products/Create</li>

            <?php
            echo '<br>';
            if (isset($_SESSION['Message'])) {
                Messages($_SESSION['Message']);
            
                unset($_SESSION['Message']);
            }
            
            ?>

        </ol>


        <div class="card mb-4">

            <div class="card-body">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby=""
                            placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName"> Price</label>
                        <input type="text" class="form-control" id="exampleInputName" name="price" aria-describedby="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Categore</label>
                        <select class="form-control" id="exampleInputPassword1" name="category_id">

                            <?php
                               while($data = mysqli_fetch_assoc($RoleOp)){
                            ?>

                            <option value="<?php echo $data['id']; ?>"><?php echo $data['title']; ?></option>

                            <?php }
                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Image</label>
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</main>


<?php
require '../layouts/footer.php';
?>
