<?php
include "index.php";
include "functionfirst.php";
$object= new Demo($conn);
?>
<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    //mysqli_query($conn,"DELETE FROM registration WHERE id ='$id'");
    $result = $object->deletedb('registration',$id);
    echo "Deleted";
}
                    ?>

<html>
<head><title>Main Page</title>
    </head>
    <body>
    
<center>
            
    <table width="600" border="1" cellpadding="1" cellspacing="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Mobile</th>
                <th>Edit</th>
                <th>Delete</th>
                <tr><br><br>
                    <?php
                    //showall('registration', $select, "WHERE fecha = '$fecha'");
                    //$sql="SELECT id,name,email,password,mobile from registration";
                    //$result= $conn->query($sql); 
                    $i=1;
                    //print_r($result);
        $result=$object->selectdb('registration');            
                    while($row= $result->fetch_assoc()){
                       
                        echo "<tr>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["password"]."</td>";
                        echo "<td>".$row["mobile"]."</td>";
                        
                    
                    ?>
                        <td> <a href='edit.php?id=<?php echo $row["id"]; ?>'>Edit</a></td>
                 <td><a href='secondpage.php?id=<?php echo $row["id"]; ?>'>Delete</a></td>
                    <?php
                    echo "</tr>";
        }
                    ?>
                    <?php
//if(isset($_GET['id']))
//{
//    $id = $_GET['id'];
//    mysqli_query($conn,"DELETE FROM registration WHERE id ='$id'");
//    echo "Deleted";
//}
                    ?>
                    
        </table><br><br><br>
            </center><a href ="firstpage.php">Add New Record</a>
        </body>
</html>