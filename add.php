<?php
if(isset($_POST['insert']))
{
    try{
        $pdoConnect= new  PDO("mysql:host=localhost;dbname=inventory","root","");
        $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $exc){
        echo $exc->getMessage();
        exit();
    }
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status= $_POST['status'];

    $pdoQuery = "INSERT INTO  `tbinfo`( `name`, `status`) VALUES (:name,:status)";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":name"=>$name,":status"=>$status)); 

    if ($pdoExec)
    {

        $pdoQuery ='SELECT * FROM tbinfo';
        $pdoResult = $pdoConnect->prepare($pdoQuery);
        $pdoResult ->execute();
        while ($row = $pdoResult->fetch()){
            echo $row['id']."|".$row['name']."|".$row['status']."|" . "<br/>";
        }
        header("Location: addpage.php");
        exit;
    }else{
        echo 'Data Not Inserted';
    }
}
$pdoConnect =null;
?>