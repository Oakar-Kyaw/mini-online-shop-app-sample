<?php 
include "includes/db.php";
include "includes/header.php";
include "function.php";

addItemToCart();
addFavorite();
if(isset($_GET['cat_title'])){
     
    if($_GET['cat_title']=="" && $_GET['id']==""){
       
        $item_first_select="SELECT * FROM items LIMIT 1";
        $item_first_query=mysqli_query($connection,$item_first_select); 
        while ($row=mysqli_fetch_assoc($item_first_query)){
           
                $item_id=$row['id'];
                $cat_query_title=$row['cat_title'];
                $no_content=1;
                
        }
        
       
    }
    else if(empty($_GET['id'])){ 
        $cat_query_title=$_GET['cat_title'];
        $item_select="SELECT * FROM items WHERE cat_title='$cat_query_title' LIMIT 1";
        $item_select_query=mysqli_query($connection,$item_select);
        if($result=mysqli_num_rows($item_select_query)){
            
            if($result<1){
                
                $no_content= $result;
            }
            else {
                 while ($row=mysqli_fetch_assoc($item_select_query)){
                $item_id=$row['id'];
                $no_content=$result;
                 }
        
            }
        }
       
       
    }
    else {
        $no_content=1;
        $item_id=$_GET['id'] ; 
        $cat_query_title=$_GET['cat_title'];
    }
  
}


if(isset($_POST['submit'])){
    $item_id="";
    $item_id=$_POST['cat-id'];
}

