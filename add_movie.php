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
      id="login" action="add_movie_processing.php" method="post" >
      <h1 class="text-center" style="color: white;">Add movie</h1>
        <!-- <form id="login" action="login_processing.php" method="post" onsubmit="validateForm"> -->
            <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control bg-dark text-light" name="title" id="title" value="" required>
            </div>
            
            <div class="mb-3">
            <label for="release" class="form-label">Release Year</label>
            <input type="text" class="form-control bg-dark text-light" name="release" id="release" value="" required>
            </div>
           
            <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control bg-dark text-light" name="description" id="description" value="" required>
            </div>

            <div class="mb-3">
            <label for="poster" class="form-label">Poster Link URL</label>
            <input type="text" class="form-control bg-dark text-light" name="poster" id="poster" value="" required>
            </div>
            
            
            <div class="mb-3">
                <button type="submit" class="btn bg-dark text-light">Submit</button>
            </div>
            
    </form>
  </div>

