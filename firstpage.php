<?php
include "index.php";
include "functionfirst.php";
$obj2 = new Demo($conn);
?>
<html>
<head>
    </head>
    <body>
         <form name = "form1" action="firstpage.php" method="post" >
        Name <input type="text" name= "name" placeholder="Enter Your Name" pattern="^\D*$" title="Numbers or Special Characters Not Allowed" required><br><br>
        E-Mail <input type="email" name="email" placeholder="Enter Email" required><br><br>
        Password <input type="password" name="password" placeholder="Enter the Password" required><br><br>
        Mobile_No <input type="text" class="number" name="mobile"  placeholder="Enter the Mobile Number" required><br><br>
        <button type="submit" name="save">Save</button>
        </form>
        <?php
        
        if(isset($_POST['save']))
        {
           // $id=$_POST['id'];
            $name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];            
$mobile=$_POST['mobile'];
            
            //$sql = "INSERT INTO registration (name,email,password,mobile) VALUES ('$name','$email','$password',$mobile)";
 // $sql=$obj2->insertdb('registration',$name,$email,$password,$mobile); // obj2 is the object of Demo class
        //$sql2 = "SELECT * FROM registration WHERE email ='$email'";
            $sql2 = $obj2->selectdb2('registration',$email);// selecting email to check for twice entry
        //$result2 = mysqli_query($conn,$sql2);
        $a=mysqli_num_rows($sql2);
            if($a > 0)
            {
        echo "Email ID Already Exist";
            }
          else
            {   
$sql=$obj2->insertdb('registration',$name,$email,$password,$mobile);// for insertion of name , email, password, mobile
echo "New record created successfully"; 
        }
        }
        
        ?>
        <center>
        <a href ="secondpage.php">View Records</a>
        </center>
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(".number").keypress(function (e) {

       //if the letter is not digit then don't type anything
       if (e.which != 8 && e.which != 0 &&  (e.which < 48 || e.which > 57)) {
           return false;
       }
   });
</script>