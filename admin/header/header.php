<?php 
session_start();
$menuactive=" ";
$useractive=" ";
if(isset($_GET['menu'])){
  $menu=$_GET['menu'];
 if($menu=='shopmenu'){
  $menuactive="active";
 }
}



?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Genos&family=Mukta&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="./css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--intel-phone -->        
        <link
         rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 

    </head>
    <body>
      <div id="wrapper">
        <div id="page-wrapper">
       <div class="container-fluid">
         <div class="row g-0">
            <nav class="col-2 col-md-2 bg-dark ">
              <div class="text-center">
                <h4 class= "d-lg-inline d-none dashboard text-white" >
                    Dashboard
                </h4> 
              </div>
           
                <div class="mt-2 line"></div>
                
                 <div class="nav-item p-1 <?php echo $menuactive?>" >
                   <a href="./shopmenu.php" class='nav-link'>
                   <i class="fa-sharp fa-solid fa-bag-shopping <?php echo $menuactive?>"></i>
                      <h5 class="d-lg-inline  d-none menu-text <?php echo $menuactive?>">Shop Menu</h5>
                
                 </div>
               
              
             
               
                 <div class="nav-item  p-1">
                   <a href=" " class="nav-link collapsed angle-right-order " data-bs-target="#collapsedThree" data-bs-toggle="collapse" aria-controls="collapsedThree" aria-expanded="true">
                   <i class="fa-sharp fa-solid fa-shirt"></i>
                    <h5 class="d-lg-inline d-none order-text ">Order</h5>
                    <i class="fa-sharp fa-solid fa-angle-right angle-right"></i>  
                  </a>
                  <div class="collapse mt-2" id="collapsedThree" aria-labelledby="headingTwo">
                    <ul ><a class="no-underline collapse-item" href="./allorder.php">All Order</a></ul>
                     
                      <ul><a href="./delivered_order.php" class="no-underline collapse-item">Delievered</a></ul>
                </div>
                 </div>
                  <div class="nav-item p-1">
                    <a href="user.php" class="nav-link">
                    <i class="fa-sharp fa-solid fa-user"></i>
                      <h5 class="d-lg-inline  d-none user-text">Users</h5>
                    </a>
                  </div>
                
                
                
            </nav>
            <div class="col-10 col-md-10 menu-list bg-white">
              
                