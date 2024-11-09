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
                        <button type="button" class="select-branch border-0" data-ac-id="${employee.assigned_at}">
                            <h2 class="branch-details">${formattedFranchisee}</h2>
                            <img class="logo" src="../../assets/images/${img}" alt="${formattedFranchisee}">
                            <h2 class="branch-details">${employee.branch}</h2>
                        </button>
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
        var id = $(this).data("ac-id");
        $.ajax({
            method: "POST",
            url: "../../phpscripts/get-store-details.php",
            data: { id: id },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $(".assign-btn").removeClass("d-none");
                    var employees = response.employees;
                    var htmlContent = "";
                    var count = employees.length;

                    employees.forEach(function (employee) {
                        htmlContent += `
                            <tr data-user-id="${employee.user_id}">
                                <td>${employee.user_name}</td>
                                <td class="current-schedule">${
                                    employee.user_shift
                                }</td>
                                <td>
                                    <select class="form-select w-50 shift-select" name="shift">
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
                    });

                    // $(".assign-emp").attr("data-ac-id", id);

                    $("#employees-section-unsched tbody").html(htmlContent);
                    $(".count-title").text(`${count}/2`);
                } else {
                    console.log(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            },
        });
    });

    $(document).on("change", ".shift-select", function () {
        var $this = $(this);
        var userId = $this.closest("tr").data("user-id");
        var newShift = $this.val();

        $.ajax({
            method: "POST",
            url: "../../phpscripts/update-schedule.php",
            data: { user_id: userId, new_shift: newShift },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $this
                        .closest("tr")
                        .find(".current-schedule")
                        .text(newShift);
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

    // $(document).on("click", ".assign-emp", function () {
    //     var id = $(this).data("ac-id");
    //     var str = getUrlParameter("str");
    //     var newUrl = `unassignedEmployees?str=${str}&id=${id}`;

    //     console.log(id);
    //     console.log(str);
    //     window.location.href = newUrl;
    // });
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
