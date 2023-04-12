    
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
            <input type="password" class="form-control" name="password" id="password" oninput="checkPass()" required>
            </div>
            <div class="alert alert-danger" id="password-message" style="display: none;">Password must have 8 letters and contain at least one lowercase letter, one uppercase letter, one number, and one special character.</div>
           
            <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" oninput="conPass()" required>
            </div>
            <div class="alert alert-danger" id="conf_password-message" style="display: none;">Confirm Password is not the same as Password</div>
            
            
            <div class="mb-3">
                <button class="btn btn-success">Signup</button>
            </div>
            
        
            </form>
           
    </div>
  </div>
<script>
  function checkPass(){
  const passw = document.querySelector("#password");
  const password = document.getElementById("password").value;
  const passwordMessage = document.getElementById("password-message");
  const conf_passw = document.querySelector("#confirm_password");
  if (password.length === 0) {
    passwordMessage.style.display = "none";
  } else {
    passwordMessage.style.display = "block";
  }
  passw.addEventListener('input',(e)=>{
    if (!validatePassword(e.target.value)) {
      passw.classList.add("border-danger");
      passw.classList.add("border-3");
      conf_passw.disabled = true;
    }else{
      conf_passw.disabled = false;
      passwordMessage.style.display = "none";
      passwordMessage.classList.remove("alert");
      passwordMessage.classList.remove("alert-danger");
    }
    
    
  });
}
  function conPass(){
  const password = document.getElementById("password").value;
  const conf_passw = document.querySelector("#confirm_password")
  const confpasswordMess = document.getElementById("conf_password-message");
  const confirmPassword = document.getElementById("confirm_password").value;
  console.log(conf_passw.value.length);
  if (conf_passw.value.length === 0) {
    confpasswordMess.style.display = "none";
  } else {
    confpasswordMess.style.display = "block";
  }
    conf_passw.addEventListener('input',(e)=>{
    if (e.target.value !== password ) {
      conf_passw.classList.add("border-danger");
      conf_passw.classList.add("border-3");
    }
    else{
      confpasswordMess.style.display = "none";
      conf_passw.classList.remove("border-danger");
      conf_passw.classList.remove("border-3");
    }
  });
  }
  

  
  function validatePassword(password) {
  const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[.@$!%*?&])[A-Za-z\d.@$!%*?&]{8,}$/;
  return regex.test(password);
  }

</script>
