<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/inventory.css" type="text/css">
    <title>Inventory Module</title>
</head>

<body>

    <div class="header">
        <h1 class="headertext">Inventory</h1>
    </div>

    <div class="container">
        <div class="filters">
            <input type="text" placeholder="Search" id="search">
            <input type="date" id="date">
            <select id="franchise">
                <option value="">Franchise</option>
                <option value="potato_corner">Potato Corner</option>
                <option value="auntie_annes">Auntie Anne's</option>
                <option value="macao">Macao Imperial Tea</option>
            </select>
            <button id="new-report">New Report</button>
        </div>

        <div class="content">
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th>Franchisee</th>
                        <th>Location</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-franchisee="Potato Corner" data-location="Lyceum of the Philippines" data-date="5/20/24">
                        <td><img src="assets/images/PotCor.png" alt="Potato Corner"> Lyceum of the Philippines</td>
                        <td>Lyceum of the Philippines</td>
                        <td>5/20/24</td>
                    </tr>
                    <tr data-franchisee="Auntie Anne's" data-location="Urdaneta, Pangasinan" data-date="5/20/24">
                        <td><img src="assets/images/AuntieAnn.png" alt="Auntie Anne's"> Urdaneta, Pangasinan</td>
                        <td>Urdaneta, Pangasinan</td>
                        <td>5/20/24</td>
                    </tr>
                    <tr data-franchisee="Macao Imperial Tea" data-location="SM Grand Central" data-date="5/20/24">
                        <td><img src="assets/images/MacaoImp.png" alt="Macao Imperial Tea"> SM Grand Central</td>
                        <td>SM Grand Central</td>
                        <td>5/20/24</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
            <div class="stock-notification">
                <h2>Stock Notification</h2>
                <div class="notification">
                    <p>5/20/24</p>
                    <p>Potato Corner</p>
                    <p>Circuit Makati</p>
                    <p>Less than threshold amount: SOFTDRINKS IN CAN - COKE</p>
                    <button>Resolve</button>
                </div>
            </div>
        </div>
    </div>

    <div id="firstModal" class="modal2">
        <div class="modal-content2">
            <div class="modal-header2">
                <h2>New Inventory Report</h2>
                <span class="close" id="closeFirstModal">&times;</span>
            </div>
            <div class="modal-body">
                <button class="franchise-btn" data-franchise="potato_corner">
                    <img src="assets/images/PotCor.png" alt="Potato Corner">
                </button>
                <button class="franchise-btn" data-franchise="auntie_annes">
                    <img src="assets/images/AuntieAnn.png" alt="Auntie Anne's">
                </button>
                <button class="franchise-btn" data-franchise="macao">
                    <img src="assets/images/MacaoImp.png" alt="Macao Imperial Tea">
                </button>
            </div>
        </div>
    </div>

    <div id="secondModal" class="modal2">
        <div class="modal-content2">
            <div class="modal-header2">
                <h2>New Inventory Report</h2>
                <span class="close" id="closeSecondModal">&times;</span>
            </div>
            <div class="modal-body">
                <img id="selectedFranchiseLogo" src="" alt="Selected Franchise">
                <select id="branch-select">
                    <option value="">Select Location</option>
                </select>
                <button id="backButton">Back</button>
                <button id="nextButton">Next</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var rows = document.querySelectorAll(".inventory-table tbody tr");
            rows.forEach(function (row) {
                row.addEventListener("click", function () {
                    var franchisee = row.getAttribute("data-franchisee");
                    var location = row.getAttribute("data-location");
                    var date = row.getAttribute("data-date");
                    window.location.href = `clickedInventory.html?franchisee=${encodeURIComponent(franchisee)}&location=${encodeURIComponent(location)}&date=${encodeURIComponent(date)}`;
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            var newReportBtn = document.getElementById("new-report");
            var firstModal = document.getElementById("firstModal");
            var secondModal = document.getElementById("secondModal");
            var closeFirstModal = document.getElementById("closeFirstModal");
            var closeSecondModal = document.getElementById("closeSecondModal");
            var franchiseButtons = document.querySelectorAll(".franchise-btn");
            var selectedFranchiseLogo = document.getElementById("selectedFranchiseLogo");
            var branchSelect = document.getElementById("branch-select");
            var backButton = document.getElementById("backButton");
            var nextButton = document.getElementById("nextButton");

            var franchiseBranches = {
                potato_corner: ["Lyceum of the Philippines", "Circuit Makati", "Market Market BGC"],
                auntie_annes: ["Urdaneta, Pangasinan", "SM Grand Central"],
                macao: ["SM Grand Central", "Eastwood City, Pasig"]
            };

            newReportBtn.addEventListener("click", function () {
                firstModal.style.display = "block";
            });

            closeFirstModal.addEventListener("click", function () {
                firstModal.style.display = "none";
            });

            closeSecondModal.addEventListener("click", function () {
                secondModal.style.display = "none";
            });

            franchiseButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    var franchise = button.getAttribute("data-franchise");
                    selectedFranchiseLogo.src = button.querySelector("img").src;
                    branchSelect.innerHTML = '<option value="">Select Location</option>';
                    franchiseBranches[franchise].forEach(function (branch) {
                        var option = document.createElement("option");
                        option.value = branch;
                        option.textContent = branch;
                        branchSelect.appendChild(option);
                    });
                    firstModal.style.display = "none";
                    secondModal.style.display = "block";
                });
            });

            backButton.addEventListener("click", function () {
                secondModal.style.display = "none";
                firstModal.style.display = "block";
            });

            nextButton.addEventListener("click", function () {
                var selectedBranch = branchSelect.value;
                if (selectedBranch) {
                    window.location.href = `inventoryNewReport.html?franchise=${encodeURIComponent(selectedFranchiseLogo.alt)}&branch=${encodeURIComponent(selectedBranch)}`;
                } else {
                    alert("Please select a location.");
                }
            });

            window.onclick = function (event) {
                if (event.target == firstModal) {
                    firstModal.style.display = "none";
                }
                if (event.target == secondModal) {
                    secondModal.style.display = "none";
                }
            }
        });
    </script>




</body>

</html>