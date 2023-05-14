<div class="col-md-9 px-0">
    
    <div class="row ">
        <?php 
    $favorite_item_query= queryFavorite();
    while($row=mysqli_fetch_assoc($favorite_item_query)){
        $item_id=$row['item_id'];
        $post_using_id_query=queryPostUsingId($item_id);
        while($id_query=mysqli_fetch_assoc($post_using_id_query)){
            $item_image=$id_query['item_photo'];
            $item_rating=$id_query['item_rating'];
            $item_name=$id_query['item_name'];
            $item_price=$id_query['item_price'];
    ?>
        <div class="col-md-4 col-lg-4 my-cart">
            <div class="card mt-1" >
            <div class="favorite-image">
                <img src="images/shop_image/<?php echo $item_image ?>" alt="" class="img-fluid position-relative">
                <i class="fa-sharp fa-solid fa-regular fa-heart position-absolute "> </i> 
                <a href='profile.php?profile=my_favorite&del_favorite=<?php echo $item_id ?>' class='' value=''><i class='fa-solid fa-delete-left py-1' style='left:270px;'></i> </a> 
            </div>
        
       <div class="card-body text-center">
        <?php 
        for ($i=0;$i<$item_rating;$i++){
           echo "<i class='fa-sharp fa-solid fa-star text-red mt-3'></i>";
        }
        ?>
        
        <h5 class="card-title"><?php echo $item_name ?></h5>
        <h6 class="fw-bold card-text"><?php echo $item_price ?> KYATS</h6>
        <?php 
                  if(!empty($_SESSION['user_id'])){
                    $query_cart=queryCartUsingIdAndUsername($item_id);
                    if($query_carts=mysqli_num_rows($query_cart)){
                    
                         echo "<a  href='buy_item.php?buy_item_id=$item_id ' class='btn' value='$item_id'>Buy</a>";
                    
                   
                   }
                    else {
                         echo " <a href='profile.php?profile=my_favorite&add_cart=$item_id'  class='btn' value=' $item_id '>Add to Cart</a>"; 
                    }
                  }
                  else {
                    echo " <a href='signin.php' class='btn text-decoration-none text-dark ' value='$item_id '>Add to Cart</a>"; 
                  }
                  ?>

    </div> 
    </div>
        </div>
        <?php }} ?>
    </div>
    
</div>