<html>
    <head>
        <title>
            buyer
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
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
           div:hover{
             border:2px solid;
           }
           .size{
               width:250px;
               height:200px;
           }
        </style>
    </head>
    <body>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <?php 
   $db = mysqli_connect("localhost","root","","datastore");
   $sql = "SELECT * FROM genral ORDER BY id DESC";
   $result = mysqli_query($db,$sql);
   echo "<table id='myTable' class='post'>";
  while($row = mysqli_fetch_array($result)){    
    echo "<tr>"; 
    echo "<td>"; 
    echo "<br>";
    echo "<br>";
    echo"<div>";
    echo "name: " .$row['username']."<br>";
    echo "category: " .$row['category']."<br>";
    echo"<a href='view.php?id=".$row['id']."'>";
    echo"<img class='size' src='images/".$row['userimage']."'>";
    echo"</a>";
    echo"</div>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($db);
?>
    </body>
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
    </script>
</html>