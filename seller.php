<?php 
  if (isset($_POST['upload'])) {
      $target = "images/".basename($_FILES['image']['name']);

      //connect to the data base
      $db = mysqli_connect("localhost","root","","datastore");

      $username = $_POST['name'];
      $userstore = $_POST['store'];
      $storelocation = $_POST['location'];
      $storecategory = $_POST['category'];
      $image = $_FILES['image']['name'];

      $sql = "INSERT INTO genral (username,store_name,userlocation,category,userimage) VALUES ('$username','$userstore','$storelocation','$storecategory','$image')";
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
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            padding:10px;
        }
        .data{
            display: flex;
            flex-direction: column;
            padding: 2rem;
            margin: 0 auto;
            width:250px;
        }
        .avatar{
            height:100px;
            border-radius:10px;
            border:solid black 1px;
        }
        .button1,.button{
            padding:5px;
            font-size:15px;
            border-radius:5px;
            font-family: aktiv-grotesk-extended, sans-serif;
            font-weight: 700;
            border: 2px solid #000;
            border-radius: 3rem;
            overflow: hidden;
            color: #000;
        }
        .button1:hover{
            color:#00A0C6; 
            text-decoration:none; 
            cursor:pointer;  
        }
        a {
        color: #000;
        text-decoration: none;
        }

    a:hover {
        color:#00A0C6; 
        text-decoration:none; 
        cursor:pointer;  
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
        <input type="text" class="lable" placeholder="Enter name" name="name">
        <br>
        <br>
        <label for="name"><b>Store Name</b></label>
        <input type="text" class="lable" placeholder="Enter name" name="store">
        <br>
        <br>
        <label for="name"><b>Location</b></label>
        <input type="text" class="lable" placeholder="Enter name" name="location">
        <br>
        <br>
        <label for="name"><b>category</b></label>
        <select name="category">
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
        <input type="file" class="form-control" name="image" onchange="displayImage(this)"  id="image" accept=".jpg, .jpeg, .png" required/> 
        <br>
       <br>
       <input type="submit" value="upload" name="upload" class="button1">
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
</html>