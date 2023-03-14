<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- <div class="brand">
        UWC 2.0
    </div> -->

    <div class="wrapper">
        <div class="wrapper-heading">
          <h1>Login</h1>
        </div>
        <form onsubmit="login()">
            <div class="input__field">
              <input id="username" type="text" placeholder="User Name" />
            </div>
    
            <div class="input__field">
              <input id="email" type="text" placeholder="Email" />
            </div>
            <div class="input__field">
              <input id="password" type="password" placeholder="Password" />
            </div>
            <a href="UWCsignup.html" class="signup-link">Sign Up</a>
            <button id="btn" class="btn">Login</button>
          </form>
      </div>
    
      
</body>
</html>