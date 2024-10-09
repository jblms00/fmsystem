$(document).ready(function () {
    fetchContractNotifications();
});

function fetchContractNotifications() {
    $.ajax({
        url: "../../phpscripts/get-contract-expiry.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var notificationList = $("#notification-list");
            notificationList.empty();

            if (response.status === "success") {
                response.notifications.forEach(function (notification) {
                    var imgFile = getFranchiseImage(notification.franchisee);

                    var listItem = `
                        <li class="text-center">
                            <h3><img src="../../assets/images/${imgFile}" alt="${notification.franchisee} Logo" class="franchise-logo mb-2"></h3>
                            <h4 class="mb-2">${notification.classification}</h4>
                            <span class="notification-details">${notification.status}</span>
                        </li>
                    `;
                    notificationList.append(listItem);
                });
            } else {
                notificationList.append(
                    `<li class="text-danger text-center">${response.message}</li>`
                );
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching notifications:", error);
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
