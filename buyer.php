<html>
    <head>
        <title>
            buyer
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
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
   $db = mysqli_connect("localhost","root","","datastore");
   $sql = "SELECT * FROM genral ORDER BY id DESC";
   $result = mysqli_query($db,$sql);
  while($row = mysqli_fetch_array($result)){  
    echo"<div class='post'>";
    echo "name: " .$row['username']."";
    echo"<a href='view.php?id=".$row['id']."'>";
    echo"<img class='size' src='images/".$row['userimage']."'>";
    echo"</a>";
    echo"</div>";
}
mysqli_close($db);
?>
    </body>
    <script>

    </script>
</html>