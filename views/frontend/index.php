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

        </div>
    </div>

</div>