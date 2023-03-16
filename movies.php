
    <section>
      <div class="title">Movies </div>

      <div> 
        <nav>
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
                  if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      echo '<a>';
                      echo '<img src="' . $row["poster"] . '" >';
                      echo '</a>';
                      }
                  } else {
                      echo "0 results";
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
        </nav>

    </div>
    </section>
