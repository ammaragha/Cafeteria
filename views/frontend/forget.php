<form class="col-6 m-auto mt-4" action="auth.php?page=doforget" method="POST">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" id="form2Example1" name="email" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- New Password input -->
    <div class="form-outline mb-4">
        <input type="password" id="form2Example2" name='password' class="form-control" />
        <label class="form-label" for="form2Example2">New Password</label>
    </div>

    <!-- New Password Repeat input -->
    <div class="form-outline mb-4">
        <input type="password" id="form2Example2" name='re-password' class="form-control" />
        <label class="form-label" for="form2Example2">Repeat New Password</label>
    </div>

   

    <!-- Submit button -->
    <input type="submit" class="btn btn-primary btn-block mb-4" value="Reset">

</form>

<?php
if (isset($_SESSION['err'])) {
    $err = $_SESSION['err'];
    echo "<div class='alert alert-danger'>$err</div>";
    unset($_SESSION['err']);
}
