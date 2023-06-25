<?php
try{

$pdoConnect = new PDO("mysql:host=localhost;dbname=hi","root","");
$pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $exc ){
echo $exc->getMessage();}

$pdoQuery = "DELETE FROM tbinfo where  id =". $_GET['id'];
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoResult ->execute();
header('location:addpage.php');

$pdoConnect = null;
?>