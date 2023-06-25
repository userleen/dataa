<?php
$id ="";
$name ="";
$status ="";
if(isset($_POST['Find']))
{

    try{
        $pdoConnect = new PDO("mysql:host=localhost;dbname=hi","root","");
    }catch (PDOException $exc){
        echo $exc->getMessage();
        exit ();
        }
         
        $id = $_POST['id'];
        $pdoQuery = "SELECT * FROM tbinfo WHERE id = :id";
        $pdoResult= $pdoConnect->prepare($pdoQuery);
        $pdoExec = $pdoResult->execute(array(":id" => $id));

        if($pdoExec)
        {
            if($pdoResult->rowCount()>0)
            {
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
                echo"<td><a href='edit.php?id=$id';>Edit </a> <a href='del.php?id=$id';?>Delete</a></td>";
                echo "</tr>";
                }
            }else{
                echo'<br><br><br><br><br>';
                echo 'No Data';
            }
        }
    }
      $pdoConnect = null;
      ?>