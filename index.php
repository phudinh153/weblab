<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Rotten Egg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="index.css"> 
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    
</head>
<body>
    <?php 
      include("navbar.php");
    ?>
    

    <?php
      if(isset($_SESSION['error'])){
        echo '<div class = "alert alert-danger">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
      } else if(isset($_SESSION['success'])){
        echo '<div class = "alert alert-success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);
      }
      $page = isset($_GET['page']) ? $_GET['page'] : 'home';
      $page_path = __DIR__ . '/' . $page . '.php';
      if (file_exists($page_path)) {
          include($page_path);
          echo '<script language="javascript"> console.log("'. $page .'");</script>';
      } else {
          echo '<script language="javascript"> console.log("Page not found!");</script>';
          
      }

      // if(isset($_GET['page'])){
      //   $getpage = $_GET['page'];
      // }
      // else if(isset($_POST['page'])){
      //   $getpage = $_POST['page'];
      //}
      //include("conDB.php");
    ?>

    <?php 
      include('footer.php');
    ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


  </body>
</html>




