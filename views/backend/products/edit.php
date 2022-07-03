

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
