<?php
session_start();

include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $docStatus = $_POST['docStatus'];
    $franchise = isset($_POST['franchise']) ? $_POST['franchise'] : '';
    $classification = isset($_POST['classification']) ? $_POST['classification'] : '';
    $rightsGranted = isset($_POST['rightsGranted']) ? $_POST['rightsGranted'] : [];
    $franchiseTerm = isset($_POST['franchiseTerm']) ? $_POST['franchiseTerm'] : '';
    $agreementDate = isset($_POST['agreementDate']) ? $_POST['agreementDate'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $franchiseFee = isset($_POST['franchiseFee']) ? $_POST['franchiseFee'] : '';
    $franchiseFeeNote = isset($_POST['franchiseFeeNote']) ? $_POST['franchiseFeeNote'] : '';
    $franchisePackage = isset($_POST['franchisePackage']) ? $_POST['franchisePackage'] : '';
    $franchisePackageNote = isset($_POST['franchisePackageNote']) ? $_POST['franchisePackageNote'] : '';
    $bond = isset($_POST['bond']) ? $_POST['bond'] : '';
    $bondNote = isset($_POST['bondNote']) ? $_POST['bondNote'] : '';
    $extraNoteFranchise = isset($_POST['extraNoteFranchise']) ? $_POST['extraNoteFranchise'] : '';
    $franchisor = isset($_POST['franchisor']) ? $_POST['franchisor'] : '';
    $franchisee = isset($_POST['franchisee']) ? $_POST['franchisee'] : '';
    $franchisorRep = isset($_POST['franchisorRep']) ? $_POST['franchisorRep'] : '';
    $franchiseeRep = isset($_POST['franchiseeRep']) ? $_POST['franchiseeRep'] : '';

    if (empty($franchise) || empty($classification) || empty($franchiseTerm) || empty($agreementDate) || empty($location)) {
        $data['status'] = "error";
        $data['message'] = "Please fill in all required fields.";
    } else {
        $notarySealFranchise = '';
        if (isset($_FILES['notarySealFranchise']) && $_FILES['notarySealFranchise']['error'] == 0) {
            $uploadDir = '../assets/images/notarySeals/';
            $originalFileName = $_FILES['notarySealFranchise']['name'];
            $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $uploadFileName = 'notarySealAgreement-' . date('YmdHis') . '.' . $fileExtension;
            $uploadFile = $uploadDir . $uploadFileName;
            if (move_uploaded_file($_FILES['notarySealFranchise']['tmp_name'], $uploadFile)) {
                $notarySealFranchise = $uploadFile;
            } else {
                $data['status'] = "error";
                $data['message'] = "File upload failed";
                echo json_encode($data);
                exit();
            }
        }
        $insert_query = "INSERT INTO agreement_contract (
                            franchisee,
                            classification,
                            rights_granted,
                            franchise_term,
                            agreement_date,
                            location,
                            franchise_fee,
                            ff_note,
                            franchise_package,
                            fp_note,
                            bond,
                            b_note,
                            extra_note,
                            notarization_fr,
                            notarization_fr_rb,
                            notarization_fe,
                            notarization_fe_rb,
                            notary_public_seal,
                            status,
                            datetime_added
                        ) VALUES (
                            '$franchise',
                            '$classification',
                            '$rightsGranted',
                            '$franchiseTerm',
                            '$agreementDate',
                            '$location',
                            '$franchiseFee',
                            '$franchiseFeeNote',
                            '$franchisePackage',
                            '$franchisePackageNote',
                            '$bond',
                            '$bondNote',
                            '$extraNoteFranchise',
                            '$franchisor',
                            '$franchisorRep',
                            '$franchisee',
                            '$franchiseeRep',
                            '$notarySealFranchise',
                            '$docStatus',
                            NOW()
                        )";

        if (mysqli_query($con, $insert_query)) {
            $data['status'] = "success";
            $data['message'] = "Agreement contract saved successfully";
        } else {
            $data['status'] = "error";
            $data['message'] = "Database error: " . mysqli_error($con);
        }
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}

echo json_encode($data);
?>