

<div class="col-md-9 px-0 ">
        <div class="card bg-white p-3 profile-card">
            <div class="card-head">
                <h3 class="fw-bold">Customer Profile</h3>
                
            </div>  
            <hr>
            <div class="card-body">
                <div class="row py-2">
                    <div class="col-md-3">
                        <h5 class="text-muted">Full Name</h5>
                        <h5 class="text-muted">User Name</h5>
                        <h5 class="text-muted mb-2">Email</h5>
                        <div class="change-password d-flex mt-2">
                          <a class="btn-outline text-decoration-none text-dark ">Change Password</a>  
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold"><?php echo $user_full_name;?></h5>
                        <h5 class="fw-bold"><?php echo $user_name;?></h5>
                        <h5 class="fw-bold"><?php echo $user_email;?></h5>
                    </div>
                    <div class="col-md-3">
                        <div class="cust-image">
                            <h5 class="text-muted">Profile Image</h5>
                            <img src="images/user/<?php echo $user_image;?>" alt="" style="width:100px;height:100px;" class="py-2">
                            <button class="btn-outline">Upload New</button>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-9">
                        <div class="pt-2">
                             <h5 class="pt-3 fw-bold">Wallet</h5>
                            <h5 class="text-danger"><?php echo $user_wallet;?></h5>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <button class="text-center mt-4 btn-outline">Edit Profile</button>
                    </div>
                </div>
               
            </div>
          

        </div>
    </div>