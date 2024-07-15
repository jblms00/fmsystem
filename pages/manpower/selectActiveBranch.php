<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/selectActiveBranch.css" type="text/css">
    <title>Manpower Deployment - Schedule</title>
</head>

<body>
    <!-- This area contains the blue header on top -->
    <div class="header">
        <h1 class="headertext"> &emsp; Employees - Active Today</h1>
    </div>

    <div class="store-types">
        <h1 class="branch-title">Select a Branch</h1>
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

        <div class="input-field">
            <select required>
                <option value="" disabled selected>Select Location</option>
                <option value="potatoCorner">Location</option>
                <!-- Add more options as needed -->
            </select>
        </div>
    </div>
</body>

</html>