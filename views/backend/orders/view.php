




<div class="container">
    <h1>ORDER STATUS</h1>
    <div class="col-12">
        
           
            <!-- Product status & order info -->
            <div class="row col-lg-12 ord-addr-info">
                <div class="hdr"><h3>Order Info</h3></div>
                <p><b>Reference ID:<?php echo $_SESSION["data"]['id'];?></p>
                <p><b>Date:</b> <?php echo $_SESSION["data"]['date'];?></p>
                <p><b>User Name:</b><?php echo \App\Models\User::getName($_SESSION['user_id'])?></p>
                <p><b>Status :</b> <?php echo $_SESSION["data"]['status'];?></p>
                <p><b>Total:</b> <?php echo $_SESSION["data"]['total_price'];?></p>
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