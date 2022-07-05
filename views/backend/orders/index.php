<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Orders/display</li>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (isset($_SESSION['data'])) {
                                $data = $_SESSION['data'];
                                if ($data) {
                                    $counter = 0;
                                    foreach ($data as $order) {
                                        $counter++;
                                        $id = $order['id'];
                                        //$notAv = $order['avilable'] == 0 ? "class='table-warning'>" : "";
                                        echo "<tr >";
                                        echo "<td>" . $counter . "</td>";
                                        echo "<td>" . $order['date'] . "</td>";
                                        echo "<td>" . $order['total_price'] . "</td>";
                                        echo "<td>" . \App\Models\User::getName($order['user_id']) . "</td>";
                                        echo "<td>" .  $order['status'] . "</td>";
                                        echo "<td>
                                            <form action='orders.php?page=delete&id=$id' method='POST'>
                                                <a href='orders.php?page=view&id=$id' class='btn btn-success'>View</a>
                                                <input type='submit' class='btn btn-danger' value='Delete'/>
                                            </form> 
                                        </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr class='text-center'><td colspan='6'>NO DATA</td></tr>";
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>