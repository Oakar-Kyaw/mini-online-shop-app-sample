<?php 
include 'includes/header.php';
include 'function.php';
buyItem();
if (isset($_GET['buy_item_id'])){
    $id=$_GET['buy_item_id'];
    $query_item_using_id= queryPostUsingId($id);
    while($row=mysqli_fetch_assoc($query_item_using_id)){
        $item_image=$row['item_photo'];
        $item_name=$row['item_name'];
        $item_price=$row['item_price'];
        $item_description=$row['item_description'];
        $item_rating=$row['item_rating'];
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <img src="images/shop_image/<?php echo $item_image ?>" class="w-100 vh-100" alt="">
            </div>
            
        </div>
        <div class="col-md-6 ">
            <div class="buy-content px-3 py-4">
                <form action="" method="post">
               <h1><?php echo $item_name ?>
                <input type="text" name="item_name" value="<?php echo $item_name?>" hidden>
                </h1> 
               <?php 
                for($i=0;$i<$item_rating;$i++){
                     echo "<i class='fa-sharp fa-solid fa-star text-red mt-3'></i> ";
                    }
                ?>
               <h5 class="fw-bold mt-2"><?php echo $item_price ?>Kyats
               <input type="number" name="item_price" value="<?php echo $item_price?>" hidden></h5>
                <h6 class="text-muted mt-2"><?php echo $item_description ?></h6>
                <div class="py-1 mt-2">
                  <input type="number" class="form-control shadow-none text-decoration-none" placeholder="Number of Item" name="number_of_item">
                  
                </div>
               
                <textarea  id="" cols="15" rows="5" class="form-control shadow-none text-decoration-none mt-2" placeholder="Address" name="user_address"></textarea>
                <button type="submit"  class="btn-outline mt-3" name="buy_item">Buy</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
    <!-- Bootstrap Dropdown is built on the third-party library popper which provides dynamic positioning. So remember to include popper.min.js file before Bootstrap javascript or include bootstrap.bundle.min.js / bootstrap.bundle.js which contains Popper.\
       -->
    
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>