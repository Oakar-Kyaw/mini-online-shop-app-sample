
<div class="col-md-9 ">
    <div class="row ">
        <?php
        $item_name_query=queryCart();
        while ($row=mysqli_fetch_assoc($item_name_query)){
            $item_id=$row['item_id'];
            $user_cart_item_name=$row['user_cart_item_name'];
            
            $post_using_name_query=queryPostUsingId($item_id);
            while($post=mysqli_fetch_assoc($post_using_name_query)){
                $post_image=$post['item_photo'];
                $post_item_rating=$post['item_rating'];
                $post_price=$post['item_price'];
        
        ?>
        <div class="col-md-4 col-lg-4 my-cart">
            <div class="card mt-1" >
            <div class="favorite-image ">
              <div class='position-relative'>
                <img src="images/shop_image/<?php echo $post_image ?>" alt="" class=" position-relative">
                
                <?php 
                  if(!empty($_SESSION['user_id'])){
                    $query_favorite=queryFavoriteUsingIdAndUsername($item_id);
                    if($favorite_item_query=mysqli_num_rows($query_favorite)){
                    
                         echo "<button  class='btn ' value='$item_id'> <i class='fa-sharp fa-solid text-danger fa-heart position-absolute heart'> </i> </button>
                        ";
                         
                    
                   
                   }
                    else {
                         echo " <a href='profile.php?profile=my_cart&add_favorite=$item_id'  class='btn' value='$item_id'> <i class='fa-sharp fa-regular fa-heart position-absolute heart  '> </i> </a>"; 
                    }
                  }
                  else {
                    echo "<a href='signin.php' class='btn ' value='<?php echo $item_id?>'> <i class='fa-sharp fa-regular fa-heart position-absolute heart '> </i> </a>"; 
                  }
                  ?>
                 
                  <a href='profile.php?profile=my_cart&del_cart=<?php echo $item_id ?>' class='' value=''><i class='fa-solid fa-delete-left py-1' style='left:270px;'></i> </a> </div>
            </div>
        
       <div class="card-body text-center">
        <?php 
        for($i=0;$i<$post_item_rating;$i++){
           echo "<i class='fa-sharp fa-solid fa-star text-red mt-3'></i> ";
        }
       ?>
        
        <h5 class="card-title"><?php echo $user_cart_item_name ?></h5>
        <h6 class="fw-bold card-text"><?php echo $post_price ?>Kyat</h6>
        
        
        <a href="buy_item.php?buy_item_id=<?php echo $item_id;?>" class="btn text-uppercase" >Buy</a>
    
        
        

    </div> 
    
        
   
</div>
</div>
    <?php } } ?>
    
</div>
</div>