<style>
  form{
    /* width: 100px; */
    color:  white;
    border-color: rgba(255, 255, 255, 0.5);
    border: 2px;
    width: 400px;
  }
  .login{
    display: flex;
    justify-content: center;
    margin-bottom: 10%;
  }
</style>


  <div class="login">
    
    <form class="mt-5" style="border-radius: 10px; background-color: transparent; font-weight: 570; font-size: 20px"
      id="login" action="login_processing.php" method="post" onsubmit="validateForm">
      <h1 class="text-center" style="color: white;">Login</h1>
        <!-- <form id="login" action="login_processing.php" method="post" onsubmit="validateForm"> -->
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control bg-dark text-light" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
            </div>
            
            <div class="mb-3">
            <label for="location" class="form-label">Password</label>
            <input  type="password" class="form-control bg-dark text-light" name="password" id="password" required>
            </div>
           
            
            
            <div class="mb-3">
                <button type="submit" class="btn bg-dark text-light">Login</button>
            </div>
            
    </form>
  </div>

