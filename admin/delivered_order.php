<?php include "header/header.php";
include "../function.php";

updateUserAcceptState();

?>
<div class="container vh-100">
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
             
            </tr>
            
        </thead>
        <?php 
        
        
           
            $query_order="SELECT * FROM orders WHERE user_accept_state= 'delivered'";
            $query_result=mysqli_query($connection,$query_order);
            
         while ($row=mysqli_fetch_assoc($query_result)){
      
            $order_id=$row['id'];
            $user_name=$row['user_name'];
            $item_name=$row['item_name'];
            $item_number=$row['items_number'];
            $item_date=$row['order_date'];
            $user_address=$row['user_address'];
            $item_price=$row['item_price'];
            $user_accept_state=$row['user_accept_state'];
              
          
         ?>
        <tbody>
           
            <tr>
            <td><?php echo $user_name?> </td>
            <td><?php echo $order_id?><input type="text" name='order_id' value='<?php echo $order_id?>' hidden> </td>
            <td><?php echo $item_name?></td>
            <td><?php echo $item_price?></td>
            <td><?php echo $item_number?></td>
            <td><?php echo $item_date?></td>
            
            <td><?php echo $user_address?></td>
            <td><?php echo $user_accept_state?></td>
            
            </tr>
           
        </tbody>
         <?php 
         } 
         
          
         ?>
    </table>
</div>
<?php include "header/footer.php"; 
?>