<!DOCTYPE html>
<html>
    <head>
        <title>
            view details
        </title>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *{
                padding:5px;
            }
            body{
              background:
  radial-gradient(circle, transparent 20%, slategray 20%,
    slategray 80%, transparent 80%, transparent),
  radial-gradient(circle, transparent 20%, slategray 20%,
    slategray 80%, transparent 80%, transparent) 50px 50px,
  linear-gradient(#A8B1BB 8px, transparent 8px) 0 -4px,
  linear-gradient(90deg, #A8B1BB 8px, transparent 8px) -4px 0;
background-color: slategray;
background-size: 100px 100px, 100px 100px, 50px 50px, 50px 50px;
            }
           .post{
            display: flex;
            flex-direction: column;
            padding: 2rem;
            margin: 0 auto;
            width:250px;
           }
           .post:hover{
            box-shadow: 10px 10px 5px #aaaaaa;
           }
           .size{
               width:250px;
               height:200px;
           }
        </style>
    </head>
    <body>
    <?php
if(isset($_GET['id'])){
$mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_database = "datastore";
    $prefix = "";
    $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
    mysqli_select_db($bd, $mysql_database) or die("Could not select database");

$id = mysqli_real_escape_string($bd,$_GET['id']);

$sql = "select * from genral where id ='$id'";

$result = mysqli_query($bd,$sql);

$row = mysqli_fetch_array($result);

}
?>
        <center><h1><?php echo $row['store_name']; ?></h1></center>
 <?php 
    echo"<div class='post'>";
    echo "Owner: " .$row['username']."<br>";
    echo "Phone Number: " .$row['user_phone']."<br>";
    echo "Email: " .$row['user_email']."";
    echo"<img class='size' src='images/".$row['userimage']."'>";
    echo"</div>";
    ?>
    <br>
    <br>
    <p id="demo"></p>
    <button onclick="getLocation()" id="userloc" hidden>clcik</button>
    <br>
    <br>
    <div id="dvMap" class="dvMap" style="width: 100%; height: 300px"></div>
    </body>
    <script>
        var x = "<?php echo $row['latitude'] ?>";
        var y = "<?php echo $row['longitude'] ?>";
        window.lat = parseFloat(x);
        window.long = parseFloat(y);
        console.log(lat,long);
         
            var mapOptions = {
                center: new google.maps.LatLng(lat,long),
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            const contentString = '<p><?php echo $row['store_name'] ?></p>';
            const image ="http://maps.google.com/mapfiles/ms/icons/red-dot.png";
            const infowindow = new google.maps.InfoWindow({
            content: contentString,
            });
          markers =  new google.maps.Marker({
             position: new google.maps.LatLng(lat,long),
             map,
             icon:image,
             title:"store location",
             });
             markers.addListener("click", () => {
      infowindow.open({
      anchor: markers,
      map,
      shouldFocus: false,
    });
  });
             document.getElementById("userloc").click();
         var res = document.getElementById("demo");
        function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    res.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  window.lat_user = position.coords.latitude;
  window.long_user = position.coords.longitude;
  console.log(lat_user,long_user)
  const image ="http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
          marker =  new google.maps.Marker({
             position: new google.maps.LatLng(lat_user,long_user),
             map,
             icon:image,
             title:"user location",
             });
             const contentString = 'YOU';
             const infowindow = new google.maps.InfoWindow({
            content: contentString,
            });
            marker.addListener("click", () => {
      infowindow.open({
      anchor: marker,
      map,
      shouldFocus: false,
    });
  });
const lineSymbol = {
    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
  };
    const flightPlanCoordinates = [
    { lat: lat_user, lng: long_user},
    { lat: lat, lng: long }
  ];
  const flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: "#FFFFFF",
    strokeOpacity: 1.0,
    strokeWeight: 1,
    icons: [
      {
        icon: lineSymbol,
        offset: "100%",
      },
    ],
  });
  flightPath.setMap(map);
}
    </script>
</html>