?>
<body >
    
    <div class="categories ">
        <div class="container p-0 d-flex">
                
                <?php if($no_content<1){
                    echo "<div class=' vh-100 w-100 '>
                     <h3 class='text-dark text-center mt-5'>No Content</h3>
                    </div>"; 
                    
                }
                else {
                ?>
                
                <div class="content ">
                    <div class="card content-head px-0">
                        <div class="row">
                            <?php  $cat_head_title= "SELECT * FROM items WHERE cat_title='$cat_query_title' AND id= $item_id";
                                    $cat_head_query=mysqli_query($connection,$cat_head_title);
                                while ($row=mysqli_fetch_assoc($cat_head_query)){
                                    $item_id=$row['id'];
                                    $cat_head_title=$row['cat_title'];
                                    $cat_head_name=$row['item_name'];
                                    $cat_head_price=$row['item_price'];
                                    $cat_head_description=$row['item_description'];
                                    $cat_head_rating=$row['item_rating'];
                                    $cat_head_photo=$row['item_photo'];
                                    $cat_head_date=$row['item_date'];
                                    $cat_head_collections_categories=$row['item_collections_categories'];
                          ?>
                            <div class="col-md-6 position-relative ">
                            <img src="images/shop_image/<?php echo $cat_head_photo;?>" class="content-image-first img-fluid w-100 " alt="">
                            <?php 
                  if(!empty($_SESSION['user_id'])){
                    $query_favorite=queryFavoriteUsingIdAndUsername($item_id);
                    if($favorite_item_query=mysqli_num_rows($query_favorite)){
                    
                         echo "<button  class='btn ' value='$item_id'> <i class='fa-sharp fa-solid text-danger fa-heart position-absolute heart $cat_head_name'> </i> </button>";
                    
                   
                   }
                    else {
                         echo " <a href='categories.php?add_favorite=$item_id'  class='btn text-decoration-none text-dark' value='$item_id'> <i class='fa-sharp fa-regular fa-heart position-absolute heart  $cat_head_name'> </i> </a>"; 
                    }
                  }
                  else {
                    echo "<a href='signin.php' class='btn ' value=' $item_id'> <i class='fa-sharp fa-regular fa-heart position-absolute heart $cat_head_name'> </i> </a>"; 
                  }
                  ?>
                        </div>
                        <div class="col md-6">
                            <div class="card-body ">
                            <?php
                                 for($i=0;$i<$cat_head_rating;$i++) {?>
                                    <i class="fa-sharp fa-solid fa-star text-red mt-3"></i>
                                <?php }?> 
                                <div class="card-title">
                                    <h5 class="text-uppercase"><?php echo $cat_head_name;?></h5>
                                </div>
                                    <h6 class="fw-bold "><?php echo $cat_head_price;?> KYATS</h6>
                                    <h6 class="card-text "><?php echo $cat_head_description?></h6>
                                    
                                    <?php 
                                    if(!empty($_SESSION['user_id'])){
                                     $button=queryCartUsingIdAndUsername($item_id);
                                    if($button=mysqli_num_rows($button)){
                                    
                                    echo "<a  href='buy_item.php?buy_item_id=$item_id ' class='btn' value='<?php echo $item_id ?>'>Buy</a>";
                                    
                                
                                }else {
                                     echo " <a  href='categories.php?add_cart=$item_id'  class='btn text-decoration-none text-dark'  value=' $item_id'>Add to Cart</a>"; 
                                     echo "<a href='buy_item.php?buy_item_id=$item_id ' class='text-decoration-none p-2 '>Buy Now</a>";
                                }
                            }
                            else {
                            echo " <a href='signin.php' class='btn text-decoration-none text-dark ' value=' $item_id '>Add to Cart</a>"; 
                            }
                                ?>                          
                            
                            </div>
                        </div>
                            <?php }?>
                        </div>
                        
                    </div>
                    <div class="content-list row g-3 text-center mt-1 mb-3">
                        <?php 
                         $cat_title= "SELECT * FROM items WHERE cat_title='$cat_query_title'";
                         $cat_query=mysqli_query($connection,$cat_title);
                         while ($row=mysqli_fetch_assoc($cat_query)){
                            $cat_items_id=$row['id'];
                            $cat_title=$row['cat_title'];
                            $cat_items_name=$row['item_name'];
                            $cat_items_price=floatval($row['item_price']);
                            $cat_items_decription=$row['item_description'];
                            $cat_items_rating=$row['item_rating'];
                            $cat_items_photo=$row['item_photo'];
                            $cat_items_date=$row['item_date'];
                            $cat_items_collections_categories=$row['item_collections_categories'];
                         
                        
                        ?>
                       
                        <div class="col-md-3">
                             <a href="categories.php?cat_title=<?php echo $cat_title;?>&id=<?php echo $cat_items_id ?>"  style="color:none; text-decoration:none; "class="text-dark">
                        
                            <div class="card card-list ">
                             <img src="images/shop_image/<?php echo $cat_items_photo;?>" alt="" class="img-fluid w-100">
                             
                             
                             <div class="card-body <?php if($item_id==$cat_items_id)
                             {echo "card-active";} ?> ">
                                <?php
                                 for($i=0;$i<$cat_items_rating;$i++) {?>
                                    <i class="fa-sharp fa-solid fa-star text-red mt-3"></i>
                                <?php }?> 
                                <div class="card-title">
                                <h5><?php echo $cat_items_name;?></h5>
                                </div>
                              
                                <h6 class="fw-bold "><?php echo $cat_items_price;?> KYATS</h6>
                                 
                                <?php 
                                    if(!empty($_SESSION['user_id'])){
                                     $button=queryCartUsingIdAndUsername($cat_items_id);
                                     if($querys=mysqli_num_rows($button)){
                                            echo "<a  href='buy_item.php?buy_item_id=$cat_items_id ' class='btn' value='<?php echo $item_id ?>'>Buy</a>"; 
                                       
                                }
                                    else  {
                                            
                                             echo " <a href='categories.php?add_cart=$cat_items_id'  class='btn text-decoration-none text-dark' value='$cat_items_id'>Add to Cart</a>"; 
                                        
                                        }   
                            }
                            else {
                            echo " <a href='signin.php' class='btn text-decoration-none text-dark ' value='$item_id '>Add to Cart</a>"; 
                            }
                                ?> 
                                 </input>
                             </div>
                            
                        </div>
                    
                </a>
                        </div>
                                 
                        <?php }?>
                    </div>
                    
                 
                </div>
                   <?php }?>             
        </div>
    </div>
    <?php include "includes/footer.php";?>

    <script language="Javascript" type="text/javascript" src='js/script.js'></script>
</body>
</html>