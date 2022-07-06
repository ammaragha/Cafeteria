<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Category/Edit</li>

            <?php
            echo '<br>';
            if(isset($_SESSION['err'])){
                $Message=$_SESSION['err'];
                foreach ($Message as $key => $value) {       
                    echo '* ' . $key . ' : ' . $value . '<br>';    
                }
                 unset($_SESSION['err']);
            }


            if (isset($_SESSION['data'])) {
                $data = $_SESSION['data'];
                $id = $data['id'];
            } else {
                header("Location: categories.php");
            }

            ?>

        </ol>


        <div class="card mb-4">

            <div class="card-body">

                <form action="categories.php?page=update" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="" placeholder="Enter Title" value="<?php echo $data['name']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>





            </div>
        </div>
    </div>
</main>

