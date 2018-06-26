<?php
include "index.php";
include "functionfirst.php";

$object= new Demo($conn);

if(isset($_GET['id'])){
$id =$_GET['id'];
//$query = mysqli_query($conn,"SELECT id,name,email,mobile FROM registration WHERE id = '$id'");
$query=$object->selectdb3('registration',$id);
if(mysqli_num_rows($query)>=1){
    while($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
    }
?>
<center>
<form action="editupdate.php" method="post">
<input type="number" hidden="hidden" name="id" value="<?=$id;?>"><br><br>
Name <input type="text" name="name" value="<?=$name;?>" pattern="^\D*$" title="Numbers or Special Characters Not Allowed" required ><br><br>
Email <input type="email" name="email" value="<?=$email?>" required><br><br>
Enter Old Password <input type="password" name="password" value="<?=$password?>" required><br><br>
Enter New Password <input type="password" name="new_password"  required><br><br>
Confirm New Password <input type="password" name="confirm_new_password"  required><br><br>    
Mobile <input type="numnber" name="mobile" value="<?=$mobile?>" required><br><br>
<input type="Submit" name="submit" value="Update">
</form>
    </center>
<?php
}else{
    echo 'No entry found';
}
}
?>