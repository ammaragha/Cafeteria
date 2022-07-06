

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Users/Edit</li>

            <?php
            echo '<br>';
            if(isset($_SESSION['err'])){
                $Message=$_SESSION['err'];
                foreach ($Message as $key => $value) {       
                    echo '* ' . $key . ' : ' . $value . '<br>';    
                }
                 unset($_SESSION['err']);
            }
            
            if(isset($_SESSION['data']))
                $data=$_SESSION['data'];
            else
                die('no data');

                
            ?>

        </ol>


        <div class="card mb-4">

            <div class="card-body">

                <form action="users.php?page=update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby=""
                            placeholder="Enter Name" value="<?php echo $data['name']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="email"
                            aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $data['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>



                


                    


                    <div class="form-group">
                        <label for="exampleInputName">Image</label>
                        <input type="file" name="image">
                    </div>

                    <img src="<?php echo $data['image']; ?>" alt="" height="50px" width="50px"> <br>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>





            </div>
        </div>
    </div>
</main>


