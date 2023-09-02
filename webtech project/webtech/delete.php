<?php 
    $id=null;
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    $conn = new mysqli('localhost','root','','attendance');
    if(!$conn){
        die(mysqli_error($conn));
    }
    else{
        $sql = "DELETE FROM tab1 WHERE Roll_no='$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo 1;
        $conn -> close();
    }
    else{
        echo 0;
    }
    }
