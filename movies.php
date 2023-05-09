    <style>
      @media only screen and (max-width: 600px) {
        #formSearch{
          width: 300px;
        }
        #searchResults{
          width: 300px;
        }
      }
      @media only screen and (min-width: 600px) {
        #formSearch{
          width: 35em;
        }
        #searchResults{
          width: 35em;
        }
      }
      .movies-list {
        display:flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 10px;
      }

      .title{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 50px;
      }

      .movies-list div{
        margin: 5%;
      }

      .movies-list img{
        margin: 15px;
        width: 15em;
        height: 22em;
        object-fit: cover;
      }

      .searchBox{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 50px;
        /* border-color: #FFFF00; */
      }

      #formSearch{
        appearance: none;
        background-color: black;
        outline: none;
        padding: 5px;
        margin: 0;
        /* width: 25rem; */
        height: 30px;
        border-radius: 2em;
        /* border-color: #FFFF00; */
        color: white;
        /* border-width: 3px; */
        border: solid 3px #FFFF00;
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
        /* width: 25rem; */
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

      p{
        padding: 15px;
        color:aliceblue;
      }
      .page-link{
        color:#FFFF00;
        background-color: #10100e;
        border-color: #FFFF00;
      }
      .page-link:hover{
        color:#10100e;
        background-color: #FFFF00;
        border-color: #10100e;
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
                  $sql = "SELECT COUNT(*) FROM films";
                  $result = mysqli_query($conn, $sql);

                  
                    // Loop through results and display movies
                    if (mysqli_num_rows($result) > 0) {

                        if(isset($_GET['pagenum'])){
                          $nopage = $_GET['pagenum']; 
                        }
                        else {
                          $nopage = 1;
                        }
                        $filmsPerPage = 1; //4 films per page
                        $offset = ($nopage - 1) * $filmsPerPage;
                        $totalFilms = mysqli_fetch_array($result)[0];
                        $totalPages = ceil($totalFilms / $filmsPerPage);
                        
                        if(isset($_GET['id'])){
                          $filmsPerPage = 1; //4 films per page
                          $offset = ($nopage - 1) * $filmsPerPage;
                          $totalFilms = 1;
                          $totalPages = ceil($totalFilms / $filmsPerPage);
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
                              echo '<div>' . $row["title"]. '</div>';
                              echo '<div>' . $row["release_year"]. '</div>';
                              echo '</div>';
                          }
                        }
                        else{

                          $sql = "SELECT * FROM films LIMIT $offset, $filmsPerPage";
                          $res_data = mysqli_query($conn, $sql);

                          while($row = mysqli_fetch_assoc($res_data)) {
                          echo '<div>';
                          echo '<img class="lazy" loading="lazy" data-src="' . $row["poster"] . '" >';
                          echo '<p>' . $row["title"] .'</p>';
                          echo '</div>';
                            }
                        }

                    }  else {
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
    <div class="movies-list">
      <?php    
          if(!isset($_GET['id'])){
            
          
            $nopage = isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
               
          echo '<nav aria-label="Page navigation example">';
          echo '<ul class="pagination">';
          // echo '<li class="page-item"><a class="page-link" href="http://localhost/weblab/index.php?page=movies&pagenum=1">1</a></li>';
          $flag = 0;
          $print = 0;
          for($i = 1; $i < $totalPages + 1 ; $i++){
            if($i == 2 && $nopage > 5 && $flag == 0 && $totalPages > 9){
              echo '<li class="page-item"><a class="page-link" href="">...</a></li>';
              $print++;
              $i = $nopage - 2;
              $flag = 1;
            }
            $link = "./index.php?page=movies&pagenum=" .$i;
            if($i == $nopage){
              $style = 'style="color:#10100e; background-color: #FFFF00; border-color: #10100e;"';
            }
            else{
              $style='';
            }
            echo '<li class="page-item"><a class="page-link"'. $style.' href="'.$link.'">'.$i.'</a></li>';
            $print++;
            if(($i - 2 == $nopage && $totalPages - $nopage >= 4 && $print == 7 && $nopage >= 5 ) || ($nopage < 5 && $print == 7)){
              echo '<li class="page-item"><a class="page-link" href="">...</a></li>';
              $print++;
              $i = $totalPages;
              $link = "./index.php?page=movies&pagenum=" .$i;
              echo '<li class="page-item"><a class="page-link" href="'.$link.'">'.$i.'</a></li>';
              $print++;
            }
            if($print > 8){
              break;
            }

          }
            echo '</ul>';
            echo '</nav>';
        }
      ?>
    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/intersection-observer@2.0.4/dist/intersection-observer.min.js"></script>

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
  fetch(`./search.php?query=${searchValue}`)
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
        window.location.href = `./index.php?page=movies&id=${id}`;
      });

      // Add movie div to search results div
      searchResults.appendChild(movieDiv);
      
    }
    
  })
  .catch(error => console.log(error));


});

function lazyLoad() {
  const images = document.querySelectorAll('.lazy');
  const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.2
  };

  function handleIntersection(entries, observer) {
    entries.forEach(entry => {
      if (entry.intersectionRatio > 0) {
        const img = entry.target;
        const src = img.getAttribute('data-src');

        setTimeout(() => {
          img.setAttribute('src', src);
          img.classList.remove('lazy');
          observer.unobserve(img);
        }, 500); // Add a 500ms delay before loading the image
      }
    });
}

  const observer = new IntersectionObserver(handleIntersection, options);

  images.forEach(img => {
    observer.observe(img);
  });
}

lazyLoad();



</script>

