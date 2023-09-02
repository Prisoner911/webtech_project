<?php 
    $a_date = null;
    $roll = null;
    $name = null;
    $att = null;

    if(isset($_POST['date'])){
        $a_date = $_POST['date'];
    }
    if(isset($_POST['roll'])){
        $roll = $_POST['roll'];
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['att'])){
        $att = $_POST['att'];
    }

    $conn = new mysqli('localhost','root','','attendance');
    if(!$conn){
        die(mysqli_error($conn));
    }
    else{

        $sql = "UPDATE tab2 SET attendance='$att' WHERE a_date='$a_date' AND Roll_no='$roll'";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo 1;
            $conn -> close();
        }
        else{
            echo 0;
            die(mysqli_error($conn));
        }


    }
