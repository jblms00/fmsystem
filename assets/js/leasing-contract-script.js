$(document).ready(function () {
    $(document).on("click", ".franchise-button", function () {
        var selectedValue = $(this).data("value");
        $(".franchise-button").not($(this)).removeClass("active");
        $(this).addClass("active");
        $("#franchise").val(selectedValue);
    });

    createDocumentLeasing();
    populateLeaseContracts();

    $(document).on("click", ".btn-tr-leasing", function () {
        var id = $(this).data("lease-id");
        window.location.href = "leasingDetails.php?id=" + id;
    });
});

function createDocumentLeasing() {
    $(document).on("click", ".myButton", function () {
        var btnText = $(this).text();
        var docStatus = btnText === "Save Draft" ? "draft" : "active";

        var formData = new FormData();
        formData.append("franchise", $("#franchise").val());
        formData.append("leaseStartDate", $("#lease-start-date").val());
        formData.append("leaseEndDate", $("#lease-end-date").val());
        formData.append("spaceNumber", $("#space-number").val());
        formData.append("area", $("#area").val());
        formData.append("classification", $("#classification").val());
        formData.append("rent", $("#rent").val());
        formData.append("percentageRent", $("#percentage-rent").val());
        formData.append("minimumRent", $("#minimum-rent").val());
        formData.append("leaseFee", $("#lease-fee").val());
        formData.append("leaseFeeNote", $("#lease-fee-note").val());
        formData.append("totalMonthlyDues", $("#total-monthly-dues").val());
        formData.append(
            "totalMonthlyDuesNote",
            $("#total-monthly-dues-note").val()
        );
        formData.append("leaseDeposit", $("#lease-deposit").val());
        formData.append("leaseDepositNote", $("#lease-deposit-note").val());
        formData.append("lessorName", $("#lessor-name").val());
        formData.append("lesseeName", $("#lessee-name").val());
        formData.append("lessorAddress", $("#lessor-address").val());
        formData.append("lesseeAddress", $("#lessee-address").val());
        formData.append("extraNoteLeasing", $("#extra-note-leasing").val());
        formData.append(
            "notarySealLeasing",
            $("#notary-seal-leasing").prop("files")[0]
        );
        formData.append("docStatus", docStatus);

        $.ajax({
            method: "POST",
            url: "../../phpscripts/create-leasing-contract.php",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $("input, button, textarea, select, a").prop(
                        "disabled",
                        true
                    );
                    displayModal(
                        "Success",
                        "Document created successfully.",
                        "#198754"
                    );

                    setTimeout(function () {
                        closeModal();
                        window.location.href = window.location.href;
                    }, 3000);

                    $("#myForm")[0].reset();
                } else {
                    displayModal("Error", response.message, "#dc3545");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                displayModal(
                    "Error",
                    "An error occurred. Please try again later."
                );
            },
        });
    });
}

function populateLeaseContracts() {
    var tableBody = $("#leasingContractTbl").find("tbody");

    $.ajax({
        method: "GET",
        url: "../../phpscripts/fetch-leasing-contracts.php",
        dataType: "json",
        success: function (response) {
            tableBody.empty();

            if (response.status === "success") {
                response.contract_details.forEach(function (contract, index) {
                    var imgFile = getFranchiseImage(contract.franchisee);

                    var currentDate = new Date();
                    var endDate = new Date(contract.end_date);
                    var timeDiff = endDate.getTime() - currentDate.getTime();
                    var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                    var row = `
                        <tr class="btn-tr-leasing" data-lease-id="${contract.lease_id}">
                            <td><img src="../../assets/images/${imgFile}" alt="${contract.franchisee} Logo" class="franchise-logo"></td>
                            <td>${contract.location}</td>
                            <td>${contract.classification}</td>
                            <td><span class="status ${contract.status}">${contract.status}</span></td>
                            <td><span class="days-to-expire">${daysDiff} days</span></td>
                        </tr>
                    `;
                    tableBody.append(row);
                });
            } else {
                console.log("error");
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error fetching agreement contracts:", error);
        },
    });
}

function getFranchiseImage(franchise) {
    switch (franchise) {
        case "potato-corner":
            return "PotCor.png";
        case "auntie-annes":
            return "AuntieAnn.png";
        case "macao-imperial":
            return "MacaoImp.png";
        default:
            return "default-image.png";
    }
}

function displayModal(title, message, backgroundColor) {
    $("#modalTitle").text(title);
    $("#modalMessage").text(message);
    $("#modalOverlay").fadeIn();
    $("#modalBox").css("background-color", backgroundColor);
    setTimeout(closeModal, 3000);
}

function closeModal() {
    $("#modalOverlay").fadeOut();
}

$(document).on("click", "#modalCloseBtn", closeModal);
