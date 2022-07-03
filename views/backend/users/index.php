<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Users/display</li>
            <?php 
            echo '<br>';
           if(isset($_SESSION['Message'])){
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>role</th>
                                <th>image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>role</th>
                                <th>image</th>
                                <th>Action</th>
                        </tfoot>
                        <tbody>

                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

