$(document).ready(function () {
    createEncodedSales();

    var urlParams = getEatTypeAndBranchFromUrl();
    updateSalesSectionForm(urlParams);
    addAnotherTransaction();
    calculateGrandTotal();
});

function getEatTypeAndBranchFromUrl() {
    var queryString = window.location.search.substring(1);
    var queryParts = queryString.split("/");

    var eatType = "";
    var franchise = "";

    queryParts.forEach(function (part) {
        if (part.startsWith("tp=")) {
            eatType = part.substring(3);
        } else if (part.startsWith("franchise=")) {
            franchise = part.substring(10);
        }
    });

    // Map franchise names to database-compatible formats
    var franchiseFormattedMap = {
        PotatoCorner: "potato-corner",
        MacaoImperial: "macao-imperial",
        AuntieAnne: "auntie-anne",
    };

    var eatTypeFormattedMap = {
        DineIn: "Dine-In",
        TakeOut: "Take-Out",
        Delivery: "Delivery",
    };

    var franchiseFormatted = franchiseFormattedMap[franchise] || franchise;
    var eatTypeFormatted = eatTypeFormattedMap[eatType] || eatType;

    return {
        eatType: eatType,
        franchise: franchise,
        eatTypeFormatted: eatTypeFormatted,
        franchiseFormatted: franchiseFormatted,
    };
}

function updateSalesSectionForm(urlParams, salesSectionForm = $("#salesSectionForm")) {
    var salesSectionHTML = "";
    if (urlParams.eatType === "TakeOut" || urlParams.eatType === "DineIn") {
        salesSectionHTML = `
            <div class="sales-section">
                <div class="details transactionType">
                    <p>${urlParams.eatTypeFormatted}</p>
                    <div class="fields">
                        <div class="input-field transactionType">
                            <label>Cash/Card:</label>
                            <input type="number" class="amount-input input-cash-card" placeholder="Enter Amount" required>
                        </div>
                        <div class="input-field transactionType">
                            <label>GCash:</label>
                            <input type="number" class="amount-input input-gcash" placeholder="Enter Amount" required>
                        </div>
                        <div class="input-field transactionType">
                            <label>Paymaya:</label>
                            <input type="number" class="amount-input input-paymaya" placeholder="Enter Amount" required>
                        </div>
                        <div class="input-field transactionType">
                            <label>Other ${urlParams.eatTypeFormatted} Sales:</label>
                            <input type="number" class="amount-input input-total-sales" placeholder="Enter Amount" required>
                        </div>
                    </div>
                </div>
            </div>
        `;
    } else {
        salesSectionHTML = `
            <div class="sales-section">
                <div class="details transactionType">
                    <p>${urlParams.eatTypeFormatted}</p>
                    <div class="fields">
                        <div class="input-field transactionType">
                            <label>GrabFood:</label>
                            <input type="number" class="amount-input input-grab-food" placeholder="Enter Amount" required>
                        </div>
                        <div class="input-field transactionType">
                            <label>foodpanda:</label>
                            <input type="number" class="amount-input input-food-panda" placeholder="Enter Amount" required>
                        </div>
                        <div class="input-field transactionType">
                            <label>Other ${urlParams.eatTypeFormatted} Sales:</label>
                            <input type="number" class="amount-input input-total-sales" placeholder="Enter Amount" required>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    salesSectionForm.html(salesSectionHTML);

    var dashFranchise = urlParams.franchiseFormatted; // Already formatted as "auntie-anne"
    var dashServices = urlParams.eatTypeFormatted.toLowerCase();
    var encoderName = $("body").data("user-name");

    $.ajax({
        method: "POST",
        data: { formattedFranchisee: dashFranchise },
        url: "../../phpscripts/display-branches.php",
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                var info = response.details[0];
                $(".input-franchise-name").val(urlParams.franchiseFormatted);
                $(".input-location").val(info.location);
                $(".input-encoders-name").val(encoderName);
                var currentDate = new Date().toISOString().slice(0, 10);
                $(".input-date").val(currentDate);
                $(".save-encoded-sales").attr("data-ac-id", info.ac_id);
                $(".save-encoded-sales").attr("data-services", dashServices);
                $(".save-encoded-sales").attr("data-franchise", dashFranchise);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error fetching agreement contracts:", error);
        },
    });
}

function addAnotherTransaction() {
    $(document).on("click", ".add-transaction-btn", function () {
        var newForm = $(".transaction-form").first().clone();
        newForm.find("input").val("");
        $(".transaction-forms-container").append(newForm);
    });
}

function calculateGrandTotal() {
    $(document).on("input", ".amount-input", function () {
        var grandTotal = 0;

        $(".amount-input").each(function () {
            var value = parseFloat($(this).val());
            if (!isNaN(value)) {
                grandTotal += value;
            }
        });

        $(".grandtotal-form .input-field input").val(grandTotal.toFixed(2));
    });
}

function createEncodedSales() {
    $(document).on("click", ".save-encoded-sales", function () {
        var urlParams = getEatTypeAndBranchFromUrl();
        var encoderName = $("body").data("user-name");
        var franchise = urlParams.franchiseFormatted;
        var location = $(".input-location").val();
        var date = $(".input-date").val();
        var acId = $(this).data("ac-id");
        var services = $(this).data("services");
        var dashFranchise = $(this).data("franchise");

        var transactions = [];

        $(".transaction-form").each(function () {
            var productName = $(this).find(".input-product-name").val();
            var cashCard = $(this).find(".input-cash-card").val();
            var gCash = $(this).find(".input-gcash").val();
            var paymaya = $(this).find(".input-paymaya").val();
            var grabFood = $(this).find(".input-grab-food").val();
            var foodPanda = $(this).find(".input-food-panda").val();
            var totalSales = $(this).find(".input-total-sales").val();
            var grandTotal = $(".input-grand-total").val();

            console.log(totalSales);
            var transaction = {
                encoderName: encoderName,
                franchise: franchise,
                location: location,
                date: date,
                productName: productName,
                cashCard: cashCard,
                gCash: gCash,
                paymaya: paymaya,
                grabFood: grabFood,
                foodPanda: foodPanda,
                totalSales: totalSales,
                grandTotal: grandTotal,
                acId: acId,
                services: services,
                dashFranchise: dashFranchise,
            };
            transactions.push(transaction);
        });

        $.ajax({
            method: "POST",
            url: "../../phpscripts/save-encoded-sales.php",
            data: JSON.stringify(transactions),
            contentType: "application/json",
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $("input, button, textarea, select, a").prop(
                        "disabled",
                        true
                    );
                    displayModal("Success", response.message, "#198754");

                    setTimeout(function () {
                        closeModal();
                        window.location.href = "../salesPerformance/sales";
                    }, 3000);
                } else {
                    displayModal("Error", response.message, "#dc3545");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            },
        });
    });
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
