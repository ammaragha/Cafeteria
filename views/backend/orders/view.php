<?php

use App\Models\Core\Redirect;

if (isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
} else {
    Redirect::back();
}
?>
<div class="container">
    <h1>ORDER STATUS</h1>
    <div class="col-12">


        <!-- Product status & order info -->
        <div class="row col-lg-12 ord-addr-info">
            <div class="hdr">
                <h3>Order Info</h3>
            </div>
            <p><b>Reference ID:<?php echo $data['id']; ?></p>
            <p><b>Date:</b> <?php echo $data['date']; ?></p>
            <p><b>User Name:</b><?php echo \App\Models\User::getName($data['user_id']) ?></p>
            <p><b>Status :</b> <?php echo $data['status']; ?></p>
            <p><b>Total:</b> <?php echo $data['total_price']; ?></p>
        </div>

        <!-- Order items -->
        <div class="row col-lg-12">
            <table class="table table-hover cart">
                <thead>
                    <tr>
                        <th width="20%">Date</th>
                        <th width="20%">Price</th>
                        <th width="20%">User ID</th>
                        <th width="20%">Status</th>
                        <th width="20%">notes</th>
                    </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
        </div>





    </div>
</div>