<?php
include "../function.php";
include "header/header.php";
deletePost();


?>
    <div class="   p-2 ">
        <h4 >Post Lists</h4>
        <table class="table table-striped text-dark">
            <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Categories Title</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Price</th>
                <th scope="col">Item Description</th>
                <th scope="col">Item Rating</th>
                <th scope="col">Item Photo</th>
                <th scope="col">Item Collection Categories</th>
                <th scope="col">Item View Count</th>
                <th scope="col">Modify</th>
            </tr>
            </thead>
            <?php 
            $query_users_result=queryPost();
            while($row=mysqli_fetch_assoc($query_users_result)){
                $id=$row['id'];
                $cat_title=$row['cat_title'];
                $item_name=$row['item_name'];
                $item_price=$row['item_price'];
                $item_description=$row['item_description'];
                $item_rating=$row['item_rating'];
                $item_photo=$row['item_photo'];
                $item_collections_categories=$row['item_collections_categories'];
                $item_view_counts=$row['item_view_counts'];
                
            ?>
        
            <tbody >
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $cat_title; ?></td>
                    <td><?php echo $item_name; ?></td>
                    <td><?php echo $item_price; ?></td>
                    <td><?php echo $item_description; ?></td>
                    <td><?php echo $item_rating; ?></td>
                    <td> <img src="../images/shop_image/<?php echo $item_photo; ?>" alt="<?php echo $item_photo; ?>" style="width:40px;height:50px;"> </td>
                    <td><?php echo $item_collections_categories; ?></td>
                    <td><?php echo $item_view_counts; ?></td>
                    <td><a href="all_post.php?del_post=<?php echo $id;?>" class="btn btn-secondary">Delete</a></td>
                    <td><a href="modify_post.php?post_id=<?php echo $id;?>" class="btn btn-secondary">Modify</a></td>
                   
                </tr>
                
            </tbody>
            <?php }?>
        </table>
      
       

    </div>
    <?php
include "header/footer.php";
?>