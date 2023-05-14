<?php 
session_start();
if(isset($_POST['login'])){
    echo  $_POST['email'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css">
        
    </head>
    <body>
        <section>
        
            <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><div class="card">
                        <div class="card-body">
                            <div class="card-title text-center">
                                Login Panel
                            </div>
                            <form action="" method="post">
                                <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon">
                                <span class="material-symbols-outlined"></span>
                                </div>
                                <input type="email" name='email' class="form-control mt-2"  placeholder="Enter your email">
                              </div>
                              <div class="form-group">
                                <input type="password" name='password' class="form-control mt-2"  placeholder="Enter your password ">
                              </div>
                              <button type="submit" name='login' class="btn btn-primary text-center mt-2">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
            </main>
            
        </section>
    </body>
</html>

