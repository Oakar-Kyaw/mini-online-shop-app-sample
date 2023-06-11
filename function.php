<?php
include "includes/db.php";
function buyItem(){
    global $connection;
    if(isset($_POST['buy_item'])){
        $user_name=$_SESSION['user_name'];
        $item_price=$_POST['item_price'];
        $number_of_items=$_POST['number_of_item'];
        $item_price_result=$item_price*$number_of_items;
        $user_query="SELECT * FROM users WHERE user_name= '{$user_name}'";
        $user_query_result=mysqli_query($connection,$user_query);
        while($row=mysqli_fetch_assoc($user_query_result)){
            $user_wallet=$row['wallet'];
        }
        if($user_wallet>$item_price_result){
            $item_name=$_POST['item_name'];
            
            $date=date(' l , jS , F Y');
            
            $user_address=$_POST['user_address'];
            
            $user_left_money=$user_wallet-$item_price_result;
            
            $orders="INSERT INTO orders 
            (user_name , 
            item_name ,
            items_number ,
            order_date ,
            user_address ,
            item_price ,
            user_accept_state )
            VALUES ('{$user_name}' , 
            '{$item_name}' ,
            {$number_of_items} ,
            '{$date}' ,
            '{$user_address}' ,
             {$item_price_result} , 
             'waiting' ) 
            ";
            $order_result=mysqli_query($connection,$orders);
            $update_user_wallet="UPDATE users SET wallet= {$user_left_money} WHERE user_name= '{$user_name}' ";
            $update_user_wallet_result=mysqli_query($connection,$update_user_wallet);
            header("LOCATION: profile.php?profile=my_profile");
        }
        else {
            echo "<h2 class='text-danger'>You don't have enough balances to purchase this item</h2>";
            
        }
    }
}
function signIn(){
    global $connection;
    if(isset($_POST['sign_in'])){
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $sign_in_user="SELECT * FROM users WHERE user_email= '{$user_email}' ";
        $sign_in_user_query=mysqli_query($connection,$sign_in_user);
        while($row=mysqli_fetch_assoc($sign_in_user_query)){
            $id=$row['user_id'];
            $password=$row['user_password'];
            if(password_verify($user_password,$password)){
                $_SESSION['user_id']=$id;
                header("LOCATION: profile.php?profile=my_profile");
            }
        }
    }
}

function search($search_word){
    global $connection;
        $query_search="SELECT * FROM items WHERE item_search_words LIKE '{$search_word}%' ";
        $query_search_result=mysqli_query($connection,$query_search);
        return $query_search_result;
    
}

//categories
function createCategories(){
    global $connection;
    if(isset($_POST['create_categories'])){
       $categories_title=$_POST['categories_title'];
       $post_categories_title="INSERT INTO categories
       (cat_title)
       VALUES (
       '{$categories_title}' ) ";
       $create_categories_title=mysqli_query($connection,$post_categories_title);
       if(!$create_categories_title){
            die("Post Failed ". mysqli_error($connection));
       }

    }
}

function queryCategories(){
    //if you want to use connection in function
    global $connection;
    $categories="SELECT * FROM categories";
    $categories_query=mysqli_query($connection,$categories);
    return $categories_query;
}

//cart 

function addItemToCart(){
     global $connection;
     if(isset($_GET['add_cart'])){
        $user_name=$_SESSION['user_name'];
        $user_cart_item_id=$_GET['add_cart'];
        $query_item_using_id=queryPostUsingId($user_cart_item_id);
        while($row=mysqli_fetch_assoc($query_item_using_id)){
            $items_name=$row['item_name'];
        }
       
       $add_cart="INSERT INTO users_carts 
       (user_name , 
       user_cart_item_name , 
       item_id )
       VALUES ('{$user_name}' , 
       '{$items_name}' ,
       {$user_cart_item_id} ) 
       ";
       $add_cart_query=mysqli_query($connection,$add_cart);
       header("LOCATION: profile.php?profile=my_cart");
     }
}

function queryCart(){
    global $connection;
    $user_name=$_SESSION['user_name'];
   
    $query_item_name="SELECT * FROM users_carts WHERE user_name= '{$user_name}'"; 
    
    $item_name_query=mysqli_query($connection,$query_item_name);
    return $item_name_query;
}

function queryCartUsingIdAndUsername($id){
    global $connection;
    $user_name=$_SESSION['user_name'];
   
    $query_item="SELECT * FROM users_carts WHERE user_name= '{$user_name}' AND item_id= {$id}"; 
    
    $item_query=mysqli_query($connection,$query_item);
    return $item_query;
}

