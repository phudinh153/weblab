<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script type="module" src="./index.js"></script>
    <style>
      /* Set the size of the div element that contains the map */
      #map {
          height: 400px; /* The height is 400 pixels */
          width: 100%; /* The width is the width of the web page */
      }
    </style>
  </head>
  <body>
    <h3>Location:</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyCCFdkhCb0qzhWpLwv3FR8Vd8259ScHGIU", v: "beta"});</script>
    <script>
      // Initialize and add the map
let map;

async function initMap() {
  const address = "1600 Amphitheatre Parkway, Mountain View, CA";
  // const geocoder = new google.maps.Geocoder();
  // geocoder.geocode({ address: address }, (results, status) => {
  //   if (status === "OK") {
  //     // Get the coordinates for the first result
  //     const position = {
  //       lat: results[0].geometry.location.lat(),
  //       lng: results[0].geometry.location.lng(),
  //     };

  //     // Request needed libraries.
  //     //@ts-ignore
  //     const { Map } = await google.maps.importLibrary("maps");
  //     const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

  //     // The map, centered at the location of the address
  //     map = new Map(document.getElementById("map"), {
  //       zoom: 15,
  //       center: position,
  //       mapId: "DEMO_MAP_ID",
  //     });

  //     // The marker, positioned at the location of the address
  //     const marker = new AdvancedMarkerView({
  //       map: map,
  //       position: position,
  //       title: address,
  //     });
  //   }
  //   });
  // The location of 10.772075,106.6553215
  const position = { lat: 10.772075, lng: 106.6553215 };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

  // The map, centered at bachkhoa
  map = new Map(document.getElementById("map"), {
    zoom: 16,
    center: position,
    mapId: "DEMO_MAP_ID",
  });

  // The marker, positioned at bachkhoa
  const marker = new AdvancedMarkerView({
    map: map,
    position: position,
    title: 'Back Khoa',
  });
}

initMap();
    </script>
  </body>
</html>