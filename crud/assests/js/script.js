// Add Record
function addRecord() {
    // get values
    var formData = new FormData($('#form_data')[0]);
    var first_name = $("#first_name").val();
    first_name = first_name.trim();
    var last_name = $("#last_name").val();
    last_name = last_name.trim();
    var email = $("#email").val();
    email = email.trim();

    if (first_name == "") {
        alert("First name field is required!");
    }
    else if (last_name == "") {
        alert("Last name field is required!");
    }
    else if (email == "") {
        alert("Email field is required!");
    }
    else {
        // Add record
        $.ajax({
            url: "ajax/create.php",
            type: "POST",
            data:  formData,
            processData: false,
            contentType: false,
            success: function(result){
                // $("#add_new_record").modal("hide");
                // // read records again
                // readRecords();
                // // clear fields from the popup
                // $("#first_name").val("");
                // $("#last_name").val("");
                // $("#email").val("");
            }
        });
        
    }
}
// Read Records:

// READ records
function readRecords() {
    $.get("ajax/read.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
// Get details:

function GetUserDetails(id) {
    // Add User ID to the hidden field
    $("#hidden_user_id").val(id);
    $.post("ajax/details.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assign existing values to the modal popup fields
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}
// Update Record:

function UpdateUserDetails() {
    // get values
    var first_name = $("#update_first_name").val();
    first_name = first_name.trim();
    var last_name = $("#update_last_name").val();
    last_name = last_name.trim();
    var email = $("#update_email").val();
    email = email.trim();

    if (first_name == "") {
        alert("First name field is required!");
    }
    else if (last_name == "") {
        alert("Last name field is required!");
    }
    else if (email == "") {
        alert("Email field is required!");
    }
    else {
        // get hidden field value
        var id = $("#hidden_user_id").val();

        // Update the details by requesting to the server using ajax
        $.post("ajax/update.php", {
                id: id,
                first_name: first_name,
                last_name: last_name,
                email: email
            },
            function (data, status) {
                // hide modal popup
                $("#update_user_modal").modal("hide");
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}
// Delete Record:

function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/delete.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}
// Read records on page load:

$(document).ready(function () {
    // READ records on page load
    readRecords(); // calling function
});