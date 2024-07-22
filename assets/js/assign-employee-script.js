$(document).ready(function () {
    $(".assign-now").on("click", function () {
        var selectedEmployees = [];
        $(".employee-checkbox:checked").each(function () {
            selectedEmployees.push($(this).data("user-id"));
        });

        var assignedAt = $(this).data("ac-id");
        var store = $(this).data("store");

        if (selectedEmployees.length === 0) {
            alert("Please select at least one employee.");
            return;
        }

        $.ajax({
            type: "POST",
            url: "../../phpscripts/assign-employees.php",
            data: {
                employees: selectedEmployees,
                assigned_at: assignedAt,
                store: store,
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status === "success") {
                    alert(data.message);
                    window.location.href = "manpower_dashboard";
                } else {
                    alert(data.message);
                }
            },
            error: function () {
                alert("An error occurred while processing your request.");
            },
        });
    });

    $("#cancel-button").on("click", function () {
        window.history.back(); // Go back to the previous page
    });
});
