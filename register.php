<?php include 'includes/header.php';
include 'function.php';
createUser();
?>
    <body>
       <div class="container-fluid">
            <div class="row ">
                <div class="col-md-7 px-0">
                    <img src="images/shop-header.jpg" alt="" class="w-100 ">
                </div>
                <div class="col-lg-5 col-md-6">
                    
                   <div class="sign-up p-5">
                        <div id="head">
                            <h1>Sign Up</h1>
                        </div>
                       
                        <form action="" method="post">
                        <div class=" pt-3">
                            <h5>Full Name</h5>
                            <input type="text" class="form-control shadow-none" placeholder="Name" name="user_full_name">
                        </div>
                        <div class=" pt-3" id="email">
                            <h5>Email</h5>
                            <input type="email" class="form-control shadow-none" id="user_email" placeholder="Email" name="user_email" >
                        </div>
                        <div class="pt-3">
                            <h5>Username</h5>
                            <input type="text" class="form-control shadow-none has-error" placeholder="Username" name="user_name">
                        </div>
                        <div class="pt-3" id="password">
                           <h5>Password</h5>
                            <input type="password" class="form-control shadow-none" placeholder="Password" name="user_password" id="user_password"> 
                        </div>
                        <div class="pt-3" id="confirm_password">
                        <h5>Confirm Password</h5>
                        <input type="password" class="form-control shadow-none" placeholder="Confirm Password" name="user_confirm_password" id="user_confirm_password">
                        
                        </div>
                        <div class="pt-3">
                           <h5>Phone Number</h5>
                            <input type="tel" id="user_phone_number" class="form-control shadow-none" name="user_phone_number"> 
                        </div>
                        <div class="pt-3">
                           <h5>Address</h5>
                           <textarea name="user_address" id="" cols="56" rows="5" ></textarea>
                        </div> 
                        <br>
                        <div class="pt-3">
                            <input type="checkbox" class="" name="terms" > <span class='terms'>I agree the terms of user</span>   
                        </div>
                        <br>
                        <div class="d-flex justify-content-between align-items-center">
                           <button class="btn sign-up-button" name='create_user' type='submit'>Sign Up</button>
                            <div class="d-inline-block d-flex align-items-center pl-3">
                                <span >Sign In</span> 
                               <a href="signin.php" class="d-flex align-items-center" style="text-decoration:none;color:black;"><i class=" fa-solid fa-arrow-right "></i></a> 
                            </div>
                           
                          
                            
                        </div>
                         </form>  
                   </div>
             
                </div>
            </div>
                
        </div>
       


        <?php include 'includes/footer.php'; ?>
        <script language="JavaScript" type="text/javascript" src='js/script.js'>
       
       </script>
    </body>
    </html>