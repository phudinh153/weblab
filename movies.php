    <style>
      
      .movies-list {
        display:flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 100px;
      }

      .title{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 50px;
      }

      .movies-list img{
        margin: 15px;
        width: 12em;
        height: 12em;
      }

      .searchBox{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 50px;
        border-color: #FFFF00;
      }

      #formSearch{
        appearance: none;
        background-color: black;
        outline: none;
        padding: 5px;
        margin: 0;
        width: 30em;
        height: 30px;
        border-radius: 2em;
        border-color: #FFFF00;
        color: white;
        border-width: 3px;
      }

      #searchResults{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 5px;
        background-color: #10100e;
        padding: 10px;
        border-radius: 5px 5px 25px 25px;
        max-height: 250px;
        overflow-y: auto;
        width: 30em;
      }

      #searchResults div{
        margin: 3px 0;
        cursor: pointer;
        border-radius: 10px;
        padding-left: 20px;
        padding-right: 20px;
      }

      #searchResults div:hover{
        background-color: #555555;
      }
    </style>
    
    <section class="movies">
      <div class="title">
        <span>Movies</span>
      </div>

      <div class="searchBox">
        <div id="search" >
          <input type="search" id="formSearch" placeholder="Search"/>
        </div>    
        <div id="searchResults" style="display: none;"></div>
      </div>

      <div class = "movies-list"> 
        
            <!-- <a> 
              <img src="https://img.cdn.vncdn.io/cinema/img/80187507856383526-co-gi-moi-o-phim-zombie-dau-tien-tai-viet-nam-lost-in-mekong-delta-9dd-6275603.png" width="50%" height="50%">
            </a> -->
            <?php
                // Connect to the database
              try{
                $conn = mysqli_connect("localhost", "root", "");

                // Check connection
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                if (mysqli_select_db($conn, "movies")) {
      
                  // Retrieve movies from database
                  $sql = "SELECT title, release_year, poster FROM films";
                  $result = mysqli_query($conn, $sql);

                  
                    // Loop through results and display movies
                    if (mysqli_num_rows($result) > 0 && !isset($_GET['id'])) {
                        while($row = mysqli_fetch_assoc($result)) {
                        echo '<div>';
                        echo '<img src="' . $row["poster"] . '" >';
                        echo '</div>';
                        }
                    } else if(isset($_GET['id'])){
                      $id = $_GET['id'];
                      // Query the database to get the movie with the specified id
                      $query = "SELECT * FROM films WHERE id = '$id'";
                      $result = mysqli_query($conn, $query);

                      // Check if there is a result
                      if (mysqli_num_rows($result) > 0) {
                          // Fetch the movie details
                          $row = mysqli_fetch_assoc($result);

                          // Display the movie details
                          echo '<div style="color: white;">';
                          echo '<img src="' . $row["poster"] . '" >';
                          echo '<div>' . $row["title"]. '<div>';
                          echo '<div>' . $row["release_year"]. '<div>';
                          echo '</div>';
                    }
                  } else {
                    echo "Movie not found";
                  }
                  
                } else {
                    // Close database connection
                    mysqli_close($conn);
                  }
              }
              catch(Exception $e){
                echo "No database found";
              }
                
                mysqli_close($conn);
            ?>
        

    </div>
    </section>


<script>
  // Select the search box and search results div
const formSearch = document.querySelector('#formSearch');
const searchResults = document.querySelector('#searchResults');

// Add event listener for when user types in search box
formSearch.addEventListener('input', () => {
  // Get user input
  const searchValue = formSearch.value.trim();

  if(formSearch.value.length === 0){
      searchResults.innerHTML = '';
      searchResults.style.display = 'none';
      return;
    }
  else{
    searchResults.style.display = 'block';
    }

  // Clear previous search results
  searchResults.innerHTML = '';
  
  // Make AJAX request to server to get list of movies
  // Make AJAX request to server to get list of movies
  fetch(`/web/search.php?query=${searchValue}`)
  .then(response => response.text())
  .then(data => {
    // Create a new DOM parser
    const parser = new DOMParser();
    
    // Parse the XML data
    const xmlDoc = parser.parseFromString(data, 'text/xml');

    // Get the movies from the XML document
    const movies = xmlDoc.getElementsByTagName('movie');
    
    // Create a new div for each movie in the search results
    for (let i = 0; i < Math.min(movies.length, 5); i++) {
      const movie = movies[i];
      console.log(movie);
      const movieDiv = document.createElement('div');
      movieDiv.textContent = movie.getElementsByTagName('title')[0].textContent;
      movieDiv.style.color = "white";
      // Add click event listener to movie div to show movie details
      movieDiv.addEventListener('click', () => {
        const id = movie.getElementsByTagName('id')[0].textContent;;
        window.location.href = `/web/index.php?page=movies&id=${id}`;
      });

      // Add movie div to search results div
      searchResults.appendChild(movieDiv);
      
    }
    
  })
  .catch(error => console.log(error));


});


</script>

