$(document).ready(function () {
    displayEmployees();
    showEmployeeDetails();
    addEmployee();
    displayRecentActivities();
});

function displayEmployees() {
    var listContainer = $("#employeeList");
    $.ajax({
        method: "GET",
        url: "../../phpscripts/display-employees.php",
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                listContainer.empty();

                response.employees.forEach(function (employee) {
                    var employeeButton = $("<button>")
                        .addClass("box box1 check-employee border-0")
                        .attr("data-id", employee.user_id)
                        .html(
                            "<i class='bx bx-user'></i><span class='text emp-name'>" +
                                employee.user_name +
                                "</span>"
                        );

                    listContainer.append(employeeButton);
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

function showEmployeeDetails() {
    $(document).on("click", ".check-employee", function () {
        var employeeId = $(this).data("id");
        $.ajax({
            method: "POST",
            url: "../../phpscripts/get-employee-details.php",
            data: { id: employeeId },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    var employee = response.employee[0];

                    var htmlContent = `
                        <div class="container2">
                            <header class="header-report">Employee Information</header>
                            <div class="header-section2">
                                <span class="header-label">Personal Information</span>
                                <span class="header-label2">Name:</span> ${employee.user_name} <br>
                                <span class="header-label2">Address:</span> ${employee.user_address} <br>
                                <span class="header-label2">Date of Birth:</span> ${employee.user_birthdate}
                            </div>
                            <div class="header-section2">
                                <span class="header-label">Contact Information</span>
                                <span class="header-label2">Email:</span> ${employee.user_email} <br>
                                <span class="header-label2">Mobile:</span> ${employee.user_phone_number}
                            </div>
                            <div class="header-section2">
                                <span class="header-label">Employment Information</span>
                                <span class="header-label2">Branch Assignment:</span> ${employee.branch} <br>
                                <span class="header-label2">Employment Status:</span> ${employee.employee_status}
                            </div>
                            <div class="header-section2">
                                <span class="header-label">Certification Information</span>
                                <span class="header-label2">Certifications Held:</span> ${employee.certifications}
                            </div>
                            <button id="certification-btn" class="certification-btn"></i>Certification Tracking</button>
                        </div>
                    `;

                    $("#employeeDetails").html(htmlContent);
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

function addEmployee() {
    $(document).on("click", ".add-employee", function () {
        var formData = $("#addEmployeeForm").serialize();

        $.ajax({
            method: "POST",
            url: "../../phpscripts/add-employee.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $("input, button, textarea, select, a").prop(
                        "disabled",
                        true
                    );
                    displayModal("Success", response.message, "#198754");

                    setTimeout(function () {
                        closeModal();
                        window.location.href = "manpower_dashboard";
                    }, 3000);

                    $("#addEmployeeForm")[0].reset();
                } else {
                    displayModal("Error", response.message, "#dc3545");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            },
        });
    });
}

function displayRecentActivities() {
    $.ajax({
        url: "../../phpscripts/fetch-recent-activities.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var tableBody = $("#recentActivities tbody");
            tableBody.empty();

            if (response.length > 0) {
                response.forEach(function (activity) {
                    var date = new Date(activity.date);
                    var formattedDate =
                        date.getMonth() +
                        1 +
                        "/" +
                        date.getDate() +
                        "/" +
                        date.getFullYear().toString().substr(-2);

                    var activityType;
                    if (activity.activity === "manpower_employee_added") {
                        activityType = "Added new employee";
                    }

                    var row = `<tr>
                        <td>${activity.name}</td>
                        <td>${activityType}</td>
                        <td>${formattedDate}</td>
                    </tr>`;
                    tableBody.append(row);
                });
            } else {
                tableBody.append(
                    '<tr><td colspan="3">No recent activities found.</td></tr>'
                );
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
        },
    });
}

function displayModal(title, message, backgroundColor) {
    $("#modalTitle").text(title);
    $("#modalMessage").text(message);
    $("#modalOverlay").fadeIn();
    $("#modalBox").css("background-color", backgroundColor);
    setTimeout(closeModal, 3000);
}

function closeModal() {
    $("#modalOverlay").fadeOut();
}

$(document).on("click", "#modalCloseBtn", closeModal);
