    
  <div class="row mt-5">
    
    <div class="col-6 offset-3" style="border-radius: 10px; background-color: yellow; font-weight: 570; font-size: 20px">
    <h1 class="text-center">Signup</h1>
        <form action="signup_processing.php" method="post" >
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
            </div>

            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"  required>
            </div>
            
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
            </div>
           
            <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
            </div>
            
            
            <div class="mb-3">
                <button class="btn btn-success">Signup</button>
            </div>
            
        
            </form>
           
    </div>
  </div>

