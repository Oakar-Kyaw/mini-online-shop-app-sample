<?php include "header/header.php";
include "../function.php";
createUser();
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
            <div id="head">
             <h1 class="text-dark text-center">
            Add User
            </h1>   
            </div>
            
           
            <div>
                <h4 class="text-dark">Full Name</h4>
                <input type="text" name="user_full_name" value="" class="form-control shadow-none p-2" placeholder="Full Name">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Username</h4>
                <input type="text" name="user_name" value="" class="form-control shadow-none p-2" placeholder="Username">
            </div>
            <div class="pt-3" id="email">
                <h4 class="text-dark">Email</h4>
                <input type="email" name="user_email" class="form-control shadow-none p-2" placeholder="Email" id="user_email">
            </div>
            <div class="pt-3" id="password">
                <h4 class="text-dark">Password</h4>
                <input type="password" name="user_password" class="form-control shadow-none p-2" placeholder="Password" id="user_password">
            </div>
            <div class="pt-3" id="confirm_password">
                <h4 class="text-dark">Confirm Password</h4>
                <input type="password" name="user_confirm_password" class="form-control shadow-none p-2" placeholder="Password" id="user_confirm_password">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Address</h4>
                <textarea name="user_address" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Phone Number</h4>
                <input id="user_phone_number" type="tel" name="user_phone_number" class="form-control mx-5 px-2 shadow-none"  >
                
            </div>
            
            <div class="pt-3">
                <h4 class="text-dark">Photo</h4>
                <input type="file" name="user_photo" classs="text-white" accept="images/*" id="inputImage" onchange="previewFile(this)">
                <img src="" class="imageInput" alt="photo" style="width:200px;height:150px;">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">User Role</h4>
                <select name="user_role" id="" class="form-select shadow-none">
                    <option value="administrater">Administrater</option>
                    <option value="customer">Customer</option>
                    
                </select>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Wallet</h4>
                <input type="number" name="user_wallet" class="form-control shadow-none p-2" placeholder="Wallet">
            </div>
            <button class="btn btn-primary mt-2" name="create_user">Submit</button>
            
            
            
            
            
       
           
        </div>
</form>
<?php include "header/footer.php"; 
?>
<script src="js/script.js"></script>