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
    <header class="header">
        <div class="headertext">Daily Ending Inventory</div>
    </header>
    <div class="container">
        <div class="regularText">Franchise: POTATO CORNER</div>
        <div class="regularText">Location: Circuit Makati</divp>
            <div class="regularText">Filled by: &lt;USERNAME&gt;</div>
            <div class="regularText">5/20/24</div>
            <div class="filters">
                <input type="text" placeholder="Search Item">
                <button id="save-button">Save</button>
            </div>


            <table class="clickedInventory-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>*Beginning</th>
                        <th>*Delivery</th>
                        <th>*Waste</th>
                        <th>*Sold</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example rows, add more as needed -->
                    <tr>
                        <td>Item 1</td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Item 2</td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Item 3</td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Item 4</td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="number" required></td>
                        <td><input type="text"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="confirmationModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="subheadertext">Save Report?</h2>
                </div>
                <div class="modal-footer">
                    <button id="cancelButton" class="cancel">Cancel</button>
                    <button id="confirmSaveButton" class="save">Save</button>
                </div>
            </div>
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById("confirmationModal");

            // Get the button that opens the modal
            var btn = document.getElementById("save-button");

            // Get the <span> element that closes the modal
            var cancelButton = document.getElementById("cancelButton");
            var confirmSaveButton = document.getElementById("confirmSaveButton");

            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            cancelButton.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks the save button, proceed with the save
            confirmSaveButton.onclick = function () {
                modal.style.display = "none";
                // Add your save logic here
                alert("Report saved successfully!");
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
</body>

</html>