function queryPostUsingId($item_id){
    global $connection;
    $post_using_id="SELECT * FROM items WHERE id= {$item_id} ";
    $post_using_id_query=mysqli_query($connection,$post_using_id);
    return $post_using_id_query;
}

function deleteCart(){
    global $connection;
    if(isset($_GET['del_cart'])){
        $id=$_GET['del_cart'];
     $delete_cart="DELETE FROM users_carts WHERE item_id= {$id} ";
    $query_favorite=mysqli_query($connection,$delete_cart); 
    header('LOCATION: profile.php?profile=my_cart');  
    }
    
}

//favorite



function addFavorite(){
    global $connection;
    if(isset($_GET['add_favorite'])){
        $user_name=$_SESSION['user_name'];
        $favorite_items_id=$_GET['add_favorite'];
        $query_result=queryPostUsingId($favorite_items_id);
        while($row=mysqli_fetch_assoc($query_result)){
            $items_name=$row['item_name'];
        }
        $add_favorite="INSERT INTO users_favorite (user_name , items_name ,    item_id ) VALUES ('{$user_name}' , '{$items_name}' , '{$favorite_items_id}' ) ";
        $favorite_result= mysqli_query($connection,$add_favorite);
        header("LOCATION: profile.php?profile=my_favorite");

    }
    

}
function queryFavorite(){
    global $connection;
    $user_name=$_SESSION['user_name'];
   
    $query_favorite_item_name="SELECT * FROM users_favorite WHERE user_name= '{$user_name}'"; 
    
    $favorite_item_name_query=mysqli_query($connection,$query_favorite_item_name);
    return $favorite_item_name_query;
}

function queryFavoriteUsingIdAndUsername($id){
    global $connection;
    $user_name=$_SESSION['user_name'];
   
    $query_favorite="SELECT * FROM users_favorite WHERE user_name= '{$user_name}' AND item_id= {$id}"; 
    
    $favorite_item_query=mysqli_query($connection,$query_favorite);
    return $favorite_item_query;
}

function deleteFavorite(){
    global $connection;
    if(isset($_GET['del_favorite'])){
    $id=$_GET['del_favorite'];
    $delete_favorite="DELETE FROM users_favorite WHERE item_id= {$id} ";
    $query_favorite=mysqli_query($connection,$delete_favorite);
    header('LOCATION: profile.php?profile=my_favorite');  
}
}
//order
function queryOrder(){
    global $connection;
    $order_query="SELECT * FROM orders";
    $order_query_result=mysqli_query($connection,$order_query);
    return $order_query_result;
}

function updateAddress(){
    global $connection;
    if(isset($_POST['update_address'])){
        $user_address=$_POST['user_address'];
        $update_address="UPDATE orders SET user_address='{$user_address}'";
        $update_result=mysqli_query($connection,$update_address);
        header('LOCATION: profile.php?profile=my_order');
    }
    
}

function updateUserAcceptState(){
    global $connection;
    if(isset($_POST['update_user_accept_state'])){
        $order_id=$_POST['order_id'];
        $user_accept_state=$_POST['user_accept_state'];
        $update_accept_state="UPDATE orders SET user_accept_state='{$user_accept_state}' WHERE id= {$order_id} ";
        $update_result=mysqli_query($connection,$update_accept_state);
        
    }
    
}

//post

function createPost(){
    global $connection;
    if(isset($_POST['create_post'])){
        
        $item_name=$_POST['item_name'];
        $item_cat_name=$_POST['cat_name'];
        $item_price=$_POST['item_price'];
        $item_description=$_POST['item_description'];
        $item_rating=$_POST['item_rating'];
        $item_date=date('d-m-y');
        $post_image=$_FILES['item_photo']['name'];
        $temp_file=$_FILES['item_photo']['tmp_name'];
        $item_collection_categories=$_POST['item_collection_categories'];
        $item_search_word=$_POST['item_search_word'];
        move_uploaded_file($temp_file,"../images/shop_image/$post_image");
       
        $create_post="INSERT INTO items
            (item_name,
            cat_title,
            item_price,
            item_description,
            item_rating,
            item_date,
            item_photo,
            item_collections_categories,
            item_view_counts,
            item_search_words)
            VALUES ('{$item_name}' ,
            '{$item_cat_name}' ,
             {$item_price} ,
            '{$item_description}' ,
             {$item_rating} ,
            '{$item_date}' ,
            '{$post_image}' ,
            '{$item_collection_categories}' ,
            '0' , 
            '{$item_search_word}') " ;
            
            $create_post_result=mysqli_query($connection,$create_post); 
            
            if(!$create_post_result){
                die("Post Failed ".mysqli_errno($connection));
            }
            


    }
}

