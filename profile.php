<?php 
include ("includes/header.php");
session_id();
include "function.php";
addItemToCart();
addFavorite();
buyItem();
updateAddress();
deleteCart();
deleteFavorite();
$query_user_id=queryUserId();
while($row=mysqli_fetch_assoc($query_user_id)){
    $user_id=$_SESSION['user_id'];
    
    $user_name=$row['user_name'];
    $_SESSION['user_name']=$user_name;
    $user_full_name=$row['user_full_name'];
    $_SESSION['user_full_name']=$user_full_name;
    $user_email=$row['user_email'];
    $_SESSION['user_email']=$user_email;
    $user_image=$row['user_photo'];
    $_SESSION['user_image']=$user_image;
    $user_role=$row['user_role'];
    $user_wallet=$row['wallet'];
}


$profile=$_GET['profile'];
?>
<body>
<div class="container vh-100 ">
    <div class="row mt-3 g-1">  
   <div class="col-md-3  ">
        <div class="profile-side-bar ">
            <div class="py-4 px-3 mt-1 bg-dark-blue profile-head d-flex">
              <img src="images/user/<?php echo $user_image;?>" alt="">
              <div class="d-inline-bock px-3">
                 <h5 class="mb-2 fw-bold"><?php echo $user_name;?></h5> 
                 <span class="text-muted"><?php echo $user_role;?></span>
                 <span class="wallet p-1"><?php echo $user_wallet;?></span>
              </div>
            

            </div>
         
         <div class="bg-light-blue py-4  mt-1 profile-body">
            <ul>
              <li class="">
             <a href="profile.php?profile=my_profile" class=" text-decoration-none text-dark <?php if($profile=="my_profile"){ echo "active" ; } ?>  "> <h5 class="py-1 fw-bold ">My Profile</h5>
          
            </a> 

            </li>
            <li >
                <a href="profile.php?profile=my_order" class=" text-decoration-none text-dark <?php if($profile=="my_order"){ echo "active" ; } ?> d-flex justify-content-between"><h5 class="py-1 fw-bold">My Order</h5>
                </a>
            </li>  
            <li>
                <a href="profile.php?profile=my_favorite" class=" text-decoration-none text-dark <?php if($profile=="my_favorite"){ echo "active" ; } ?> d-flex justify-content-between "><h5 class="py-1 fw-bold">My Favorite</h5>
                </a>
            </li>
            <li>
                <a href="profile.php?profile=my_cart" class=" text-decoration-none text-dark <?php if($profile=="my_cart"){ echo "active" ; } ?> d-flex justify-content-between"><h5 class="py-1 fw-bold">My Cart</h5>
                </a>
            </li>
            <li>
                <a href="home.php" class=" text-decoration-none text-dark d-flex justify-content-between"><h5 class="py-1 fw-bold">Home</h5>
              </a>
            </li>
            <hr>
            <li>
                <a href="logout.php" class="text-decoration-none text-dark">\
                  <h5 class="py-1 fw-bold">Logout</h5>   
                </a>
                
            </li>
            </ul>
            
             
            
            
            
            
            
              
         </div>
        
        </div>
        
    </div>
    <?php
    if($profile=="my_profile"){
       include "my_profile.php" ; 
    }
    else if ($profile=="my_order"){
        include "my_order.php" ;
    }
    else if ($profile=="my_cart"){
       
        include "my_cart.php" ;
       
    }
    else if ($profile=="my_favorite") {
        include "my_favorite.php" ;
    }
    else {
        include "buy_item.php";
    }
    
    ?>
</div>
 </div>
 <!-- Bootstrap Dropdown is built on the third-party library popper which provides dynamic positioning. So remember to include popper.min.js file before Bootstrap javascript or include bootstrap.bundle.min.js / bootstrap.bundle.js which contains Popper.\
       -->
    
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       
<script language="JavaScript" type="text/javascript" src='js/script.js'></script>
</body>
</html>