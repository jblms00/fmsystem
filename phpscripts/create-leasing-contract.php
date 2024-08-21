<?php
session_start();
include("database-connection.php");

$data = [];

// Check if the form data is received via POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $docStatus = $_POST['docStatus'];
    $franchise = isset($_POST['franchise']) ? $_POST['franchise'] : '';
    $leaseStartDate = isset($_POST['leaseStartDate']) ? $_POST['leaseStartDate'] : '';
    $leaseEndDate = isset($_POST['leaseEndDate']) ? $_POST['leaseEndDate'] : '';
    $spaceNumber = isset($_POST['spaceNumber']) ? $_POST['spaceNumber'] : '';
    $area = isset($_POST['area']) ? $_POST['area'] : '';
    $classification = isset($_POST['classification']) ? $_POST['classification'] : '';
    $rent = isset($_POST['rent']) ? $_POST['rent'] : '';
    $percentageRent = isset($_POST['percentageRent']) ? $_POST['percentageRent'] : '';
    $minimumRent = isset($_POST['minimumRent']) ? $_POST['minimumRent'] : '';
    $leaseFee = isset($_POST['leaseFee']) ? $_POST['leaseFee'] : '';
    $leaseFeeNote = isset($_POST['leaseFeeNote']) ? $_POST['leaseFeeNote'] : '';
    $totalMonthlyDues = isset($_POST['totalMonthlyDues']) ? $_POST['totalMonthlyDues'] : '';
    $totalMonthlyDuesNote = isset($_POST['totalMonthlyDuesNote']) ? $_POST['totalMonthlyDuesNote'] : '';
    $leaseDeposit = isset($_POST['leaseDeposit']) ? $_POST['leaseDeposit'] : '';
    $leaseDepositNote = isset($_POST['leaseDepositNote']) ? $_POST['leaseDepositNote'] : '';
    $lessorName = isset($_POST['lessorName']) ? $_POST['lessorName'] : '';
    $lesseeName = isset($_POST['lesseeName']) ? $_POST['lesseeName'] : '';
    $lessorAddress = isset($_POST['lessorAddress']) ? $_POST['lessorAddress'] : '';
    $lesseeAddress = isset($_POST['lesseeAddress']) ? $_POST['lesseeAddress'] : '';
    $extraNoteLeasing = isset($_POST['extraNoteLeasing']) ? $_POST['extraNoteLeasing'] : '';
    $notarySealLeasing = '';

    // Validate required fields
    $requiredFields = [
        $franchise,
        $leaseStartDate,
        $leaseEndDate,
        $spaceNumber,
        $area,
        $classification,
        $rent,
        $percentageRent,
        $minimumRent,
        $leaseFee,
        $totalMonthlyDues,
        $leaseDeposit,
        $lessorName,
        $lesseeName,
        $lessorAddress,
        $lesseeAddress
    ];

    foreach ($requiredFields as $field) {
        if (empty($field)) {
            $data['status'] = "error";
            $data['message'] = "Please fill in all required fields.";
            echo json_encode($data);
            exit();
        }
    }

    // Handle file upload for notary seal
    if (isset($_FILES['notarySealLeasing']) && $_FILES['notarySealLeasing']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../assets/images/notarySeals/';
        $originalFileName = $_FILES['notarySealLeasing']['name'];
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $uploadFileName = 'notarySeal-' . date('YmdHis') . '.' . $fileExtension;
        $uploadFile = $uploadDir . $uploadFileName;

        if (move_uploaded_file($_FILES['notarySealLeasing']['tmp_name'], $uploadFile)) {
            $notarySealLeasing = $uploadFile;
        } else {
            $data['status'] = "error";
            $data['message'] = "Failed to upload notary seal file";
            echo json_encode($data);
            exit();
        }
    }

    // SQL insertion query
    $insert_query = "INSERT INTO lease_contract (
                        franchisee,
                        start_date,
                        end_date,
                        space_number,
                        area,
                        classification,
                        rent,
                        percentage_rent,
                        minimum_rent,
                        additional_fee,
                        af_note,
                        total_monthly_dues,
                        tmd_note,
                        lease_deposit,
                        ld_note,
                        lessor_name1,
                        lessor_address1,
                        lessor_name2,
                        lessor_address2,
                        extra_note,
                        notary_public_seal,
                        status,
                        datetime_added
                    ) VALUES (
                        '$franchise',
                        '$leaseStartDate',
                        '$leaseEndDate',
                        '$spaceNumber',
                        '$area',
                        '$classification',
                        '$rent',
                        '$percentageRent',
                        '$minimumRent',
                        '$leaseFee',
                        '$leaseFeeNote',
                        '$totalMonthlyDues',
                        '$totalMonthlyDuesNote',
                        '$leaseDeposit',
                        '$leaseDepositNote',
                        '$lessorName',
                        '$lessorAddress',
                        '$lesseeName',
                        '$lesseeAddress',
                        '$extraNoteLeasing',
                        '$uploadFileName',
                        '$docStatus',
                        NOW()
                    )";

    if (mysqli_query($con, $insert_query)) {
        $data['status'] = "success";
        $data['message'] = "Lease contract created successfully";
    } else {
        $data['status'] = "error";
        $data['message'] = "Database error: " . mysqli_error($con);
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}

echo json_encode($data);
?>