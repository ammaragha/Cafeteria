<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Products/display</li>
            <?php
            echo '<br>';
            if(isset($_SESSION['err'])){
                $Message=$_SESSION['err'];
                foreach ($Message as $key => $value) {       
                    echo '* ' . $key . ' : ' . $value . '<br>';    
                }
                 unset($_SESSION['err']);
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
                                <th>Title</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (isset($_SESSION['data'])) {
                                $data = $_SESSION['data'];
                                if ($data) {
                                    $counter = 0;
                                    foreach ($data as $product) {
                                        $counter++;
                                        $id = $product['id'];
                                        $notAv = $product['avilable'] == 0 ? "class='table-warning'>" : "";
                                        echo "<tr $notAv>";
                                        echo "<td>" . $counter . "</td>";
                                        echo "<td>" . $product['name'] . "</td>";
                                        echo "<td>" . $product['price'] . "</td>";
                                        echo "<td>" . \App\Models\Category::getName($product['cat_id']) . "</td>";
                                        echo "<td> <img style='width:200px;max-width:100%;' src='" . $product['image'] . "'/></td>";
                                        echo "<td>
                                            <form action='products.php?page=delete&id=$id' method='POST'>
                                                <a href='products.php?page=edit&id=$id' class='btn btn-primary'>Edit</a>
                                                <input type='submit' class='btn btn-danger' value='Delete'/>
                                            </form> 
                                        </td>";
                                        echo "</tr>";
                                    }
                                }else{
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