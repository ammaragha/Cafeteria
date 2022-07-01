<?php
require '../helpers/dbConnection.php';
require '../helpers/functions.php';


$id = $_GET['id'];

$sql = "select * from product where id = $id";
$op = mysqli_query($con, $sql);

if (mysqli_num_rows($op) == 1) {
    $BlogData = mysqli_fetch_assoc($op);

     if(!($_SESSION['user']['role_id'] == 1)){
       header('Location: index.php');
       exit();

     }

}
 else {
    $_SESSION['Message'] = ['Message' => 'Invalid Id'];
    header('Location: index.php');
    exit();
}

$sql = 'select * from category';
$CatOp = mysqli_query($con, $sql);


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
        $errors['category_id'] = 'Field Required';
    } elseif (!Validate($category_id, 4)) {
        $errors['category_id'] = 'Invalid Id';
    }


     if (!Validate($price , 1)) {
        $errors['price'] = 'Field Required';
    }
    $Message=[];
   
    if (Validate($_FILES['image']['name'], 1)) {
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
        

        if (Validate($_FILES['image']['name'], 1)) {
            $disPath = './uploads/' . $FinalName;

            if (!move_uploaded_file($ImgTempPath, $disPath)) {
                $Message = ['Message' => 'Error  in uploading Image  Try Again '];
            } else {
                unlink('./uploads/' . $BlogData['image']);
            }
        } else {
            $FinalName = $BlogData['image'];
        }

        if (count($Message) == 0) {
            $date = strtotime($date);
            $sql = "update product set name='$name' , category_id = $category_id ,price='$price' ,image ='$FinalName' where id = $id";

            $op = mysqli_query($con, $sql);

            if ($op) {
                $Message = ['Message' => 'Raw Updated'];
            } else {
                $Message = ['Message' => 'Error Try Again ' . mysqli_error($con)];
            }
        }
        
        $_SESSION['Message'] = $Message;
        header('Location: index.php');
        exit();
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

                <form action="edit.php?id=<?php echo $BlogData['id']; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby=""
                            placeholder="Enter name" value="<?php echo $BlogData['name']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword">category</label>
                        <select class="form-control" id="exampleInputPassword1" name="category_id">

                            <?php
                               while($data = mysqli_fetch_assoc($CatOp)){
                            ?>

                            <option value="<?php echo $data['id']; ?>" <?php if ($data['id'] == $BlogData['category_id']) {
    echo 'selected';
} ?>><?php echo $data['title']; ?></option>

                            <?php }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName"> Price</label>
                        <textarea class="form-control" id="exampleInputName"
                            name="price"> <?php echo $BlogData['price']; ?></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputName">Image</label>
                        <input type="file" name="image">
                    </div>

                    <img src="./uploads/<?php echo $BlogData['image']; ?>" alt="" height="50px" width="50px"> <br>


                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>

            </div>
        </div>
    </div>
</main>


<?php
require '../layouts/footer.php';
?>
