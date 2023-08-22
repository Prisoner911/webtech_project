<?php
    $Roll_no = $_POST['Roll_no']??null;
    $Student_name = $_POST['Student_name']??null;
    $conn = new mysqli('localhost', 'root', '', 'attendance');
    if (!($conn)) {
        die(mysqli_error($conn));
    } 
    else {

        $sql = "INSERT INTO tab1 (Roll_no,Student_name) VALUES('$Roll_no','$Student_name')";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            echo 1;
            $conn->close();
        } else {
            echo 0;
            die(mysqli_error($conn));
        }
    }
