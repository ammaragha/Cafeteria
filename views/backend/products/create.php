

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
