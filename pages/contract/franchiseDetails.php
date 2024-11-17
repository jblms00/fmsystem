<?php
session_start();

include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = [];

if ($id) {
    $id = mysqli_real_escape_string($con, $id);

    $query = "SELECT * FROM agreement_contract WHERE ac_id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
        } else {
            $data['error'] = "No record found with ID: $id";
        }
    } else {
        $data['error'] = "Database query failed: " . mysqli_error($con);
    }
} else {
    $data['error'] = "ID not provided in the URL.";
}

function formatFranchiseeName($name)
{
    return strtoupper(str_replace('-', ' ', $name));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Document Franchise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/franchiseeDetails.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

<?php include '../../navbar.php'; ?>

    <section class="home">

        <header class="contractheader">
            <div class="container-header">
                <h1 class="title">Franchisee Details</h1>
            </div>
        </header>

        <div class="container">
            <!-- Your content for the new document franchise page -->
            <div class="franchise-details">
                <div class="contract-content">
                    <div class="contract-title">FRANCHISE AGREEMENT</div>
                    <div class="contract-subtitle franchisee-name">
                        <?php echo strtoupper(str_replace('-', ' ', $data['franchisee'])); ?>
                    </div>

                    <!-- Other contract details and content here -->

                    <div class="detail-item">
                        <span></span>
                        <p></p>
                    </div>

                    <div class="contract-subtitle">
                        <span>LICENSE GRANTED</span>
                    </div>
                    <div class="detail-item">
                        <span>Classification:</span>
                        <p><?php echo $data['classification']; ?></p>
                    </div>
                    <div class="detail-item">
                        <span>Rights Granted:</span>
                        <ul>
                            <?php
                            $franchiseeName = strtoupper(str_replace('-', ' ', $data['franchisee']));

                            $rightsMap = [
                                'non-exclusive' => 'Non-exclusive right to operate a ' . $franchiseeName . ' outlet',
                                'use-trademarks' => 'Right to use the trademark ' . $franchiseeName . ' and other proprietary marks',
                                'sell-products' => 'Right to sell proprietary products of ' . $franchiseeName . ' at the approved location',
                            ];

                            $rightsGranted = explode(',', $data['rights_granted']);

                            foreach ($rightsGranted as $right) {
                                if (isset($rightsMap[$right])) {
                                    echo '<li>' . $rightsMap[$right] . '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="contract-subtitle">
                        <span>TERM OF FRANCHISE</span>
                    </div>
                    <div class="detail-item">
                        <span>Agreement Date:</span>
                        <p><?php echo $data['franchise_term']; ?> years</p>
                    </div>
                    <div class="detail-item">
                        <span>End Date:</span>
                        <p><?php echo $data['agreement_date']; ?></p>
                    </div>

                    <div class="contract-subtitle">
                        <span>LOCATION</span>
                    </div>
                    <div class="detail-item">
                        <span>Location:</span>
                        <p><?php echo $data['location']; ?></p>
                    </div>

                    <div class="contract-subtitle">
                        <span>FEES</span>
                    </div>
                    <div class="detail-item">
                        <span>Franchise Fee:</span>
                        <p>₱ <?php echo number_format($data['franchise_fee'], 2); ?></p>
                    </div>

                    <div class="detail-item">
                        <span>Franchise Package:</span>
                        <p>₱ <?php echo number_format($data['franchise_package'], 2); ?></p>
                    </div>
                    <div class="detail-item">
                        <span>Bond:</span>
                        <p>₱ <?php echo number_format($data['bond'], 2); ?></p>
                    </div>


                    <div class="contract-subtitle">
                        <span>EXTRA</span>
                    </div>
                    <div class="detail-item">
                        <span></span>
                        <p><?php echo $data['extra_note']; ?></p>
                    </div>

                    <div class="contract-subtitle">
                <span>NOTARIZATION</span>
                </div>

            <div class="notarization-section">
                <div class="notarization-item">
                    <div class="notarization-line">
                        <span>Franchisor:</span>
                        <p><?php echo $data['notarization_fr']; ?></p>
                        <span>Represented by:</span>
                        <p><?php echo $data['notarization_fr_rb']; ?></p>
                    </div>
                    <div class="notarization-line">
                        <span>Franchisee:</span>
                        <p><?php echo $data['notarization_fe']; ?></p>
                        <span>Represented by:</span>
                        <p><?php echo $data['notarization_fe_rb']; ?></p>
                    </div>
                </div>

                <div class="notary-seal">
                    <div class="contract-subtitle">
                        <span>Notary Public's Seal:</span>
                    </div>
        <img src="../../assets/images/notarySeals/<?php echo $data['notary_public_seal']; ?>" alt="Notary Seal">
    </div>
</div>


                </div>

            </div>
            <div class="button-group">
                <a href="editDocumentFranchise<?php echo $id; ?>" class=" text-decoration-none myButton">Edit
                    Details</a>
                <a href="editDocumentFranchise<?php echo $id; ?>" class=" text-decoration-none myButton">Print
                    Contract</a>
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
    <!-- <script src="../../assets/js/content.js"></script> -->
    <script src="../../assets/js/agreement-contract-script.js"></script>
</body>

</html>