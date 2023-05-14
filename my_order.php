<div class="col-md-8 px-0">
    <table class="table table-striped bg-white mt-2">
        <thead>
            <tr>
              <th>Username</th>
             <th>Order Number</th>
             <th>Item Name</th>
             <th>Item Price</th>
             <th>Item Numbers</th>
             <th>Order Date</th>
             <th>Address</th>
             <th>State</th>
             <th>Update</th>
            </tr>
            
        </thead>
        <?php 
        
        
         $user_name=$_SESSION['user_name'];
            $query_order_using_name="SELECT * FROM orders WHERE user_name= '{$user_name}' ";
            $query_order_result=mysqli_query($connection,$query_order_using_name);
         while ($row=mysqli_fetch_assoc($query_order_result)){
      
            $order_id=$row['id'];
            $user_name=$row['user_name'];
            $item_name=$row['item_name'];
            $item_number=$row['items_number'];
            $item_date=$row['order_date'];
            $user_address=$row['user_address'];
            $item_price=$row['item_price'];
            $state=$row['user_accept_state'];
              
          
         ?>
        <tbody>
            <form action="" method='post'>
            <tr>
            <td><?php echo $user_name?></td>
            <td><?php echo $order_id?></td>
            <td><?php echo $item_name?></td>
            <td><?php echo $item_price?></td>
            <td><?php echo $item_number?></td>
            <td><?php echo $item_date?></td>
            
            <td><input type="text" class='form-control shadow-none text-decoration-none' name='user_address' value="<?php echo $user_address?>"></td>
            <td><?php echo $state?></td>
            <td><button class="btn-outline" name='update_address'>Update</button></td> 
            </tr>
            </form>
        </tbody>
         <?php 
         } 
         
          
         ?>
    </table>
</div>