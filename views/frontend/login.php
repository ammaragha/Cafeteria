<form class="col-6 m-auto mt-4" action="auth.php?page=dologin" method="POST">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" id="form2Example1" name="email" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" id="form2Example2" name='password' class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
        <div class="col d-flex justify-content-center">
            <!-- Checkbox
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                <label class="form-check-label" for="form2Example31"> Remember me </label>
            </div> -->
        </div>

        <div class="col">
            <!-- Simple link -->
            <a href="auth.php?page=forget">Forgot password?</a>
        </div>
    </div>

    <!-- Submit button -->
    <input type="submit" class="btn btn-primary btn-block mb-4" value="Log in">

</form>

<?php
if (isset($_SESSION['err'])) {
    $err = $_SESSION['err'];
    echo "<div class='alert alert-danger'>$err</div>";
    unset($_SESSION['err']);
}
