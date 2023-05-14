<?php 
include "header/header.php";
include "../function.php";
createPost();
createCategories();
?>
<section>


<div class="container vh-100">
 <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8 py-3 px-5 shop-menu-list">
            <h1 class="text-dark">
            Shop Menu
            </h1>
            <span>If you want to see post list,</span> <a href="all_post.php" class="btn btn-secondary">See Posts</a>
            <div>
                <h4 class="text-dark">Item Name</h4>
                <input type="text" name="item_name" value="" class="form-control shadow-none p-2" placeholder="Name">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Categories Title</h4>
                <select name="cat_name" id="" class="form-select shadow-none py-2">
                    <?php 
                        $categories_query=queryCategories();
                        while ($row=mysqli_fetch_assoc($categories_query)){
                            $categories_title=$row['cat_title'];
                            echo "<option value=$categories_title class='t-3 pb-2'> $categories_title</option>";
                          } 
                       
                    ?>
                   
                </select>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Item Price</h4>
                <input type="number" name="item_price" class="form-control shadow-none p-2">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Item Description</h4>
                <textarea name="item_description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Item Rating</h4>
                <select name="item_rating" id="" class="form-select shadow-none">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option></select>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Date</h4>
                <input type="date" name="item_date" class="form-control shadow-none p-2">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Photo</h4>
                <input type="file" name="item_photo" classs="text-white" accept="images/*" id="inputImage" onchange="previewFile(this)">
                <img src="" class="imageInput" alt="photo" style="width:200px;height:150px;">
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Collection Categories</h4>
                <select name="item_collection_categories" id="" class="form-select shadow-none">
                    <option value="none">None</option>
                    <option value="promotion">Promotion</option>
                    <option value="best_sellers">Best Seller</option>
                    <option value="features">Features</option>
                    <option value="new_arrivals">New Arrivals</option>
                </select>
            </div>
            <div class="pt-3">
                <h4 class="text-dark">Search Word</h4>
                <input type="text" name="item_search_word" class="form-control shadow-none p-2" placeholder="Search Word...">
            </div>
            <button class="btn btn-primary mt-2" name="create_post">Submit</button>
            
            
            
            
            
       
           
        </div>
        <div class="col-md-4 py-3 px-5 categories_title">
            <h1 class="text-dark">
                Categories
            </h1>
            <div>
                <h4 class="text-dark">Categories Title</h4>
                <input type="text" class="form-control shadow-none text-decoration_none " name="categories_title" placeholder="Categories Title">
                <button class="btn btn-primary mt-2" name="create_categories">Submit</button>
            </div>
        </div>
         </form>
    </div>
</div>
</section>
<?php 
include "header/footer.php";

?>