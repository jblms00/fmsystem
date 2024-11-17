var table = $("#totalExpensesTbl");

$(document).ready(function () {
    displayExpenses();

    $(document).on("click", ".btn-ex-data", function () {
        var id = $(this).data("ex-id");
        window.location.href = "viewExpenses.php?id=" + id;
    });
});

function displayExpenses() {
    $.ajax({
        method: "GET",
        url: "../../phpscripts/display-expenses.php",
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                var tableBody = $("#totalExpensesTbl tbody");
                tableBody.empty();

                response.details.forEach(function (info) {
                    var img = getFranchiseImage(info.franchisee);
                    var formattedGrandTotal = parseFloat(
                        info.expense_amount
                    ).toLocaleString();

                    var row = `
                        <tr class="btn-ex-data" data-ex-id="${info.ex_id}">
                            <td>
                                <img src="../../assets/images/${img}" alt="img" class="franchise-logo">
                            </td>
                            <td>₱${formattedGrandTotal}</td>
                            <td>${mapExpenseCategory(info.expense_catergory)}</td>

                            <td>${info.date_added}</td>
                        </tr>
                    `;
                    tableBody.append(row);
                });
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
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
            return "default-image.png";
    }
}

function toTitleCase(str) {
    return str.replace(/\w\S*/g, function (text) {
        return text.charAt(0).toUpperCase() + text.substr(1).toLowerCase();
    });
}

function mapExpenseCategory(category) {
    switch (category) {
        case "controllable-expenses":
            return "Franchisor Expenses";
        case "non-controllable-expenses":
            return "Leasing Expenses";
        case "other-expenses":
            return "Others Expenses";
        default:
            return category;
    }
}
