<?php
try {
    $pdoConnect = new PDO("mysql:host=localhost;dbname=hi", "root", "");
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

if (!empty($_POST["modify"])) {
    $pdoQuery = $pdoConnect->prepare("UPDATE tbinfo SET name = '".$_POST['name']."', status = '".$_POST['status']."' WHERE id = ".$_GET["id"]);
    $pdoQuery = $pdoQuery->execute();
    if ($pdoQuery) {
        header('location:addpage.php');
        exit;
    }
}

$pdoQuery = $pdoConnect->prepare("SELECT * FROM tbinfo WHERE id = ".$_GET["id"]);
$pdoQuery->execute();
$pdoResult = $pdoQuery->fetchAll();
$pdoConnect = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modify data - by: Red</title>
    <meta charset="UTF-8">
</head>
<body>
<br>
<form action="" method="post">
    Name: <input type="text" name="name" value="<?php echo $pdoResult[0]['name']; ?>" required placeholder="name"><br><br>
    status:  &nbsp;<input type="text" name="status" value="<?php echo $pdoResult[0]['status']; ?>" required placeholder="status"><br><br>
    <input type="submit" name="modify" value="Update">
</form>
<br>
</body>
</html>
