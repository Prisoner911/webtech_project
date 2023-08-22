<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Add student</title>
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

    .inp {
        display: flex;
        justify-content: center;



    }

    .txt {
        display: flex;
        justify-content: center;
    }

    .txt_nav:hover {
        font-size: 22px;
        transition: 0.2s;
    }

    .form_sec {
        margin-top: 50px;
    }

    .table,
    th,
    tr,
    td {
        border: 2px solid white;
        background-color: rgba(0, 0, 0, 0.4);
        text-align: center;

    }

    .btn_div {
        display: flex;
        justify-content: center;
    }

    .cr {
        display: flex;
        justify-content: center;
        color: yellow;
        font-size: 20px;
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
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost/webtech/addStd.php">Add a student to the database</a></li>
                                <li><a class="dropdown-item" href="http://localhost/webtech/editStd.php">Edit student details</a></li>
                                <li><a class="dropdown-item" href="http://localhost/webtech/disp_att.php">Show attendance data</a></li>
                            </ul>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-outline-primary btn1" onclick="history.back()">Back</button>
                </div>
            </div>
        </nav>
    </div>
    <div class="bg">
        <div class=cr>
            <?php
            $conn = new mysqli("localhost", "root", "", "attendance");
            if (!$conn) {
                die(mysqli_error($conn));
            } else {
                $last_roll = null;
                $sql = "SELECT (Roll_no) AS last_roll FROM tab1 ORDER BY Roll_no DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
                $last_roll = $data['last_roll'];

                echo '<p style="color: yellow; font-weight:bold;">Current last Roll Number:</p>' . $last_roll;
                $conn->close();
            }

            ?>
        </div>

        <div class="inp">

            <form action="addStd_data.php" method="post" class="form_sec" id="frm">
                <table>
                    <tr>
                        <th>Roll Number</th>
                        <th>Name</th>
                    </tr>
                    <tr>
                        <td> <input type="number" id="roll" aria-label="Roll number" class="form-control" value="<?php echo $last_roll + 1 ?>" min="<?php echo $last_roll + 1 ?>"></td>
                        <td> <input type="text" id="name" aria-label="Name" class="form-control"></td>
                    </tr>
                </table>
                <div class="btn_div">
                    <button type="submit" name="sub" id="sub" class="btn btn-success">Save</button>
                    <button type="reset" name="reset" id="reset" class="btn btn-danger">Clear</button>
                </div>

            </form>
        </div>

    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $("#sub").on("click", function(e) {
        e.preventDefault();
        var roll = document.getElementById('roll').value;
        var name = document.getElementById('name').value;

        $.ajax({
            url: "http://localhost/webtech/addStd_data.php",
            type: "post",
            data: {
                Roll_no: roll,
                Student_name: name
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    alert("Student data added");
                    window.location.href = 'http://localhost/webtech/addStd.php';
                } else {
                    alert("Couldn't save record");
                }

            }
        });
    })
</script>