<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<?php
$search_key = null;
if (isset($_POST['search'])) {
    $search_key = $_POST['search'];
}
if ($search_key == null) {
} else {
    $conn = new mysqli('localhost', 'root', '', 'attendance');
    if (!($conn)) {
        die(mysqli_error($conn));
    }

    $output = null;
    $roll = null;
    $name = null;
    $edit = null;
    $del = null;
    $sql = "SELECT DISTINCT Roll_no, Student_name FROM tab1 WHERE Student_name LIKE '%{$search_key}%'";
    $result = mysqli_query($conn, $sql);
    if (!($result)) {
        die(mysqli_error($conn));
    } else {

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rollNumber = $row["Roll_no"];
                $output = '<table style="border: 2px solid blueviolet; background-color: rgba(0, 0, 0, 0.4); font-size: 20px; text-align: center; padding: 10px; width:100%;"><tr>
                <td>' . $row['Roll_no'] . '</td>
                <td>' . $row['Student_name'] . '</td>
                <td><button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" 
                class="edit_btn" id="edit_btn" value="' . $rollNumber . '">
                <a style="text-decoration: none;">Edit/More details</a>
                </button></td>
                <td><button type="button" class="btn btn-danger" id="del_btn" value="' . $rollNumber . '"><a style="text-decoration: none;">Delete</a></button></td>
                </tr>
                </table>';
                echo $output;



                // $roll = $row['Roll_no'];
                // echo $roll;
                // $name = $row['Student_name'];
                // echo $name;
                // $edit = '<button type="button" class="btn btn-primary"><a href="http://localhost/webtech/editdata.php" style="text-decoration: none;">Edit/more</a></button>';
                // echo $edit;
                // $del = '<button type="button" class="btn btn-danger"><a href="" style="text-decoration: none;">Delete</a></button>';
                // echo $del;
                // echo $roll,$name,$edit,$del;
            }


            $conn->close();
        } else {
            echo '<h2>No record found</h2>';
        }
    }
}

?>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
</script>