<?php
include "../function.php";
include "header/header.php";
deleteUsers();


?>
    <div class=" user-lists  p-2 ">
        <h4 >User Lists</h4>
        <span>If you want to add users,</span> <a href="add_user.php" class="btn btn-secondary">Add User</a>
        <hr class="user-lists-hr">
        <h4>List of Users</h4>
        <table class="table table-striped text-dark">
            <thead>
            <tr>
            <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phonenumber</th>
                <th scope="col">Photo</th>
                <th scope="col">Role</th>
                <th scope="col">Wallet</th>
                <th scope="col">Delete</th>
                <th scope="col">Modify</th>
            </tr>
            </thead>
            <?php 
            $query_users_result=queryUsers();
            while($row=mysqli_fetch_assoc($query_users_result)){
                $user_id=$row['user_id'];
                $user_name=$row['user_name'];
                $user_email=$row['user_email'];
                $user_address=$row['user_address'];
                $user_phone_number=$row['user_phone_number'];
                $user_photo=$row['user_photo'];
                $user_role=$row['user_role'];
                $user_wallet=$row['wallet'];
                
            ?>
        
            <tbody >
                <tr>
                    <td><?php echo $user_name; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td><?php echo $user_address; ?></td>
                    <td><?php echo $user_phone_number; ?></td>
                    <td> <img src="../images/user/<?php echo $user_photo; ?>" alt="<?php echo $user_name; ?>" style="width:40px;height:50px;"> </td>
                    <td><?php echo $user_role; ?></td>
                    <td><?php echo $user_wallet; ?></td>
                    <td><a href="user.php?del_user=<?php echo $user_id;?>" class="btn btn-secondary">Delete</a></td>
                    <td><a href="modify_user.php?user_id=<?php echo $user_id;?>" class="btn btn-secondary">Modify</a></td>
                   
                </tr>
                
            </tbody>
            <?php }?>
        </table>
      
       

    </div>
    <?php
include "header/footer.php";
?>