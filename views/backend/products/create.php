<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Products/Create</li>

            <?php
            echo '<br>';
            if(isset($_SESSION['err'])){
                $Message=$_SESSION['err'];
                foreach ($Message as $key => $value) {       
                    echo '* ' . $key . ' : ' . $value . '<br>';    
                }
                 unset($_SESSION['err']);
            }
            ?>

        </ol>


        <div class="card mb-4">

            <div class="card-body">

                <form action="<?=  htmlspecialchars($_SERVER['PHP_SELF'])."?page=store" ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName"> Price</label>
                        <input type="text" class="form-control" id="exampleInputName" name="price" aria-describedby="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Category</label>
                        <select class="form-control" id="exampleInputPassword1" name="cat_id" required>
                            <option value="">..</option>
                            <?php
                            if (isset($_SESSION['categories'])) {
                                $categories = $_SESSION['categories'];
                                foreach ($categories as $category) {
                                    $catID = $category['id'];
                                    echo "<option value='$catID'>" . $category['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="avilable" id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            Avilable
                        </label>
                    </div>


                    <hr>
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