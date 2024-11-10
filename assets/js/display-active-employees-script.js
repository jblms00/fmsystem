$(document).ready(function () {
    displayActiveEmployees();
});

function getUrlParameter(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    var results = regex.exec(location.search);
    return results === null
        ? ""
        : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function displayActiveEmployees() {
    var str = getUrlParameter("str");

    $.ajax({
        url: "../../phpscripts/get-active-employees.php",
        method: "POST",
        data: { str: str },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                var branches = response.data;
                var mainContainer = $(".main-container");
                mainContainer.empty();

                branches.forEach((branch) => {
                    var branchSection = `
                        <div class="employee-section">
                            <h3>${branch.branch}</h3>
                            <table class="employee-list">
                                <tr>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Shift Timing</th>
                                    <th>Status</th>
                                </tr>`;

                    branch.employees.forEach((employee) => {
                        branchSection += `
                            <tr>
                                <td>${employee.name}</td>
                                <td>0${employee.phone}</td>
                                <td>${employee.shift}</td>
                                <td><span class="status ${employee.status_class}">${employee.status}</span></td>
                            </tr>`;
                    });

                    branchSection += `
                            </table>
                        </div>`;

                    mainContainer.append(branchSection);
                });
            } else {
                console.log("Failed to retrieve employee data.");
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
}
