$(document).ready(function () {
    displayStoreSchedules();
    showStoreDetails();
});

function getUrlParameter(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    var results = regex.exec(location.search);
    return results === null
        ? ""
        : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function displayStoreSchedules() {
    var listContainer = $("#branchList");
    var str = getUrlParameter("str");

    $.ajax({
        method: "POST",
        url: "../../phpscripts/display-stores-unschedules.php",
        data: { str: str },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                listContainer.empty();

                response.employees.forEach(function (employee) {
                    var img = getFranchiseImage(employee.franchisee);
                    var formattedFranchisee = formatFranchiseeName(
                        employee.franchisee
                    );

                    var storeHTML = `
                        <img class="logo brand-logo" src="../../assets/images/${img}" alt="${formattedFranchisee}">
                        <button class="select-branch" data-ac-id="${employee.ac_id}">${employee.branch}</button>
                    `;

                    listContainer.append(storeHTML);
                });
            } else {
                console.log(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
        },
    });
}

function showStoreDetails() {
    $(document).on("click", ".select-branch", function () {
        // Mark the selected branch as active
        $(".select-branch").removeClass("active");
        $(this).addClass("active");

        var id = $(this).data("ac-id");

        $.ajax({
            method: "POST",
            url: "../../phpscripts/get-store-details.php",
            data: { id: id },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    var employees = response.employees;
                    var tableBody = $("#employees-section-unsched tbody");

                    // Clear the existing table rows
                    tableBody.empty();

                    // Populate the table with new employee data
                    employees.forEach(function (employee) {
                        var rowHTML = `
                            <tr class="dynamic-row" data-user-id="${employee.user_id}">
                                <td>${employee.user_name}</td>
                                <td class="current-schedule">${
                                    employee.user_shift || "Unscheduled"
                                }</td>
                                <td>
                                    <select class="form-select w-100 shift-select" name="shift">
                                        <option selected disabled>Select schedule</option>
                                        <option value="Morning Shift" ${
                                            employee.time_in_sched ===
                                            "Morning Shift"
                                                ? "selected"
                                                : ""
                                        }>Morning Shift</option>
                                        <option value="Afternoon Shift" ${
                                            employee.time_in_sched ===
                                            "Afternoon Shift"
                                                ? "selected"
                                                : ""
                                        }>Afternoon Shift</option>
                                        <option value="Full Time" ${
                                            employee.time_in_sched ===
                                            "Full Time"
                                                ? "selected"
                                                : ""
                                        }>Full Time</option>
                                    </select>
                                </td>
                            </tr>
                        `;
                        tableBody.append(rowHTML);
                    });

                    // Update the count of employees
                    $(".count-title").text(`${employees.length}/2`);
                } else {
                    console.log(response.message);
                    // Display a message if no employees are found
                    $("#employees-section-unsched tbody").html(
                        `<tr><td colspan="3">No employees assigned to this branch.</td></tr>`
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            },
        });
    });

    // Handle dropdown selection and update table cell dynamically
    $(document).on("change", ".shift-select", function () {
        var $dropdown = $(this);
        var newShift = $dropdown.val();
        var $row = $dropdown.closest("tr");
        var userId = $row.data("user-id");

        // Update the corresponding table cell
        $row.find(".current-schedule").text(newShift);

        // Optionally, send the new schedule to the server
        $.ajax({
            method: "POST",
            url: "../../phpscripts/update-schedule.php",
            data: { user_id: userId, new_shift: newShift },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    console.log("Schedule updated successfully.");
                } else {
                    console.log(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            },
        });
    });
}

function formatFranchiseeName(name) {
    return name
        .split("-")
        .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        .join(" ");
}

function getFranchiseImage(franchise) {
    switch (franchise) {
        case "potato-corner":
            return "PotCor.png";
        case "auntie-anne":
            return "AuntieAnn.png";
        case "macao-imperial":
            return "MacaoImp.png";
        default:
            return "default-image.png";
    }
}
