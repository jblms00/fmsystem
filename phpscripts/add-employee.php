<?php
session_start();

include("database-connection.php");
include("check-login.php");
$user_data = check_login($con);
$user_id_logged_in = $user_data['user_id'];

function generateRandom7Digit()
{
    return random_int(1000000, 9999999);
}

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input data
    $employeeName = mysqli_real_escape_string($con, $_POST['employeeName']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $franchisee = isset($_POST['franchisee']) ? mysqli_real_escape_string($con, $_POST['franchisee']) : '';
    $branch = isset($_POST['branch']) ? mysqli_real_escape_string($con, $_POST['branch']) : '';
    $shift = mysqli_real_escape_string($con, $_POST['shift']);

    $userId = generateRandom7Digit();
    $notificationId = generateRandom7Digit();  // Generate unique ID for notification
    $activityType = 'manpower_employee_added';

    // Check for required fields
    if (empty($employeeName) || empty($dob) || empty($address) || empty($email) || empty($mobile)) {
        $data['status'] = 'error';
        $data['message'] = 'All fields are required.';
    } else {
        
        if (empty($branch) || empty($franchisee)){
            $branch = '0';
            $franchisee = '0';
        }
        // Insert into users_accounts
        $sqlAccounts = "
        INSERT INTO users_accounts (user_id, user_name, user_photo, user_email, user_password, user_phone_number, user_address, user_birthdate, user_type, user_status, date_created)
        VALUES ('$userId', '$employeeName', '', '$email', '', '$mobile', '$address', '$dob', 'user', 'active', NOW())
    ";
    $resultAccounts = mysqli_query($con, $sqlAccounts);

        if (!empty($branch) || empty($franchisee)){
            // Fetch branch name based on branch id
            $branchQuery = "SELECT location FROM agreement_contract WHERE ac_id = '$branch'";
            $branchResult = mysqli_query($con, $branchQuery);
            $branchName = mysqli_num_rows($branchResult) > 0 ? mysqli_fetch_assoc($branchResult)['location'] : '';
        }


        // if ($branchName) {
        //     // Insert into users_accounts
        //     $sqlAccounts = "
        //         INSERT INTO users_accounts (user_id, user_name, user_photo, user_email, user_password, user_phone_number, user_address, user_birthdate, user_type, user_status, date_created)
        //         VALUES ('$userId', '$employeeName', '', '$email', '', '$mobile', '$address', '$dob', 'user', 'active', NOW())
        //     ";
        //     $resultAccounts = mysqli_query($con, $sqlAccounts);

        if ($resultAccounts) {
            // Combine certification information
            $certificationNames = isset($_POST['certificationName']) ? $_POST['certificationName'] : [];
            $certificationList = implode(', ', array_map(function ($cert) use ($con) {
                return mysqli_real_escape_string($con, $cert);
            }, $certificationNames));

            // if ($resultAccounts) {
            //     // Combine certification information
            //     $certificationNames = isset($_POST['certificationName']) ? $_POST['certificationName'] : [];
            //     $certificationList = implode(', ', array_map(function ($cert) use ($con) {
            //         return mysqli_real_escape_string($con, $cert);
            //     }, $certificationNames));

            //     // Insert into user_information
            //     $sqlInfo = "
            //         INSERT INTO user_information (assigned_at, user_id, employee_status, franchisee, branch, user_shift, certification_name, certification_date, certificate_file_name)
            //         VALUES ('$branch', 'assigned', '$franchisee', '$branchName', '$shift', '$certificationList', '', '')
            //     ";
            //     $resultInfo = mysqli_query($con, $sqlInfo);

        // Insert into user_information with branch name instead of ID
        $sqlInfo = "
        INSERT INTO user_information (assigned_at, user_id, employee_status, franchisee, branch, user_shift, certification_name, certification_date, certificate_file_name)
        VALUES ('$branch', '$userId', 'assigned', '$franchisee', '$branchName', '$shift', '$certificationList', '', '')
        ";
        $resultInfo = mysqli_query($con, $sqlInfo);

                // if ($resultInfo) {
                //     // Insert into notifications
                //     $sqlNotification = "INSERT INTO notifications (notification_id, user_id, activity_type, datetime) VALUES ('$notificationId', '$user_id_logged_in', '$activityType', NOW())
                //     ";
                //     $resultNotification = mysqli_query($con, $sqlNotification);

        if ($resultInfo) {
            // Insert into notifications
            $sqlNotification = "INSERT INTO notifications (notification_id, user_id, activity_type, datetime) VALUES ('$notificationId', '$user_id_logged_in', '$activityType', NOW())";
            $resultNotification = mysqli_query($con, $sqlNotification);

                if ($resultNotification) {
                    $data['status'] = 'success';
                    $data['message'] = 'Employee added successfully.';
                } else {
                    $data['status'] = 'error';
                    $data['message'] = 'Error adding notification.';
                }
                } else {
                    $data['status'] = 'error';
                    $data['message'] = 'Error adding employee details.';
                }
            } else {
                $data['status'] = 'error';
                $data['message'] = 'Error adding user account or invalid branch selected.';
            }
        }
}

echo json_encode($data);
?>