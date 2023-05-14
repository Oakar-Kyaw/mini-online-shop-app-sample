<?php
include 'includes/header.php';
include 'function.php';
addItemToCart();
?>
<div class="container h-100">
    <div class="row">
        <?php
        $search_word= $_POST['search'];
        $query_search_word=search($search_word) ;
        if($check_item=mysqli_num_rows($query_search_word)){

       
        while($row=mysqli_fetch_assoc($query_search_word)){
            $items_id=$row['id'];
            $cat_title=$row['cat_title'];
            $items_name=$row['item_name'];
            $items_price=floatval($row['item_price']);
            $items_decription=$row['item_description'];
            $items_rating=$row['item_rating'];
            $items_photo=$row['item_photo'];
           
        
        ?>
       
        <div class="col-md-3 my-2"> 
            <a href="categories.php?cat_title=<?php echo $cat_title ?>&id=<?php echo $items_id ?>" class='text-decoration-none text-dark'>
        <div class="card card-list ">
                             <img src="images/shop_image/<?php echo $items_photo?>" alt="" class="img-fluid w-100" style="height:200px;">
                             <div class="card-body text-center">
                                <?php
                                 for($i=0;$i<$items_rating;$i++) {?>
                                    <i class="fa-sharp fa-solid fa-star text-red mt-3"></i>
                                <?php }?> 
                                <div class="card-title">
                                <h5><?php echo $items_name;?></h5>
                                </div>
                              
                                <h6 class="fw-bold "><?php echo $items_price;?> KYATS</h6>
                                 
                                <?php 
                                    if(!empty($_SESSION['user_id'])){
                                     $button=queryCartUsingIdAndUsername($items_id);
                                     if($querys=mysqli_num_rows($button)){
                                            echo "<a  href='buy_item.php?buy_item_id=$items_id ' class='btn' value='$items_id'>Buy</a>"; 
                                       
                                }
                                    else  {
                                            
                                             echo " <a href='search.php?add_cart=$items_id'  class='btn text-decoration-none text-dark' value='$items_id'>Add to Cart</a>"; 
                                        
                                        }   
                            }
                            else {
                            echo " <a href='signin.php' class='btn text-decoration-none text-dark ' value='$items_id '>Add to Cart</a>"; 
                            }
                                ?> 
                                 </input>
                             </div>
                            
                        </div>
                    </a>
        </div>
    
        <?php }
        }
        else {
            echo "NO CONTENT";
        } ?>
    </div>

</div>
<?php
include 'includes/footer.php';
?>