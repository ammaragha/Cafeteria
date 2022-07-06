<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Category/display</li>
            <?php

$Message=[];
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
                                <th>title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (isset($_SESSION['data'])) {
                                $data = $_SESSION['data'];
                                if ($data) {
                                    $count = 0;
                                    foreach ($data as $row) {
                                        $count++;
                                        $id = $row['id'];
                                        echo "<tr>";
                                        echo "<td>$count</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>
                                            <form action='categories.php?page=delete&id=$id' method='POST'>
                                                <a href='categories.php?page=edit&id=$id' class='btn btn-primary'>Edit</a>
                                                <input type='submit' class='btn btn-danger' value='Delete'/>
                                            </form> 
                                        </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr class='text-center'><td colspan='6'>NO DATA</td></tr>";
                                }
                                unset($_SESSION['data']);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>