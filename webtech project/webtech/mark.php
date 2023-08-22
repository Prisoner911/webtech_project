<?php

if (isset($_POST['att']) && isset($_POST['date'])) {
    $attendance = $_POST['att'];
    $date = $_POST['date'];

}

$con = new mysqli('localhost', 'root', '', 'attendance');
if (!($con)) {
    die(mysqli_error($con));
} else {
    foreach ($attendance as $rn) {




        $sql = "UPDATE tab2 SET attendance='P' WHERE Roll_no='$rn' AND a_date='$date'";
        $result = mysqli_query($con, $sql);
    }
    $sql = "UPDATE tab2 SET attendance='A' WHERE attendance is null AND a_date='$date'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo 1;
        $con->close();
    } else {
        echo 0;
        die(mysqli_error($con));
    }
}
