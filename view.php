<html>
    <head>
        <title>
            view details
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
 <h1><?php echo $row['username']; ?></h1>
 <?php 
    echo"<div class='post'>";
    echo "name: " .$row['username']."";
    echo"<img class='size' src='images/".$row['userimage']."'>";
    echo"</div>";
    ?>
    </body>
    <script>

    </script>
</html>