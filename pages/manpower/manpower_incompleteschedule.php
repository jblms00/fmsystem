<?php
session_start();
include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");

$store = isset($_GET['str']) ? $_GET['str'] : '';
$branch_id = isset($_GET['branch_id']) ? (int)$_GET['branch_id'] : 0;

$data = [];

// Fetch employees specifically assigned to the selected branch
// if ($branch_id > 0) {
//     $sql = "
//         SELECT ua.user_id, ua.user_name, ua.user_phone_number, ui.employee_status
//         FROM user_information ui
//         WHERE ui.assigned_at = $branch_id
//     ";
//     $result = mysqli_query($con, $sql);

//     if ($result && mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             $data['employees'][] = $row;
//         }
//     } else {
//         $data['message'] = 'No employees assigned to this branch.';
//     }
// }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
        <link rel="stylesheet" href="../../assets/css/navbar.css">
        <link rel="stylesheet" href="../../assets/css/fullschedule.css">
    
        <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Manpower Deployment - Schedule</title>
</head>

<body>

    <?php include '../../navbar.php'; ?>

    <section class="home">

    <header class="contractheader">
            <div class="container-header">
                <h1 class="title">Scheduling</h1>
            </div>
        </header>

    <div class="container">
            <div class="dash-content">
                <div class="overview">
                    <div class="boxes-container">
                        <div class="box-group">
                            <h3 class="box-group-title">Store Schedules</h3>
                            <div class="branch-list" id="branchList">
                                <button type="button" class="box box1 check-employee border-0" >
                                    <i class='bx bx-user'></i>
                                    <!-- <span class="text emp-name">Employee Name</span> -->
                                </button>
                            </div>
                        
                        </div>
                        <div class="box-group2" id="employeeDetails">
                        <h1 class="employee-title">Employees</h1>
                            <h1 class="count-title"><span>0</span>/2</h1>
                            <div class="activity">
                                <section id="employees-section-unsched">
                                    <table class="content-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Schedule</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                            <!-- Add the new button here -->
                            <?php
                            // Replace `SelectedBranch` and `1` with dynamic values for branch_id and branch_name if available
                            $branch_name = isset($store) ? htmlspecialchars($store) : "Selected Branch";
                            $branch_id = isset($_GET['ac_id']) ? (int)$_GET['ac_id'] : 1;
                            echo "<script>console.log('Debug - Branch ID:', " . json_encode($branch_name) . ");</script>";
                            ?>
                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-primary" id="openAssignModal" data-ac-id="">Assign Manpower</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal -->
<!-- Assign Employees Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Employees</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Checkbox</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="unassignedEmployeesTable"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveAssignments">Save</button>
            </div>
        </div>
    </div>
</div>


    </section>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="../../assets/js/navbar.js"></script>
    <script src="../../assets/js/display-store-unschedules-script.js"></script>
    <script>
    $(document).on('click', '.select-branch', function () {
    const acId = $(this).data('ac-id');
    console.log("Debug - Selected ac_id:", acId); // Log selected ac_id
    $('#openAssignModal').data('ac-id', acId); // Pass ac_id to Assign Manpower button
});



        </script>
    <script>
$(document).ready(function () {
    // Load unassigned employees into modal
    $('#openAssignModal').on('click', function () {
        const acId = $(this).data('ac-id'); // Adjusted to ac_id
        $.ajax({
            url: '../../phpscripts/fetchUnassignedEmployees.php', // Backend script to fetch unassigned employees
            method: 'POST',
            data: { ac_id: acId },
            success: function (response) {
                try {
                    const employees = JSON.parse(response);
                    const tableBody = $('#unassignedEmployeesTable');
                    tableBody.empty();
                    if (employees.status === 'success') {
                        employees.data.forEach((employee) => {
                            const row = `
                                <tr>
                                    <td><input type="checkbox" value="${employee.user_id}" class="assignCheckbox"></td>
                                    <td>${employee.user_name}</td>
                                    <td>${employee.user_phone_number}</td>
                                    <td>${employee.user_address}</td>
                                    <td>${employee.employee_status}</td>
                                </tr>`;
                            tableBody.append(row);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="5">No unassigned employees found.</td></tr>');
                    }
                    $('#assignModal').modal('show');
                } catch (error) {
                    console.error("Parsing error:", error, "\nResponse:", response);
                    alert('An error occurred. Please check the console for details.');
                }
            },
            error: function () {
                alert('Failed to fetch unassigned employees. Please try again.');
            }
        });
    });

    // Save selected employees
    $('#saveAssignments').on('click', function () {
    const selectedEmployees = [];
    $('.assignCheckbox:checked').each(function () {
        selectedEmployees.push($(this).val());
    });

    // Retrieve ac_id from #openAssignModal
    const acId = $('#openAssignModal').data('ac-id');
    console.log("Sending Data to Backend:", {
        assigned_at: acId,
        employees: selectedEmployees
    });

    $.ajax({
        url: '../../phpscripts/assign-employees.php',
        method: 'POST',
        data: {
            assigned_at: acId,
            employees: selectedEmployees
        },
        success: function (response) {
            console.log("Response from Backend:", response);
            if (response.status === 'success') {
                alert('Employees assigned successfully!');
                location.reload();
            } else {
                alert(response.message || 'Failed to assign employees.');
            }
            $('#assignModal').modal('hide');
        },
        error: function () {
            alert('Failed to assign employees. Please try again.');
        }
    });
});


});


    </script>
</body>


</html>