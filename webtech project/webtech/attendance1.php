<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Take attendance</title>
</head>
<style>
    html,
    body {
        background-image: url(hogwarts-legacy.jpg);
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0px;
        height: 100%;
    }

    .bg {
        position: relative;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.4);
    }

    .nav-link:hover {
        cursor: pointer;
    }

    .dropdown-menu {
        background-color: rgba(0, 0, 0, 0.5);
        color: wheat;
    }

    .dropdown-item {
        color: white;
    }

    .dropdown-item:hover {
        font-size: 22px;
        transition: 0.2s;
    }

    .btn1:hover {
        width: 70px;
        transition: 0.2s;
    }

    .date_sec {
        display: flex;
        justify-content: center;
    }

    .adate {
        background-color: rgba(0, 0, 0, 0.5);
        color: wheat;
        height: 50px;
        width: 150px;
        font-size: 20px;
        text-align: center;
        margin-top: 50px;
    }

    .adate:hover {
        cursor: pointer;
    }

    .log {
        font-size: 20px;
        color: yellow;
    }

    .btn2 {
        height: 50px;
        margin-top: 50px;
        margin-left: 20px;
        width: 70px;
        height: 50px;
        text-align: center;
        font-size: 20px
    }

    .btn2:hover {
        width: 75px;
        height: 55px;
        font-size: 22px;
        transition: 0.2s;
    }

    .tabsec {
        display: flex;
        justify-content: center;
    }

    .tab_sec {
        display: flex;
        justify-content: center;
        width: 50%;
    }

    table,
    th,
    tr,
    td {
        border: 3px blue solid;
        background-color: rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .txt {
        display: flex;
        justify-content: center;
    }

    .txt_nav:hover {
        font-size: 22px;
        transition: 0.2s;
    }
</style>

<body>
    <div>
        <nav class="navbar navbar-expand-lg" style="background-color: rgba(0,0,0,0.5);">
            <div class="container-fluid">
                <img src="hg_logo.jpg" style="height: 80px; width: 80px; margin: 0px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active nav_item " class="op" aria-current="page" href="./index.html" style="color: white; font-weight: bold; font-size: 20px;">
                                <p class="txt_nav">Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav_item" href="http://localhost/webtech/group.html" style="color: white; font-weight: bold; font-size: 20px;">
                                <p class="txt_nav">Group Members</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown nav_item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-weight: bold; font-size: 20px;">
                                More Options
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost/webtech/addStd.php">Add a student to
                                        the database</a></li>
                                <li><a class="dropdown-item" href="http://localhost/webtech/editStd.php">Edit student details</a></li>
                                <li><a class="dropdown-item" href="http://localhost/webtech/disp_att.php">Show attendance data</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="index.html"><button type="button" class="btn btn-outline-primary btn1">Back</button></a>
                </div>
            </div>
        </nav>
    </div>
    <div class="bg">
        <div>
            <form action="attendance1.php" method="post" id="frm1">
                <div class="date_sec">
                    <label for="a_date"></label>
                    <input type="date" name="a_date" id="a_date" class="adate" required>
                    <button type="submit" class="btn btn-success btn2" name="submit">Enter</button>
                </div>
                <div class="txt">
                    <br>
                    <?php
                    $a_date = null;
                    $attendance = null;
                    $date_a = null;
                    if (isset($_POST['submit'])) {
                        $a_date = $_POST['a_date'];
                        if (empty($a_date)) {
                            echo "<style>
                            .dat{
                                color: yellow;
                                font-size: 30px;
                                font-weight: bold;
                            }</style>";
                            echo '<p class="dat">Please set a date.</p>';
                        } else {
                            echo '<p style="color: yellow" id="dat">Date set : </p>' . $a_date;
                            $conn = new mysqli('localhost', 'root', '', 'attendance');
                            if (!($conn)) {
                                die(mysqli_error($conn));
                            } else {

                                $sql = "SELECT COUNT(a_date) AS same_date FROM tab2 WHERE a_date = '$a_date'";
                                $result = mysqli_query($conn, $sql);
                                $sd = mysqli_fetch_array($result);
                                $same_date = $sd['same_date'];
                                if ($same_date != 0) {
                                    $disable_check = 0;
                                    echo '<p class="log">Attendance for this day is already logged.</p>';
                                    echo '<br>';
                                    echo '<p class="log">(To edit this attendance go to edit student data.)</p>';
                                } else {
                                    $disable_check = 1;
                                    $sql = 'SELECT COUNT(Roll_no) AS roll FROM tab1';
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    $roll = $data['roll'];
                                    
                                    for ($i = 1; $i <= $roll; $i++) {

                                        $s_name = "SELECT Student_name FROM tab1 WHERE Roll_No = '$i'";
                                        $result = mysqli_query($conn,$s_name);
                                        $name_data = mysqli_fetch_assoc($result);
                                        $name = $name_data['Student_name'];

                                        $sql = "INSERT INTO tab2 (a_date,Roll_no,s_name) values ('$a_date','$i','$name')";
                                        $result = mysqli_query($conn, $sql);
                                    }
                                    if ($result) {

                                        $date_a = $a_date;
                                        $a_date = null;
                                        $conn->close();
                                    } else {
                                        die(mysqli_error($conn));
                                    }
                                }
                            }
                        }
                    }


                    ?>
                </div>
            </form>
        </div>

        <form action="attendance1.php" method="post" id="frm">
            <div class="tabsec">
                <div class="tab_sec">

                    <table style="color: white;" class=" table table-striped">
                        <tr>
                            <th colspan="3">To mark present tick the checkbox</th>
                        </tr>
                        <tr>
                            <th>Roll No.</th>
                            <th>Student Name</th>
                            <th>Attendance</th>
                        </tr>
                        <?php
                        if (isset($_POST['submit']) and !empty($date_a)) {
                            $con = new mysqli('localhost', 'root', '', 'attendance');
                            if (!($con)) {
                                die(mysqli_error($con));
                            }

                            $sql = "SELECT x.Roll_no, Student_name FROM tab1 x INNER JOIN tab2 y ON x.Roll_no=y.Roll_no WHERE a_date='$date_a'";
                            $result = mysqli_query($con, $sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row["Roll_no"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["Student_name"] ?>
                                        </td>
                                        <td><input type="checkbox" name="attendance[]" id="<?php echo $row['Roll_no'] ?>" value="<?php echo $row['Roll_no'] ?>" style="width: 20px; height: 20px;">
                                        </td>
                                    </tr>
                        <?php

                                }




                                echo "</table>";
                            } else {
                                echo '<script> alert("0 Results"); </script>';
                            }

                            $attendance = null;
                            $con->close();
                        }

                        ?>
                    </table>
                </div>
            </div>

            <div style="display: flex; justify-content: center;" id="sub_btn">
                <button type="button" class="btn btn-success" id="sub" disabled><a href="javascript:void(0)" onclick="markPresent()" style="color: white; text-decoration:none">SUBMIT</a></button>
            </div>
        </form>





    </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    let dis = '<?php echo "$disable_check" ?>';
    // console.log(dis);
    if (dis == 1) {
        document.getElementById('sub').disabled = false;
        <?php "$disable_check = 0" ?>
    }



    function markPresent() {
        var checkedCheckboxes = document.querySelectorAll('input[name="attendance[]"]:checked');
        var attendanceArray = [];

        checkedCheckboxes.forEach(function(checkbox) {
            attendanceArray.push(checkbox.value);
        });
        console.log(attendanceArray);
        let date_a = '<?php echo "$date_a" ?>';


        console.log(date_a);
        jQuery.ajax({
            url: 'http://localhost/webtech/mark.php',
            type: 'POST',
            data: {
                att: attendanceArray,
                date: date_a
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    window.location.href = 'http://localhost/webtech/attendance1.php';
                    alert("Attendance marked");

                } else {
                    alert("Attendance couldn't be marked");
                }


            }

        })




    }
</script>