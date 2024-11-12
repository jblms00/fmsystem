<?php
session_start();
include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

// Retrieve branch information from GET parameters or default to a placeholder
$branch_name = isset($_GET['branch']) ? htmlspecialchars($_GET['branch']) : "Selected Branch";
$branch_id = isset($_GET['branch_id']) ? (int)$_GET['branch_id'] : 0;

$data = [];
if ($branch_id) {
    // Fetch unassigned employees for the selected branch
    $sql = "
        SELECT ua.user_id, ua.user_name, ua.user_phone_number, ua.user_address
        FROM users_accounts ua
        LEFT JOIN user_information ui ON ua.user_id = ui.user_id
        WHERE ui.user_id IS NULL OR (ui.assigned_at = 0 AND ui.employee_status = 'unassigned')
    ";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data['employees'][] = $row;
        }
    } else {
        $data['message'] = 'No unassigned employees found';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manpower Deployment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <style>
        .container {
            max-width: 80%;
            margin: 50px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #2b3a5b;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content h2 {
            color: #444;
        }
        .buttons {
            text-align: right;
        }
        .btn-cancel {
            background-color: #666;
            color: white;
        }
        .btn-assign {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<link rel="stylesheet" href="../../assets/css/navbar.css">

<div class="container">
    <div class="header">
        <h1>Manpower Deployment</h1>
    </div>
    <div class="content">
        <h2>Unassigned Employees for <?php echo $branch_name; ?></h2>
        <form action="assign_employee.php" method="post">
            <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>">
            <table class="table">
                <thead> 
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($data['employees'])) {
                    foreach ($data['employees'] as $employee) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='employee[]' value='{$employee['user_id']}'></td>";
                        echo "<td>" . htmlspecialchars($employee['user_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($employee['user_phone_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($employee['user_address']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>" . htmlspecialchars($data['message'] ?? "No unassigned employees available") . "</td></tr>";
                }
                ?>
                </tbody>
            </table>
            <div class="buttons">
                <a href="manpower_incompleteschedule2.php" class="btn btn-cancel">Cancel</a>
                <button type="button" class="btn btn-primary" onclick="window.location.href='manpower_incompleteschedule2.php'">Assign Employee</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="../../assets/js/navbar.js"></script>
</body>
</html>
