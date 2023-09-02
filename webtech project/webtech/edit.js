$(document).ready(function () {
    let del_id; // Declare rollNumber variable

    $(document).on("click", "#del_btn", function () {
        del_id = $(this).val(); // Set the value of rollNumber when the button is clicked
        console.log("Clicked Roll Number (event handler): " + del_id);
    });
});





$(document).ready(function () {
    let rollNumber; // Declare rollNumber variable

    $(document).on("click", "#edit_btn", function () {
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
            success: function (data) {

                if (data == 1) {
                    window.location.href = 'http://localhost/webtech/editStd.php';
                    alert("Information updated");
                }
                else {
                    alert("Update failed")
                }
            }
        });


    }
    $("#edit_sub").on("click", function () {
        upd(); // Call the upd() function
    });

});

function reset() {
    window.location.href = 'http://localhost/webtech/editStd.php';
}




$("#search").on("keyup", function () {
    let search_term = $(this).val();
    if (search_term == null) {

    }

    $.ajax({
        url: "http://localhost/webtech/searchStd.php",
        type: "POST",
        data: {
            search: search_term
        },
        success: function (data) {
            $("#search_data").html(data);
        }
    });
});