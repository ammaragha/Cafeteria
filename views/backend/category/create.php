



<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Category/Create</li>

           <?php 
               echo '<br>';
              if(isset($_SESSION['Message'])){
                Messages($_SESSION['Message']);
             
                 # Unset Session ... 
                 unset($_SESSION['Message']);
            }
            
           
           ?>

        </ol>


        <div class="card mb-4">

            <div class="card-body">

                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'].'?page=store'); ?>" method="post">

                    <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby=""
                            placeholder="Enter Title">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
</main>



