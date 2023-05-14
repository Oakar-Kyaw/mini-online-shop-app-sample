<?php include "header/header.php";
include "../function.php";

if(isset($_POST['update_post'])){
    $update_post_id=$_GET['post_id'];
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
            $post_id=$_GET['post_id'];
            $query_post_result=queryPostId($post_id);
            while($row=mysqli_fetch_assoc($query_post_result)){
                $cat_title=$row['cat_title'];
                $item_name=$row['item_name'];
                $item_price=$row['item_price'];
                $item_description=$row['item_description'];
                $item_rating=$row['item_rating'];
                $item_date=$row['item_date'];
                $item_photo=$row['item_photo'];
                echo $cat_title;
                $item_collections_categories=$row['item_collections_categories'];
                $item_search_word=$row['item_search_words'];
                
            ?>
            <div>
                <h4 class="text-dark">Item Name</h4>
                <input type="text" name="item_name" value="<?php echo $item_name; ?>" class="form-control shadow-none p-2" placeholder="Item Name">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Categories Title</h4>
                <select name="cat_title" id="" class="form-select shadow-none" >
                <?php
                    $query_categories_result=queryCategories();
                    echo "hello";
                    while($row=mysqli_fetch_assoc($query_categories_result)){
                        $categories_title=$row['cat_title'];  
                        
                        echo "<option value='<?php echo $categories_title'><?php echo $categories_title?></option>
                        ";
                    }
                    ?>
                   </select>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Item Price</h4>
                <input type="text" name="item_price" value="<?php echo $item_price; ?>" class="form-control shadow-none p-2" placeholder="Item Price">
            </div>
            
            <div class="pt-3">
                <h4 class="text-dark">Item Description</h4>
                <textarea name="item_description" id="" cols="30" rows="10" class="form-control shadow-none"><?php echo $item_description; ?></textarea>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Item Rating</h4>
                <?php echo $item_rating;?>
                <select name="item_rating" id="" class="form-select shadow-none" value=<?php echo $item_rating?>>
                    <option value="<?php echo $item_rating?>"><?php echo $item_rating?></option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option></select>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Date</h4>
                <input type="date" name="item_date" class="form-control shadow-none p-2" value="<?php echo $item_date?>" >
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Photo</h4>
                <input type="file" name="item_photo" classs="text-white" accept="images/*" id="inputImage" onchange="previewFile(this)">
                <img src="../images/shop_image/<?php echo $item_photo ?>" class="imageInput" alt="photo" style="width:200px;height:150px;">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Collection Categories</h4>
                <select name="item_collection_categories" id="" class="form-select shadow-none" value="<?php echo $item_collections_categories ?>">
                    <option value="none">None</option>
                    <option value="promotion">Promotion</option>
                    <option value="best_sellers">Best Seller</option>
                    <option value="features">Features</option>
                    <option value="new_arrivals">New Arrivals</option>
                </select>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Search Word</h4>
                <input type="text" name="item_search_word" class="form-control shadow-none p-2" placeholder="Search Word..." value="<?php $item_search_word ?>">
            </div>
            <button class="btn btn-primary mt-2" type="submit" name="update_user">Modify</button>
            
            
            
            
            <?php } ?>
       
           
        </div>
</form>
<?php include "header/footer.php"; 
?>