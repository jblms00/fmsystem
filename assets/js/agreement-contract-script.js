$(document).ready(function () {
    $(document).on("click", ".franchise-button", function () {
        var selectedValue = $(this).data("value");
        $(".franchise-button").not($(this)).removeClass("active");
        $(this).addClass("active");
        $("#franchise").val(selectedValue);
    });

    createDocumentFranchise();
    populateAgreementContracts();

    $(document).on("click", ".btn-tr-agreement", function () {
        var id = $(this).data("ac-id");
        window.location.href = "franchiseDetails.php?id=" + id;
    });
});

function createDocumentFranchise() {
    $(document).on("click", ".myButton", function () {
        var btnText = $(this).text();
        var docStatus = btnText === "Save Draft" ? "draft" : "active";

        var franchise = $("#franchise").val();
        var classification = $("#classification").val();
        var rightsGranted = [];
        $("input[name='rightsGranted[]']:checked").each(function () {
            rightsGranted.push($(this).val());
        });

        var franchiseTerm = $("#franchise-term").val();
        var agreementDate = $("#agreement-date").val();
        var location = $("#location").val();

        var franchiseFee = $("#franchise-fee").val();
        var franchiseFeeNote = $("#franchise-fee-note").val();
        var franchisePackage = $("#franchise-package").val();
        var franchisePackageNote = $("#franchise-package-note").val();
        var bond = $("#bond").val();
        var bondNote = $("#bond-note").val();
        var extraNoteFranchise = $("#extra-note-franchise").val();

        var franchisor = $("#franchisor").val();
        var franchisee = $("#franchisee").val();
        var franchisorRep = $("#franchisor-rep").val();
        var franchiseeRep = $("#franchisee-rep").val();
        var notarySealFranchise = $("#notary-seal-franchise").prop("files")[0];

        var formData = new FormData();
        formData.append("franchise", franchise);
        formData.append("classification", classification);

        formData.append("rightsGranted", rightsGranted);
        formData.append("franchiseTerm", franchiseTerm);
        formData.append("agreementDate", agreementDate);
        formData.append("location", location);

        formData.append("franchiseFee", franchiseFee);
        formData.append("franchiseFeeNote", franchiseFeeNote);
        formData.append("franchisePackage", franchisePackage);
        formData.append("franchisePackageNote", franchisePackageNote);
        formData.append("bond", bond);
        formData.append("bondNote", bondNote);
        formData.append("extraNoteFranchise", extraNoteFranchise);
        formData.append("franchisor", franchisor);
        formData.append("franchisee", franchisee);
        formData.append("franchisorRep", franchisorRep);
        formData.append("franchiseeRep", franchiseeRep);
        formData.append("notarySealFranchise", notarySealFranchise);
        formData.append("docStatus", docStatus);

        $.ajax({
            method: "POST",
            url: "../../phpscripts/create-agreement-contract.php",
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
                        window.location.href = "franchiseeAgreement";
                    }, 3000);

                    $("#myForm")[0].reset();
                } else {
                    displayModal(
                        "Error",
                        "Failed to create document. Please try again.",
                        "#dc3545"
                    );
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

function populateAgreementContracts() {
    var tableBody = $("#agreementContractTbl").find("tbody");

    $.ajax({
        method: "GET",
        url: "../../phpscripts/fetch-agreement-contracts.php",
        dataType: "json",
        success: function (response) {
            tableBody.empty();

            if (response.status === "success") {
                response.contract_details.forEach(function (contract, index) {
                    var imgFile = getFranchiseImage(contract.franchisee);

                    var currentDate = new Date();
                    var endDate = new Date(contract.agreement_date);
                    var timeDiff = endDate.getTime() - currentDate.getTime();
                    var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                    if (daysDiff < 0) {
                        daysDiff = 0;
                    }

                    var row = `
                        <tr class="btn-tr-agreement" data-ac-id="${contract.ac_id}">
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
        case "auntie-anne":
            return "AuntieAnn.png";
        case "macao-imperial":
            return "MacaoImp.png";
        default:
            return "11Nevada_LOGO2.png";
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
