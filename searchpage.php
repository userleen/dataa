<?php
try{

    $pdoConnect = new PDO("mysql:host=localhost;dbname=hi","root","");
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $exc ){
    echo $exc->getMessage();}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ADD nd Display -by:Red</title>
    <meta charset="UTF-8">
    </head>
    <body>

    <a href='addpage.php'>Create</a>
    <a href ='#'>Search</a>
    <br><br>
    <form action="search.php" method="post">
       Search:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="id" placeholder="Enter Data Here"><br><br>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Find" value="search"><br><br><br>
    </form>
    <br>
    <?php
      $pdoQuery = 'SELECT * FROM tbinfo';
      $pdoResult= $pdoConnect->prepare($pdoQuery);
      $pdoResult->execute();

              echo "<table border='2' cellpadding='7'>";
              echo "<tr>";
              echo "<th>id</th>";
              echo"<th>name</th>";
              echo"<th>status</th>";
              echo"<th>action</th>";
              echo "</tr>";
              while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)){
                  extract($row);
                  echo "<tr>";
              echo "<td>$id</td>";
              echo"<td>$name</td>";
              echo"<td>$status</td>";
              echo"<td><a href='edit.php?id=$id';>Edit</a> <a href='del.php?id=$id';?>Delete</a></td>";
              echo "</tr>";

              }
              ?>
    </body>
</html>