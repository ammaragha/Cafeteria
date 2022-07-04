<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Products/Edit</li>

            <?php
            echo '<br>';
            if (isset($_SESSION['Message'])) {
                Messages($_SESSION['Message']);

                unset($_SESSION['Message']);
            }

            if (isset($_SESSION['data']))
                $data = $_SESSION['data'];
            else
                die('no data');

            ?>

        </ol>


        <div class="card mb-4">

            <div class="card-body">

                <form action="<?= 'products.php?page=update' ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="" placeholder="Enter name" value="<?php echo $data['name']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword">category</label>
                        <select class="form-control" id="exampleInputPassword1" name="cat_id">

                            <?php
                            if (isset($_SESSION['categories'])) {
                                $categories = $_SESSION['categories'];
                                foreach ($categories as $category) {
                                    $catID = $category['id'];
                                    $checked = $catID == $data['cat_id'] ? "selected" : "";
                                    echo "<option value='$catID' $checked>" . $category['name'] . "</option>";
                                }
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName"> Price</label>
                        <input class="form-control" id="exampleInputName" name="price" value="<?php echo $data['price']; ?>">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="avilable" id="flexCheckDefault" <?php
                                                                                                                        if ($data['avilable'] == 1)
                                                                                                                            echo "checked";
                                                                                                                        ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Avilable
                        </label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputName">Image</label>
                        <input type="file" name="image">
                    </div>

                    <img src="<?php echo $data['image']; ?>" alt="" height="50px" width="50px"> <br>


                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>

            </div>
        </div>
    </div>
</main>