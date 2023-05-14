<?php 
include "includes/header.php";
include "function.php";

signIn();
?>

<body>
    
<div class="container d-flex justify-content-center align-items-center vh-100 ">
    <div class="text-center sign-in">
        <h1>Sign In</h1>
        <form action="" method="post">
        <div class="form-group p-3">
            <div class="input-group p-2">
                <div class="input-group-addon p-2">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                    <input type="email"name="user_email" class="form-control shadow-none" placeholder="Email">
            </div>
        
          <div class="pt-3">
            <div class="input-group p-2">
                <div class="input-group-addon p-2">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input type="password" name="user_password" class="form-control shadow-none" placeholder="Password">
            </div>
            
          </div>
          
          
          <br>
          <a href="" class="pt-3 text-decoration-none">Forget Password ?</a> <div class="pt-3">
            <button class="btn sign-up-button " name="sign_in">Sign In</button>
          </div>
          <div class="pt-3">
            <span class="text-dark">Don't have account?  </span>
            <a href="register.php" class="pt-3 text-decoration-none">Sign Up</a>
          </div>
            
        </div>
        </form>
    </div>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>