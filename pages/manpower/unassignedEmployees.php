<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Unassigned Employees</title>

    <!-- ========= CSS ========= -->
    <link rel="stylesheet" href="assets/css/unassignedEmployees.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="manpowerheader">
        <div class="container-header">
            <h1 class="title">Unassigned Employees</h1>
        </div>
    </header>

    <div class="activity">
        <section id="employees-section">
            <span class="text">Recent Activities</span>


            <table class="content-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="manpowerEmployee-row-1">
                        <td>Maria Santos</td>
                        <td>09123456789</td>
                        <td>Magalang, Pampanga</td>
                        <td><span class="status incomplete">Incomplete Certification</span></td>
                    </tr>
                    <tr id="manpowerEmployee-row-2">
                        <td>Maria Santos</td>
                        <td>09123456789</td>
                        <td>Magalang, Pampanga</td>
                        <td><span class="status incomplete">Incomplete Certification</span></td>
                    </tr>
                    <tr id="manpowerEmployee-row-3">
                        <td>Maria Santos</td>
                        <td>09123456789</td>
                        <td>Magalang, Pampanga</td>
                        <td><span class="status active">Ready for Deployment</span></td>
                    </tr>
                    <tr id="manpowerEmployee-row-3">
                        <td>Maria Santos</td>
                        <td>09123456789</td>
                        <td>Magalang, Pampanga</td>
                        <td><span class="status incomplete">Incomplete Certification</span></td>

                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <div class="branches">
        <div class="staffed-branches">
            <h1 class="branch-title">Fully Staffed Branches</h1>
            <div id="potatocorner-full-position" class="store">
                <img class="logo" src="assets/images/PotCor.png" alt="Potato Corner">
                <h3 id="store-text">Potato Corner</h3>
            </div>
            <div id="auntieannes-full-position" class="store">
                <img class="logo" src="assets/images/AuntieAnn.png" alt="Auntie Anne's">
                <h3 id="store-text">Auntie Anne's</h3>
            </div>
            <div id="macao-full-position" class="store">
                <img class="logo" src="assets/images/MacaoImp.png" alt="Macao Imperial Tea">
                <h3 id="store-text">Macao Imperial Tea</h3>
            </div>
        </div>
        <div class="understaffed-branches">
            <h1 class="branch-title">Understaffed Branches</h1>
            <div id="potatocorner-under-position" class="store">
                <img class="logo" src="assets/images/PotCor.png" alt="Potato Corner">
                <h3 id="store-text">Potato Corner</h3>
            </div>
            <div id="auntieannes-under-position" class="store">
                <img class="logo" src="assets/images/AuntieAnn.png" alt="Auntie Anne's">
                <h3 id="store-text">Auntie Anne's</h3>
            </div>
            <div id="macao-under-position" class="store">
                <img class="logo" src="assets/images/MacaoImp.png" alt="Macao Imperial Tea">
                <h3 id="store-text">Macao Imperial Tea</h3>
            </div>
        </div>
    </div>

</body>





</html>