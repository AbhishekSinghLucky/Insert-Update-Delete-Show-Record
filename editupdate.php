<?php 
include "index.php";
include "functionfirst.php";
$object= new Demo($conn);
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $mobile = mysqli_real_escape_string($conn,$_POST["mobile"]);
    $new_password =mysqli_real_escape_string($conn,$_POST["new_password"]);
    $confirm_new_password = mysqli_real_escape_string($conn,$_POST["confirm_new_password"]);

if(isset($_POST['submit']))
{
   // print_r($_POST);
    $id = $_POST['id'];
    
    
//$sql1="UPDATE registration SET name= '$name', email = '$email',password='$password' mobile='$mobile' WHERE id='$id'";

$result2= $object->selectdb5('registration',$email,$id);
    
    //$sql2 = "SELECT * FROM registration WHERE email ='$email'"; 
    //$result2 = mysqli_query($conn,$sql2);
 $b=mysqli_num_rows($result2);
    
            if($b > 0)
            {
                echo "Email ID Already Exists!!";
         
            }
    else
    {
        $result3= $object->selectdb4('registration',$id);
        //$sql3="SELECT password FROM registration WHERE id='$id'";
        //$result3=mysqli_query($conn,$sql3);
        $row=mysqli_fetch_assoc($result3);
 if($password!=$row["password"])
        {
        echo "The password is incorrect"; die;
        }
 if( $password==$row["password"])
        {
        if($new_password==$confirm_new_password)
        {
    //$sql=mysqli_query($conn,"UPDATE registration SET password='$confirm_new_password' WHERE email='$email'");
        //$result1=mysqli_query($conn,$sql1); 
$result1=$object->updatedb('registration',$name,$email,$new_password,$mobile,$id);
            echo "Record Updated!";
        }
        else{
         echo "Updation Failed!! Password did not Matched";
        }
    }
}
}
?>
<center>
    <br><br>
        <a href ="secondpage.php">View Records</a>
        </center>