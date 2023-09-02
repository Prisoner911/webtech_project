<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.4);
            overflow: auto;
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

        .txt {
            display: flex;
            justify-content: center;
        }

        .txt_nav:hover {
            font-size: 22px;
            transition: 0.2s;
        }

        .date_sec {
            display: flex;
            justify-content: center;
        }

        .att_sec {
            display: flex;
            justify-content: center;
        }

        .table,
        th,
        tr,
        td {
            background-color: rgba(0, 0, 0, 0.4);
            font-size: 20px;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="bg">
        <div>
            <nav class="navbar navbar-expand-lg" style="background-color: rgba(0,0,0,0.3);">
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
                                    <li><a class="dropdown-item" href="http://localhost/webtech/attendance1.php">Take attendance</a></li>
                                </ul>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-outline-primary btn1" onclick="history.back()">Back</button>
                    </div>
                </div>
            </nav>
        </div>
        <div>
            <div class="date_sec">
                <div style="margin-top: 50px;">
                    <form action="http://localhost/webtech/disp_att.php" method="post">
                        <input type="date" id="a_date" name="a_date" class="a_date" style="width: 185px; height: 40px; font-size: 20px; padding: 20px;" value="null" autocomplete="off">
                        <button type="submit" id="date_sub" name="date_sub" class="btn btn-success" style="height: 45px; width: 80px; margin-bottom: 9px;">Enter</button>
                    </form>
                    <br>
                    <?php
                    $a_date = null;
                    $attendance = null;
                    $date_a = null;
                    if (isset($_POST['date_sub'])) {
                        $a_date = $_POST['a_date'];
                        if (!empty($a_date)) {
                            if (isset($_POST['date_sub'])) {
                                echo '<p style="color: yellow; font-size: 20px" id="dat">Date set : ' . $a_date . '</p>';
                            }
                        } else {
                            echo "<style>
                                .dat{
                                    color: yellow;
                                    font-size: 30px;
                                    font-weight: bold;
                                }</style>";
                            echo '<p class="dat">Please set a date.</p>';
                        }
                    }
                    ?>
                    <br>
                </div>
            </div>
            <div class="att_sec">
                <div>
                    <table>
                        <tr style="border: 2px solid blue;">
                            <td colspan="2"><input type="text" id="search" placeholder="search name"></td>
                            <td><button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" class="edit_btn" id="edit_att">
                                    <a style="text-decoration: none;">Edit attendance</a></button></td>
                        </tr>
                        <tr>
                            <th>Roll No.</th>
                            <th>Name</th>
                            <th>Attendance</th>
                        </tr>
                        <tr>
                            <td id="search_data" colspan="3"></td>
                        </tr>
                        <?php
                        $conn = new mysqli('localhost', 'root', '', 'attendance');
                        if (!($conn)) {
                            die(mysqli_error($conn));
                        } else {
                            //$sql = "SELECT x.Roll_no,Student_name,attendance FROM tab1 x INNER JOIN tab2 y ON x.Roll_no=y.Roll_no WHERE a_date='$a_date'";
                            $sql = "SELECT Roll_no,s_name,attendance FROM tab2 WHERE a_date='$a_date'";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $rollNumber = $row["Roll_no"];
                                    $del = $row['Roll_no'];
                        ?>

                                    <tr>
                                        <td>
                                            <?php echo $row["Roll_no"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["Student_name"] ?>
                                        </td>

                                        <td>
                                            <?php echo $row["attendance"] ?>
                                        </td>
                            <?php }
                            } else {
                                echo '<div style="display:flex; justify-content: center;">
                                <p style="color: beige; font-size: 20px; font-weight:bold;">Attendance for this day is not marked or date is not selected</p>
                                </div>';
                            }
                        } ?>
                                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">Edit Attendance</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="reset()"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <table>
                    <tr>
                        <td colspan="2"><span style="color: red;">Note:</span> Date on which attendance has to be changed</td>
                    </tr>
                    <tr>
                        <td><label for="edit_date">Date</label></td>
                        <td><input type="date" id="edit_date" class="edit_date"></td>
                    </tr>
                    <tr>
                        <td><label for="edit_roll">Roll Number</label></td>
                        <td><input type="text" id="edit_roll" class="edit_roll"></td>
                    </tr>
                    <tr>
                        <td><label for="edit_name">Name</label></td>
                        <td><input type="text" id="edit_name" class="edit_name"></td>
                    </tr>
                    <tr>
                        <td>Attendance</td>
                        <td><label style="font-size: 20px;">Present</label>
                            <input type="radio" id="edit_attP" name="edit_att" style="margin-left: 15px; height: 20px; width: 20px; vertical-align: middle;" value="P">
                            <br><label style="font-size: 20px;">Absent</label>
                            <input type="radio" id="edit_attA" name="edit_att" style="margin-left: 15px; height: 20px; width: 20px; vertical-align: middle;" value="A">
                        </td>
                        </p>
                    </tr>
                </table>
                <br>
                <div>
                    <p id="err"></p>
                </div>
                <br>
            </div>
            <div style="display: flex; justify-content: center;">
                <button type="button" class="btn btn-success" id="sub_att">Update attendance</button>
            </div>
        </div>
    </div>


</body>

</html>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    let a_date = '<?php echo $a_date ?>';
    $("#search").on("keyup", function() {
        let search_term = $(this).val();
        if (search_term == null) {

        }


        $.ajax({
            url: "http://localhost/webtech/atten_disp.php",
            type: "POST",
            data: {
                date: a_date,
                search: search_term
            },
            success: function(data) {
                $("#search_data").html(data);
            }
        });
    });

    function reset() {
        window.location.href = 'http://localhost/webtech/disp_att.php';
    }


    let edit_att;
    const radioButtons = document.querySelectorAll('input[type="radio"][name="edit_att"]');
    radioButtons.forEach(radioButton => {
        radioButton.addEventListener('click', () => {
            const selectedValue = radioButton.value;
            edit_att = selectedValue;
            // console.log("Printed in event Listener"+edit_att);
        });

    });

    $("#sub_att").on("click", function() {
        upd_att(); // Call the upd_att() function
    });

    function upd_att() {
        let edit_date = document.getElementById("edit_date").value;
        let edit_roll = document.getElementById("edit_roll").value;
        let edit_name = document.getElementById("edit_name").value;
        // console.log("Printed in function" + edit_att);
        // console.log(edit_date);
        // console.log(edit_roll);
        // console.log(edit_name);
        $.ajax({
            url: "http://localhost/webtech/upd_att.php",
            type: "POST",
            data: {
                date: edit_date,
                roll: edit_roll,
                name: edit_name,
                att: edit_att
            },
            success: function(data) {
                if (data == 1) {
                    alert("Attendance changed");
                } else {
                    alert("Failed to change the attendance");
                }
            }
        });
    }
</script>