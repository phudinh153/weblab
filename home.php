<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./grid.css">
    
    <title>Rotten Egg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet" href="index.css"> 
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    
</head>
<body>
    <?php require_once('index.php') ?>
            
        <!-- <header class="navbar navbar-expand-lg" >
            <div class="container">
              <a class="navbar-brand" href="#">Rotten Egg
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link" aria-current="page" href="">Home</a>
                  <a class="nav-link" href="#">Movies</a>
                  <a class="nav-link" href="">Login</a>
                </div>
              </div>
            </div>
          </header> -->
        
    

    <section>
      <div class="title">Top rated movies 2022</div>

      <div> 
        <nav>
            <a> 
              <img src="https://img.cdn.vncdn.io/cinema/img/80187507856383526-co-gi-moi-o-phim-zombie-dau-tien-tai-viet-nam-lost-in-mekong-delta-9dd-6275603.png" width="50%" height="50%">
            </a>
        </nav>

    </div>
    </section>

    <footer class="py-3 mt-auto fixed-bottom">
        <div class="container">
            <span class="text-light">&copy; Rotten Egg</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';
$page_path = dirname(__DIR__) . '/' . $page . '.php';
if (file_exists($page_path)) {
    include($page_path);
} else {
    echo 'Page not found!';
}
?>