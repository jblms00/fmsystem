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

    <div>

    </div>

    <div class="container">
        <h2 class="subheadertext">Daily Ending Inventory</h2>
        <div class="regularText">Franchisee: Potato Corner</div> <!--Replace with franchise clicked  -->
        <div class="regularText">Filled By: Maria Santos</div> <!--Replace with User who made report -->
        <div class="regularText">Location: Lyceum of the Philippines</div> <!--Replace with Branch location -->
        <div class="filters">
            <input type="date" id="date">
            <button id="Download">Download</button>
        </div>


        <div class="content">
            <table class="clickedInventory-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>UOM</th>
                        <th>Beginning</th>
                        <th>Delivery</th>
                        <th>Waste</th>
                        <th>OnHand</th>
                        <th>Ending</th>
                        <th>Sold</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>COKE REGULAR 500ML</td>
                        <td>BT</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                    </tr>

                    <tr>
                        <td>Item 2</td>
                        <td>BT</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>Item 3</td>
                        <td>BT</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                        <td>18</td>
                    </tr>

                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>