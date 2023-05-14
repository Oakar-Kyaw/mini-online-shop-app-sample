<?php include "header/header.php";
include "../function.php";

if(isset($_POST['update_user'])){
    $update_user_id=$_GET['user_id'];
    $update_full_name=$_POST['full_name'];
   
    $update_user_name=$_POST['user_name'];
    $update_user_email=$_POST['user_email'];
    $password_query="SELECT * FROM users WHERE user_id=$update_user_id ";
    $update_user_image=$_FILES['user_photo']['name'];
    $update_user_address=$_POST['user_address'];
    $update_user_phone_number=$_POST['user_phone_number'];
    
    $update_user_role=$_POST['user_role'];
    $update_user_wallet=$_POST['user_wallet'];
    if(empty($update_user_image)){
        $image_query="SELECT * FROM users WHERE user_id= $update_user_id";
        $photo_query=mysqli_query($connection,$image_query);
        while ($row=mysqli_fetch_assoc($photo_query)){
            $update_user_image=$row['user_photo'];
        }
    }
    else {
        
        $temp_file=$_FILES['user_photo']['tmp_name'];
        move_uploaded_file($temp_file,"../images/user/$update_user_image");
    }
    updateUser($update_user_id, $update_full_name,$update_user_name,$update_user_email,$update_user_address,$update_user_phone_number,$update_user_image,$update_user_role,$update_user_wallet);
    
}
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
            <h1 class="text-dark text-center">
             Modify User
            </h1>
            <?php 
            $query_users_result=queryUsersIdInAdmin();
            while($row=mysqli_fetch_assoc($query_users_result)){
                $user_id=$row['user_id'];
                $user_full_name=$row['user_full_name'];
                $user_name=$row['user_name'];
                $user_email=$row['user_email'];
                $user_address=$row['user_address'];
                $user_phone_number=$row['user_phone_number'];
                $user_photo=$row['user_photo'];
                $user_role=$row['user_role'];
                $user_wallet=$row['wallet'];
                
            ?>
            <div>
                <h4 class="text-dark">Full Name</h4>
                <input type="text" name="full_name" value="<?php echo $user_full_name; ?>" class="form-control shadow-none p-2" placeholder="Full Name">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Username</h4>
                <input type="text" name="user_name" value="<?php echo $user_name; ?>" class="form-control shadow-none p-2" placeholder="Username">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Email</h4>
                <input type="email" name="user_email" class="form-control shadow-none p-2" placeholder="Email" value="<?php echo $user_email; ?>">
            </div>
            
            <div class="pt-3">
                <h4 class="text-dark">Address</h4>
                <textarea name="user_address" id="" cols="30" rows="10" class="form-control shadow-none"><?php echo $user_address; ?></textarea>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Phone Number</h4>
                <input id="user_phone_number" type="tel" name="user_phone_number" class="form-control mx-5 px-2 shadow-none"  value="<?php echo $user_phone_number; ?>">
                
            </div>
            
            <div class="pt-3">
                <h4 class="text-dark">Photo</h4>
                <input type="file" name="user_photo" classs="text-white" accept="images/*" id="inputImage" onchange="previewFile(this)">
                <img src="../images/user/<?php echo $user_photo; ?>" class="imageInput" alt="photo" style="width:200px;height:150px;">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">User Role</h4>
                <select name="user_role" id="" class="form-select shadow-none" >
                    <?php
                    if($user_role=="customer"){
                        ?>
                        <option value="customer">Customer</option>
                        <option value="administrater">Administrater</option>
                        
                   <?php } else{ ?>
                        <option value="administrater">Administrater</option>
                        <option value="customer">Customer</option>
                    <?php } ?>
                </select>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Wallet</h4>
                <input type="number" name="user_wallet" class="form-control shadow-none p-2" placeholder="Wallet" value="<?php echo $user_wallet; ?>">
            </div>
            <button class="btn btn-primary mt-2" type="submit" name="update_user">Modify</button>
            
            
            
            
            <?php } ?>
       
           
        </div>
</form>
<?php include "header/footer.php"; 
?>