<?php
include "index.php";


class Demo
{
     public static $conn;
    function selectdb($table_name)
    {    
        
        $sql="SELECT * from ".$table_name." "; 
        $result= mysqli_query(self::$conn,$sql);
        return $result;
    }
    
    function insertdb($table_name,$name,$email,$password,$mobile)
    {
        
        
        $sql1="INSERT into ".$table_name." (name,email,password,mobile) VALUES ('".$name."','".$email."','".$password."','".$mobile."')";
        $result=mysqli_query(self::$conn,$sql1);
        return $result;
    }
    
    function __construct($myConnection) {
        self::$conn = $myConnection;
    }
    
    function selectdb2($table_name,$email){
        
        //$sql2="SELECT * from ".$table_name."  WHERE email = '".$email."' AND NOT id = '".$id."'";
         $sql2="SELECT * from ".$table_name."  WHERE email = '".$email."'";             
//        echo $sql2;die;
        $result=mysqli_query(self::$conn,$sql2);
        return $result;
    }
    
     function selectdb5($table_name,$email,$id){
        
        $sql2="SELECT * from ".$table_name."  WHERE email = '".$email."' AND id NOT IN ('".$id."')";
//        echo $sql2;die;
        $result=mysqli_query(self::$conn,$sql2);
        return $result;
    }
    
    function deletedb($table_name,$id)
    {
        $sql3="DELETE from ".$table_name." WHERE id = '".$id."'";
//        echo $sql3;die;
        $result=mysqli_query(self::$conn,$sql3);
        return $result;
    }
    
    function selectdb3($table_name,$id)
    {
       // $sql4= "SELECT ".$id.",".$name.",".$email.",".$mobile." FROM ".$registration. "WHERE id= '".$id."'";
        $sql4="SELECT id,name,email,mobile FROM ".$table_name." WHERE id = '".$id."'";
        //echo $sql4;die; 
        $result=mysqli_query(self::$conn,$sql4);
        return $result;
    }
    
    function selectdb4($table_name,$id){
        
        $sql6="SELECT password FROM ".$table_name." WHERE id = '".$id."'";
//        echo $sql6;die;
        $result= mysqli_query(self::$conn,$sql6);
        return $result;
    }
    
    function updatedb($table_name,$name,$email,$password,$mobile,$id){
        
$sql5 = "UPDATE ".$table_name." SET name= '".$name."', email = '".$email."', password = '".$password."', mobile = '".$mobile."'
WHERE id = '".$id."'";
//        echo $sql5;die;
        $result= mysqli_query(self::$conn,$sql5);
        return $result;
    }
    
}

//var_dump($conn);
//$demo = new Demo($conn);
//    $demo->selectdb5('efe','wdqwd','wert');
?>