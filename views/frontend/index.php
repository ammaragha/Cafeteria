<div class="container-fluid py-5 d-flex secdiv">
    <div class="check p-2">
        <h3>Items</h3>
        <div class="orderedItems"></div>
        <h6>Notes</h6>
        <textarea name="orderNotes" id="notes" class="notearea"></textarea>
        <label for="rooms">Room:</label>
        <select name="rooms" id="rooms" class="w-75">
            <option value="19">19</option>
            <option value="10">10</option>
            <option value="14">14</option>
            <option value="15">15</option>
        </select>
        <div class="py-4">
            Total Price: <span class="total"></span> LE
        </div>


        <div class="d-flex justify-content-end">
            <?php
            //login or not ? 
            use App\Models\Core\Auth;

            if (Auth::check()) { ?>
                <input type="submit" value="Confirm" class="confirmOrder savebtn btn btn-primary btn-lg">
            <?php } else { ?>
                <a class="btn btn-success" href="#">you need to login to be able to order!</a>
            <?php } ?>
        </div>

    </div>
    <div class="products text-center">
        <div class="row gapping">

            <?php if (isset($_SESSION['data'])) {
                $data = $_SESSION['data'];
                if (!$data) echo "<div class='alert alert-info'>NO DATA</div>";
                else {
                    foreach ($data as $product) {
            ?>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                            <div class="card productHolder">
                                <img class="card-img-top productimg" src="<?= $product['image'] ?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['name'] . '(' . \App\Models\Category::getName($product['cat_id']) . ')'; ?></h5>
                                    <p class="card-text"><span>price:</span>
                                        <span> <?= $product['price'] ?> </span> <span>LE</span>
                                    </p>

                                </div>
                            </div>
                        </div>
            <?php } //end foreach
                } //end else
            } //end if 
            ?>

        </div>
    </div>

</div>