<?php 
include "includes/db.php";
include "includes/header.php";
include "function.php";
addItemToCart();
addFavorite();

$user_id="";
if(!empty($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
   
}

?>
<body> 
    
    <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-light py-2">
            <div class="container">
                <a class="navbar-brand d-flex justify-content-between align-item-center">
                <i class="fa-sharp fa-solid fa-shop py-2"></i>
                <span class="text-uppercase px-2 py-2">Online Shopping</span>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                    <i class="navbar-toggler-icon"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mx-auto text-center ">
                        <li class="nav-item px-2 py-2">
                            <a href="" class="nav-link  text-uppercase text-dark">Home</a>
                        </li>
                        <li class="nav-item px-2 py-2 d-flex justify-content-center align-items-center"> 
                         <div class="dropdown py-2 px-2 ">
                           <a class="dropdown-toggle text-decoration-none text-dark" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-uppercase">Categories</span>
    
                            </a ><ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
                            <?php 
                            $categories_query=queryCategories();
                            while($row=mysqli_fetch_assoc($categories_query)){
                                $categories_title=$row['cat_title'];
                                echo "<li><a class='dropdown-item' href='categories.php?cat_title=$categories_title&id='>$categories_title</a></li>";
                            }
                            ?>
                            
                            
                            
                            </ul>
                        </div>
                        </li>
                       
  
                        <li class="nav-item px-2 py-2">
                            <a href="#contact" class="nav-link text-uppercase text-dark">Contact</a>
                        </li>
                        <?php 
                        if(empty($user_id)){
                            echo "<li class='nav-item px-2 py-2 border-0'>
                            <a href='signin.php' class='nav-link text-uppercase text-dark'>Sign In</a>
                        </li>";
                        }
                        else {
                            echo "<li class='nav-item px-2 py-2 border-0'>
                            <a href='profile.php?profile=my_profile&user_id=$user_id' class='nav-link text-uppercase text-dark'>My Profile</a>
                        </li>";
                        }
                        ?>
                        
                    </ul>
                </div>
                <!--icon button-->
                <div class='icon-button py-2'>
                    <a href="profile.php?profile=my_cart" class='text-decoration-none text-dark'>
                    <button type="button" class="position-relative btn-primary px-2" style="background-color:#F8F9FA;border:none;"><i class="fa-sharp fa-solid fa-cart-shopping "></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-pill shop-noti" style="display:none">0</span>
                    </button></a>
                    <a href="profile.php?profile=my_favorite" class='text-decoration-none text-dark'>
                    <button type="button" class="position-relative btn-primary px-2 mx-3" style="background-color:#F8F9FA;border:none;"><i class="fa-sharp fa-regular fa-heart fa-solid"> </i> 
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-pill favorite-heart" style="display:none">0</span>
                    </button></a>
                    <button type="button"style="background-color:#F8F9FA;border:none;"><i class="fa-solid fa-magnifying-glass search-button"></i> 
                    </button>
                </div>

                <!-- search  -->
                <div class="search" style="display:none;"> 
                <form action="search.php" method='post'>
                    <i class="fa-solid fa-xmark "></i>
                   
                    <input type="text" class="search-input" name='search'>
                    <button type="submit" name='submit' style="background-color:#F8F9FA;border:none;"><i class="fa-solid fa-magnifying-glass search-button-change"></i></button></form>
                </div>
                

            </div>
        </nav>
        <!--Header -->
        <header class="vh-100 carousel slide" id="header" data-ride="carousel">
            <div class="container carousel-inner h-100  d-flex align-items-center">
                <div class="carousel-item text-center active" >
                    <h2 class="text-white">Best Collection</h2>
                    <h1 class="text-white">For Our Trusted Customer</h1>
                    <button class="btn">Shop Now</button>
                </div>
                <div class="carousel-item text-center  item" >
                    <h2 class="text-white">Promotion</h2>
                    <h1 class="text-white">10% Off </h1>
                    <button class="btn">Buy Now</button>
                </div>
                <div class="carousel-item text-center item" >
                    <h2 class="text-white">Electronics Device</h2>
                    <h1 class="text-white">Trustworthy </h1>
                    <button class="btn">Buy Now</button>
                </div>
                <button class="carousel-control-prev" data-bs-target="#header" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next active-color" data-bs-target="#header" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </header>
         
         <!-- collection -->
         <section class="collection "> 
         <div class="container">
            <div class="titles text-center pt-5">
                <h2 class="d-inline-block position-relative text-uppercase">
                    New Collection
                </h2>
            </div>
            <div class="row">
                    <div class="d-flex justify-content-center filter-button-group pt-5 pb-3">
                        <button class="btn btn-active mx-2" data-filter="*">All</button>
                        <button class="btn mx-2" data-filter=".promotion">Promotion</button>
                        <button class="btn mx-2" data-filter=".best_sellers">Best Sellers</button>
                        <button class="btn mx-2" data-filter=".features">Features</button>
                        <button class="btn mx-2" data-filter=".new_arrivals">New Arrivals</button>
                        
                    </div>
                </div>
                <div class="row collection-list mt-3 ">
                 
                 
                    <?php
                        $items= "SELECT * FROM items LIMIT 10";
                        $items_query=mysqli_query($connection,$items);
                        while ($row=mysqli_fetch_assoc($items_query)){
                            $items_id=$row['id'];
                            $cat_title=$row['cat_title'];
                            $items_name=$row['item_name'];
                            $items_price=floatval($row['item_price']);
                            $items_decription=$row['item_description'];
                            $items_rating=$row['item_rating'];
                            $items_photo=$row['item_photo'];
                            $items_date=$row['item_date'];
                            $items_collections_categories=$row['item_collections_categories'];
                            
                            ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 gx-3 my-2 <?php echo $items_collections_categories;?>">
                    <div class="collection-image position-relative">
                        <img src="images/shop_image/<?php echo $items_photo;?>" alt="<?php echo $items_photo;?>" class="w-100" style="height: 250px;">
                        <span class="position-absolute d-flex align-items-center justify-content-center text-white">Sale</span>
                    </div>
                  
                <div class="text-center">
                    <?php
                    for($i=0;$i<$items_rating;$i++) {?>
                        <i class="fa-sharp fa-solid fa-star text-red mt-3"></i>
                    <?php }?>  
                    
                    <p class="text-uppercase my-1" ><?php echo $items_name;?></p>
                    <span class="fw-bold"><?php echo $items_price;?> KYATS</span>
                    <br>
                  <?php 
                  if(!empty($_SESSION['user_id'])){
                    $button=queryCartUsingIdAndUsername($items_id);
                    if($button=mysqli_num_rows($button)){
                    
                         echo "<a  href='buy_item.php?buy_item_id=$items_id ' class='btn' value='<?php echo $items_id ?>'>Buy</a>";
                    
                   
                   }
                    else {
                         echo " <button  class='btn add-cart' value='$items_id'>Add to Cart</button>"; 
                    }
                  }
                  else {
                    echo " <a href='signin.php' class='btn text-decoration-none text-dark ' value='<?php echo $items_id ?>'>Add to Cart</a>"; 
                  }
                  
                  
                  ?>
                   
               
                </div> 
            </div>
                <?php  }?>
             
           
             
            </div> 
       
         </div>   
      </section>
    
      <!-- Popular Section -->
      <section class="popular py-5">
        <div class="container">
            <div class="titles text-center">
                <h2 class="position-relative d-inline-block text-uppercase">
                    Popular Section
                </h2>
              
            </div>

            <div class="row popular-list mt-4">
                <?php 
                $popular_items ="SELECT * FROM items WHERE item_view_counts>=10 LIMIT 10 ";
                $popular_items_query= mysqli_query($connection,$popular_items);
                while ($row= mysqli_fetch_assoc($popular_items_query)){
                    $popular_items_id=$row['id'];
                    $popular_items_name=$row['item_name'];
                    $popular_items_price=floatval($row['item_price']);
                    $popular_items_rating=$row['item_rating'];
                    $popular_items_photo=$row['item_photo'];

              ?>
                
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 gy-3">
                        <div class="popular-image position-relative">
                            <img src="images/shop_image/<?php echo $popular_items_photo;?>" class="w-100" style="height: 250px;" alt="<?php echo $popular_items_photo;?>">
                             <?php 
                  if(!empty($_SESSION['user_id'])){
                    $query_favorite=queryFavoriteUsingIdAndUsername($popular_items_id);
                    if($favorite_item_query=mysqli_num_rows($query_favorite)){
                    
                         echo "<button  class='btn ' value='<?php echo $popular_items_id?>'> <i class='fa-sharp fa-solid text-danger fa-heart position-absolute heart $popular_items_name'> </i> </button>";
                    
                   
                   }
                    else {
                         echo " <button  class='btn add_favorite' value='<?php echo $popular_items_id?>'> <i class='fa-sharp fa-regular fa-heart position-absolute heart $popular_items_name'> </i> </button>"; 
                    }
                  }
                  else {
                    echo "<a href='signin.php' class='btn ' value='<?php echo $popular_items_id?>'> <i class='fa-sharp fa-regular fa-heart position-absolute heart $popular_items_name'> </i> </a>"; 
                  }
                  ?>
                           
                          
                        </div>
                        <div class="text-center">
                            <?php
                                for($i=0;$i<$popular_items_rating;$i++) {?>
                                <i class="fa-sharp fa-solid fa-star text-red mt-3"></i>
                            <?php }?>
                           
                             <p class="text-uppercase my-1" ><?php echo $popular_items_name;?></p>
                            <h6 class="fw-bold"><?php echo $popular_items_price;?> KYATS</h6>
                            <?php 
                  if(!empty($_SESSION['user_id'])){
                    $query_cart=queryCartUsingIdAndUsername($popular_items_id);
                    if($query_carts=mysqli_num_rows($query_cart)){
                    
                         echo "<a  href='buy_item.php?buy_item_id=$items_id ' class='btn' value='<?php echo $items_id ?>'>Buy</a>";
                    
                   
                   }
                    else {
                         echo " <button  class='btn add-cart' value='<?php echo $items_id; ?>'>Add to Cart</button>"; 
                    }
                  }
                  else {
                    echo " <a href='signin.php' class='btn text-decoration-none text-dark ' value='<?php echo $items_id ?>'>Add to Cart</a>"; 
                  }
                  ?>
                      
                        
                        </div>
                       

                </div>
               <?php }?>
            </div>
        </div>
      </section>
      <!-- quote-->
      <section class="quote vh-100">
        <div class="container h-100 d-flex align-items-center justify-content-center">
            <div class="quote-list text-center">
                <span class="text-uppercase text-white">With Our Product</span>
                 <h3 class="text-uppercase text-white">Enhance Your Beauty</h3>
                 <h6 class="text-uppercase text-white">Simply Awesome</h6>
                 <a href="categories.php?cat_title=&id=" class="btn">Shop Now</a>
            </div>
        </div>
      </section>
        <?php include "includes/footer.php";?>
    
    
      

         
    <!-- Carousel -->
    <script language="JavaScript" type="text/javascript" src='js/script.js'>
       
    </script>  
    </body>
</html>