function queryPost(){
    global $connection;
    $query_post="SELECT * FROM items";
    $query_post_result=mysqli_query($connection,$query_post);
    return $query_post_result;
}

function queryPostId($post_id){
    global $connection;
      
       $query_post="SELECT * FROM items WHERE id= $post_id ";
        $query_post_result=mysqli_query($connection,$query_post);
        return $query_post_result; 
    
    
}

function deletePost(){
    global $connection;
    if(isset($_GET['del_post'])){
        $id=$_GET['del_post'];
        $delete_post="DELETE FROM items WHERE id= $id ";
        $delete_post_result=mysqli_query($connection,$delete_post);
        
    }
    
}




//user
function createUser(){
    global $connection;
   
    if(isset($_POST['create_user'])){
        if(empty($_FILES['user_photo']['name'])||empty($_POST['user_role'])||empty($_POST['user_wallet'])){
            $user_image="null";
            $user_role="customer";
            $user_wallet=0;
        }
        else {
            $user_image=$_FILES['user_photo']['name'] ;
            $user_role=$_POST['user_role'];
            $user_wallet=$_POST['user_wallet'];
            $temp_file=$_FILES['user_photo']['tmp_name']; 
            move_uploaded_file($temp_file,"../images/user/$user_image"); 
        }
        $full_name=$_POST['user_full_name'];
        $user_name=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $password=$_POST['user_password'];
        $confirm_password=$_POST['user_confirm_password'];
        if( $password==$confirm_password){
            $user_password=password_hash($password,PASSWORD_BCRYPT);
            $user_address=$_POST['user_address'];
            $user_phone_number=$_POST['user_phone_number'];
            $create_user="INSERT INTO users
            (user_full_name,
            user_name,
            user_email,
            user_password,
            user_address,
            user_phone_number,
            user_photo,
            user_role,
            wallet)
            VALUES ('{$full_name}' ,
            '{$user_name}' ,
            '{$user_email}' ,
            '{$user_password}' ,
            '{$user_address}' ,
            '{$user_phone_number}' ,
            '{$user_image}' ,
            '{$user_role}' ,
            {$user_wallet}) " ;
            
            $create_user_result=mysqli_query($connection,$create_user); 
            
            if(!$create_user_result){
                die("Post Failed ".mysqli_errno($connection));
            }
        }
        else {
       
        }
        
            


    }
}


function queryUsers(){
    global $connection;
    $query_users="SELECT * FROM users";
    $query_users_result=mysqli_query($connection,$query_users);
    return $query_users_result;
}

function queryUserId(){
    global $connection;
       $id=$_SESSION['user_id'];
       $query_users="SELECT * FROM users WHERE user_id= $id ";
        $query_users_result=mysqli_query($connection,$query_users);
        return $query_users_result; 
    
    
}

function queryUsersIdInAdmin(){
    global $connection;
    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
        $query_users="SELECT * FROM users WHERE user_id= $user_id ";
        $query_users_result=mysqli_query($connection,$query_users);
        return $query_users_result; 
    }
}

function updateUser($update_user_id, $update_full_name,$update_user_name,$update_user_email,$update_user_address,$update_user_phone_number,$update_user_image,$update_user_role,$update_user_wallet){
    global $connection;
    
    $edit_user="UPDATE users SET user_full_name ='{$update_full_name}', user_name ='{$update_user_name}', user_email ='{$update_user_email}', user_address ='{$update_user_address}', user_phone_number ={$update_user_phone_number}, user_photo ='{$update_user_image}', user_role ='{$update_user_role}', wallet ={$update_user_wallet} WHERE user_id= {$update_user_id} ";
    
    $edit_user_query=mysqli_query($connection,$edit_user);
   
    
   

    
}


function deleteUsers(){
    global $connection;
    if(isset($_GET['del_user'])){
        $id=$_GET['del_user'];
        $delete_users="DELETE FROM users WHERE user_id= $id ";
        $delete_users_result=mysqli_query($connection,$delete_users);
        return $delete_users_result;
    }
    
}


?>