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
                    var listItem = `
                        <li>
                            <h3>${notification.franchisee}</h3>
                            <h4>${notification.classification}</h4>
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
