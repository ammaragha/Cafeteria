<?php
require './helpers/dbConnection.php';
require './helpers/functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  

  $email    = Clean($_POST['email']);
  $password = Clean($_POST['password']);

  $errors = [];


 
  if (!Validate($email, 1)) {
      $errors['Email'] = 'Field Required';
  } elseif (!Validate($email, 2)) {
      $errors['Email'] = 'Invalid Email';
  }

 
  if (!Validate($password, 1)) {
      $errors['Password'] = 'Field Required';
  } elseif (!Validate($password, 3)) {
      $errors['Password'] = 'Length must be >= 6 chars';
  }
   
  if (count($errors) > 0) {
 
      $Errors($errors);
  } else {
      

      $sql = "select * from user where email = '$email' and password = '$password'";
      $op  = mysqli_query($con,$sql);


      if(mysqli_num_rows($op) == 1){
         $data = mysqli_fetch_assoc($op);
         
         $_SESSION['user'] = $data;

         header("Location: ".Url());

      }else{
          echo '* Error in Email || Password Try Again !!!!';
      }



  }
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href=" <?php   echo url('/assetsDir/css/styles.css');?>" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
  <style>
    main{
        width: 50%;
        margin: auto;
        line-height: 40px;
        border-radius: 20px;
        border: 2px solid black;
       padding-left: 20px;
        margin-top: 10%;
        font-size: 22px;
    }
    form{
     width: 100%;  
    }
    input{
        width: 90%;
        border-radius: 10px;
        padding: 5px;
    }
    button{
        width: 20%;
        padding: 5px;
        border-radius: 10px;
    }
   
  </style>
    </head>

    <body class="bg-light ">
        <main  class="container" >
                                    <div class="card-header"><h3 class="text-center  my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form   action = "<?php   echo htmlspecialchars($_SERVER['PHP_SELF']);?>"   method = "post" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email:-</label><br>
                                                <input class="form-control py-4" id="inputEmailAddress"  name ="email" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password:-</label><br>
                                                <input class="form-control py-4" id="inputPassword" name="password"  type="password" placeholder="Enter password" />
                                            </div>
 
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Login</button><br><br>
                                            </div>
                                        </form>
                                    </div>
          
    </main>   
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>