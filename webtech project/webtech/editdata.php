<?php 

    $id = null;
    $new_roll = null;
    $new_name = null;
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        // echo $id;
    }
    if(isset($_POST['newRoll'])){
        $new_roll = $_POST['newRoll'];
        // echo $new_roll;
    }
    if(isset($_POST['newName'])){
        $new_name = $_POST['newName'];
        // echo $new_name;
    }

    $conn = new mysqli('localhost','root','','attendance');
    if(!$conn){
        die(mysqli_error($conn));
    }
    else{
        $sql = "UPDATE tab1 SET Roll_no = '$new_roll', Student_name = '$new_name' WHERE Roll_no = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo 1;
            $conn->close();
        }
        else{
            echo 0;
        }
    }
