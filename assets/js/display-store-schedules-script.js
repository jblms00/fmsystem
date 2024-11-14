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
        url: "../../phpscripts/display-stores-schedules.php",
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
                        <button class="select-branch" data-ac-id="${employee.assigned_at}">${employee.branch}</button>
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
                    var employees = response.employees;
                    var htmlContent = "";
                    var count = employees.length;

                    employees.forEach(function (employee) {
                        htmlContent += `
                            <tr>
                                <td>${employee.user_name}</td>
                                <td>${employee.user_shift}</td>
                            </tr>
                        `;
                    });

                    $("#employees-section tbody").html(htmlContent);
                    $(".count-title span").text(count);
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
