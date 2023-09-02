<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<?php
$search_key = null;
$a_date = null;
if (isset($_POST['date'])) {
    $a_date = $_POST['date'];
}
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
    $sql = "SELECT x.Roll_no,Student_name,attendance FROM tab1 x INNER JOIN tab2 y ON x.Roll_no=y.Roll_no WHERE a_date='$a_date' AND Student_name LIKE '%{$search_key}%'";

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
                <td>' . $row['attendance'] . '</td>
                </tr>
                </table>';
                echo $output;
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