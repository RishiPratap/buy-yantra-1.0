<?php 
  if (isset($_POST['upload'])) {
      $target = "images/".basename($_FILES['image']['name']);

      //connect to the data base
      $db = mysqli_connect("localhost","root","","datastore");

      $username = $_POST['name'];
      $userstore = $_POST['store'];
      $userlati = $_POST['lati'];
      $userlongi = $_POST['longi'];
      $storecategory = $_POST['category'];
      $image = $_FILES['image']['name'];

      $sql = "INSERT INTO genral (username,store_name,latitude,longitude,category,userimage) VALUES ('$username','$userstore','$userlati','$userlongi','$storecategory','$image')";
      mysqli_query($db,$sql); //store data into db
      if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
          $msg = "DATA UPLOADED SUCCESFULLY";
      }else{
          $msg = "DATA NOT UPLOADED SUCCESFULLY";
      }

  }
  ?>
<html>
    <head>
        <title>
            Seller Hub
        </title>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            padding:10px;
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
        .data{
            display: flex;
            flex-direction: column;
            padding: 2rem;
            margin: 0 auto;
            width:60%;
        }
        .avatar{
            height:100px;
            width:50%;
            margin-left:25%;
            border-radius:10px;
            border:solid black 1px;
        }
        .button{
            padding:5px;
            font-size:15px;
            border-radius:5px;
        }
        .lable{
            padding:5px;
            border-radius:5px;
            border-top:0px;
            border-right:0px;
            border-left:0px;
            outline:none;
        }
    </style>
    <body>
        <form action="seller.php" method="post" class="data" enctype="multipart/form-data">
        <label for="name"><b>User Name</b></label>
        <input type="text" class="lable" placeholder="Enter name" name="name" required>
        <br>
        <br>
        <label for="name"><b>Store Name</b></label>
        <input type="text" class="lable" placeholder="Enter name" name="store" required>
        <br>
        <br>
        <label for="name"><b>Location</b></label>
        <input type="text" id="lati" class="lable" placeholder="Enter name" name="lati" hidden>
        <input type="text" id="longi" class="lable" placeholder="Enter name" name="longi" hidden>
        <div id="dvMap" class="dvMap" style="width: 100%; height: 300px"></div>
        <br>
        <br>
        <label for="name"><b>category</b></label>
        <select name="category" required>
            <option value="">--SELECT CATEGORY--</option>
            <option value="grocery">Grocery</option>
            <option value="medicine">Medicine</option>
            <option value="bakery">Bakery</option>
            <option value="electronics">Electronics</option>
            <option value="food">Fast Food</option>
            <option value="pet">Pet shop</option>
            <option value="sports">Sports</option>
            <option value="general">General</option>
        </select>
        <br>
        <br>
        <label for="image"><b>Upload Image  </b></label>
        <img src="https://cdn0.iconfinder.com/data/icons/pinterest-ui-flat/48/Pinterest_UI-18-512.png" title=" click to upload image" class="avatar" onclick="triggerClick()" id="profileDisplay"/>
	   <br>
       <br>
        <input type="file" name="image" onchange="displayImage(this)"  id="image" accept=".jpg, .jpeg, .png" required/> 
        <br>
       <br>
       <input type="submit" value="upload" name="upload" class="button">
       <br>
       <button class="button"><a href="index.php">return</a></button>
        </form>
    </body>
    <script>
        function triggerClick(e) {
  document.querySelector('#image').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
    </script>
    <script>
        var x = "<?php echo"$msg"?>";
        alert(x);
    </script>
    <script>
            var mapOptions = {
                center: new google.maps.LatLng(23.2599333,77.412615),
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
                google.maps.event.addListener(map, 'click', function (e) {
                console.log("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
           new google.maps.Marker({
             position: new google.maps.LatLng(e.latLng.lat(),e.latLng.lng()),
             map,
             draggable: true,
             title: "store location",
             });
             document.getElementById("lati").setAttribute("value", e.latLng.lat());
             document.getElementById("longi").setAttribute("value", e.latLng.lng());
             });
    </script>
</html>