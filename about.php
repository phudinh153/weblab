<style>
    section{
        margin-bottom: 300px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 50px;
    }
    .location{
        color: white;
    }
    #map {
        height: 400px;
        width: 400px;
        overflow: hidden;
        
      }
</style>
<section >
    <div class="location">
        <h1>Location:</h1> 
    </div>

    <div id="map"></div>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
         // The latitude and longitude coordinates
       var lat = 10.77331;
       var lon = 106.65968;

       // Create the map centered on the specified location
      var map = L.map('map').setView([lat, lon], 15);

        // Add the OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

      //var address = "1600 Amphitheatre Parkway, Mountain View, CA 94043";
      
      // Geocode the address to get the latitude and longitude coordinates
    //   axios.get("https://nominatim.openstreetmap.org/search?q=" + address + "&format=json")
    //     .then(function (response) {
    //       var lat = response.data[0].lat;
    //       var lon = response.data[0].lon;

    //       // Create the map centered on the geocoded location
    //       var map = L.map('map').setView([lat, lon], 15);

    //       // Add the OpenStreetMap tile layer
    //       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //         attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    //       }).addTo(map);

    //       // Add a marker to the geocoded location
    //       var marker = L.marker([lat, lon]).addTo(map);
    //     })
    //     .catch(function (error) {
    //       console.log(error);
    //     });
    </script>
   
</section>








