<?php
include "index.php";
include "functionfirst.php";
$obj1= new Demo;
?>
<html>
<head>
    </head>
    <body>
    <table width="600" border="1" cellpadding="1" cellspacing="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Mobile</th>
                <tr>
                    <?php
                    $sql1 = $obj1->selectdb('registration');
                   //$sql="SELECT name,email,password,mobile from registration";
                  
                    //$result = $conn->query($sql) or die($conn->error);
                    while($row= $sql1->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["password"]."</td>";
                        echo "<td>".$row["mobile"]."</td>";
                        echo "</tr>";
                    }
                    ?>
        </table>
            </body>
</html>