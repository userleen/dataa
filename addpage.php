<?php
try{

    $pdoConnect = new PDO("mysql:host=localhost;dbname=hi","root","");
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $exc ){
    echo $exc->getMessage();}?>
<!DOCTYPE html>
<html>
    <head>
        <title>ADD And Display -by:Red</title>
    <meta charset="UTF-8">
    </head>
    <body>

    <a href='#'>Create</a>
    <a href ='searchpage.php'>Search</a>
    <br><br>
    <form action="add.php" method="post">
        <input type="hidden" name="id">
        &nbsp;Name: <input type="text" name="name" required placeholder="name"><br><br>
        Status: <input type="text" name="status" required placeholder="status"><br><br>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" name="insert" value="   save "><br>
</form>
<br>
<?php
$pdoQuery = 'SELECT * FROM tbinfo';
$pdoResult = $pdoConnect->prepare($pdoQuery);
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