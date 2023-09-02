<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

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
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.4);
            overflow: auto;
        }

    .txt_nav:hover {
        font-size: 22px;
        transition: 0.2s;
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

    /* .bg {
        position: relative;
        width: 100%;
        height: 39vw;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.4);
    } */
    .table,
    th,
    tr,
    td {
        background-color: rgba(0, 0, 0, 0.4);
        font-size: 20px;
        text-align: center;
        padding: 10px;
    }

    .tab_sec {
        display: flex;
        justify-content: center;
        margin-top: 50px;

    }
</style>


<body>
    <div>

        <div class="bg">
            <div>
                <nav class="navbar navbar-expand-lg" style="background-color: rgba(0,0,0,0.2);">
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
                                        <li><a class="dropdown-item" href="http://localhost/webtech/addStd.php">Add a
                                                student to the database</a></li>
                                        <li><a class="dropdown-item" href="http://localhost/webtech/attendance1.php">Take attendance</a></li>
                                        <li><a class="dropdown-item" href="http://localhost/webtech/disp_att.php">Show attendance data</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-outline-primary btn1" onclick="history.back()">Back</button>
                        </div>
                    </div>
                </nav>
            </div>
            <div>
                <div class="tab_sec">
                    <table>
                        <tr>
                            <th>Roll No.</th>
                            <th>Name</th>
                            <th colspan="2">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Search Name" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" id="search">
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td id="search_data" colspan="4"></td>
                        </tr>

                        <?php
                        $conn = new mysqli('localhost', 'root', '', 'attendance');
                        if (!($conn)) {
                            die(mysqli_error($conn));
                        } else {
                            $sql = "SELECT DISTINCT Roll_no, Student_name FROM tab1";
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
                                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" class="edit_btn" id="edit_btn" value="<?php echo $rollNumber; ?>">
                                                <a style="text-decoration: none;">Edit/More details</a>
                                            </button>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" id="del_btn" value="<?php echo $del; ?>"><a style="text-decoration: none;">Delete</a></button>
                                        </td>
                            <?php }
                            }
                        } ?>
                                    </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel">Edit details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="reset()"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    <table>
                        <tr>
                            <td><label for="edit_roll">Roll Number</label></td>
                            <td><input type="text" id="edit_roll" class="edit_roll"></td>
                        </tr>
                        <tr>
                            <td><label for="edit_name">Name</label></td>
                            <td><input type="text" id="edit_name" class="edit_name"></td>
                        </tr>
                    </table>
                    <br>
                    <div>
                        <p id="err"></p>
                    </div>
                    <br>
                </div>
                <div style="display: flex; justify-content: center;">
                    <button type="button" class="btn btn-success" id="edit_sub">Update info</button>
                </div>
            </div>
        </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(document).ready(function() {
        let del_n; // Declare rollNumber variable for deletion

        $(document).on("click", "#del_btn", function() {
            del_n = $(this).val(); // Set the value of rollNumber when the button is clicked
            console.log("Clicked Roll Number (event handler): " + del_n);
            del(del_n);
        });

        function del(del_n) {
            // console.log("Clicked in function: "+del_n)
            $.ajax({
                url: "http://localhost/webtech/delete.php",
                type: "POST",
                data: {
                    id: del_n
                },
                success: function(data) {
                    if (data == 1) {
                        window.location.href = 'http://localhost/webtech/editStd.php';
                    } else {
                        alert("Deletion failed")
                    }
                }
            });
        }


    });





    $(document).ready(function() {
        let rollNumber; // Declare rollNumber variable

        $(document).on("click", "#edit_btn", function() {
            rollNumber = $(this).val(); // Set the value of rollNumber when the button is clicked
            console.log("Clicked Roll Number (event handler): " + rollNumber);
        });



        function upd() {
            // console.log("Roll Number in upd(): " + rollNumber); // Debugging
            // Rest of the upd() function code
            let new_roll = document.getElementById("edit_roll").value;
            let new_name = document.getElementById("edit_name").value;
            $.ajax({
                url: "http://localhost/webtech/editdata.php",
                type: "POST",
                data: {
                    id: rollNumber,
                    newRoll: new_roll,
                    newName: new_name
                },
                success: function(data) {

                    if (data == 1) {
                        window.location.href = 'http://localhost/webtech/editStd.php';
                        alert("Information updated");
                    } else {
                        alert("Update failed")
                    }
                }
            });


        }
        $("#edit_sub").on("click", function() {
            upd(); // Call the upd() function
        });

    });

    function reset() {
        window.location.href = 'http://localhost/webtech/editStd.php';
    }




    $("#search").on("keyup", function() {
        let search_term = $(this).val();
        if (search_term == null) {

        }

        $.ajax({
            url: "http://localhost/webtech/searchStd.php",
            type: "POST",
            data: {
                search: search_term
            },
            success: function(data) {
                $("#search_data").html(data);
            }
        });
    });
</script>