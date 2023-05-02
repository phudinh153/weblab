      <style>
        a.nav-link:hover{
          background-color: white;
        }
      </style>
        <header class="navbar navbar-expand-lg" >
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Rotten Egg
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link" href="index.php?page=home">Home</a>
                  <a class="nav-link" href="index.php?page=movies">Movies</a>
                  <a class="nav-link" href="index.php?page=about">About Us</a>
                </div>
                <div class="navbar-nav ms-auto">
                  <?php
                  session_start();

                  if(isset($_SESSION['loggedin'])){
                    echo '<a class="nav-link logout-link" href="logout.php">Logout</a>';
                    
                  }

                  else{
                    echo '<a class="nav-link" href="index.php?page=login">Login</a>';
                    echo '<a class="nav-link" href="index.php?page=register">Register</a>';
                  }
                  ?> 
                </div>
                
              </div>
            </div>
          </header>
<script>
  $(document).ready(function(){
    //Get the search input element
    var $searchInput = $('#navbar-search-input');

    //Add an event listener to the input element
    $searchInput.on('input', function(){
      //Get the search query
      var query = $(this).val().toLowerCase();

      //Perform the search and update the results
    
    });
  });


</script>        



